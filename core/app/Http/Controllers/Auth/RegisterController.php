<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserLogin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Deposit;
use App\BonusSetting;
use App\BonusHistory;
use App\Transaction;
use App\UserPanelColor;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('regStatus')->except('registrationNotAllowed');

        $this->activeTemplate = activeTemplate();
    }

    public function referralRegister($reference)
    {
        if( User::where('username',$reference)->first() ){
            $page_title = "Registration by Referral";
            session()->put('reference', $reference);
            return view($this->activeTemplate . 'user.auth.register', compact('reference', 'page_title'));
        }else{
            $notify[] = ['error', "Sorry Dont't Match"];
            return redirect()->route('user.register')->withNotify($notify);;
        }

    }

    public function showRegistrationForm()
    {
        $page_title = "Registration";
        return view($this->activeTemplate . 'user.auth.register', compact('page_title'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'firstname' => 'sometimes|required|string|max:60',
            'lastname' => 'sometimes|required|string|max:60',
            'email' => 'required|string|email|max:160|unique:users',
            'mobile' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|alpha_num|unique:users|min:6',
            'captcha' => 'sometimes|required'
        ]);

        return $validate;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        if (isset($request->captcha)) {
            if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                $notify[] = ['error', "Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $gnl = GeneralSetting::first();
        $bonus_setting = BonusSetting::first();
        // $generalSetting = GeneralSetting::first();

        $referBy = session()->get('reference');
        if ($referBy != null) {

            $referUser = User::where('username', $referBy)->first();
            $referUser->balance += $bonus_setting->ref_registration_bonus;

            $bonusHistory = new BonusHistory();
            $bonusHistory->user_id = $referUser->id;
            $bonusHistory->currency_code = $gnl->cur_text;
            $bonusHistory->amount = $bonus_setting->ref_registration_bonus;
            $bonusHistory->bonus_type = 'ref_registration_bonus';
            $bonusHistory->save();
            $referUser->save();

            $transter = new Transaction();
            $transter->user_id = $referUser->id;
            $transter->currency_code = $gnl->cur_text;
            $transter->amount = $bonus_setting->ref_registration_bonus;
            $transter->post_balance = $referUser->balance;
            $transter->trx_type = '+';
            $transter->details = 'Referral Registration Bonus';
            $transter->trx = getTrx();
            $transter->save();

        } else {
            $referUser = null;
        }

        $user = new User();
        $user->firstname = isset($data['firstname']) ? $data['firstname'] : null;
        $user->lastname = isset($data['lastname']) ? $data['lastname'] : null;
        $user->email = strtolower(trim($data['email']));
        $user->password = Hash::make($data['password']);
        $user->username = trim($data['username']);
        $user->ref_by = ($referUser != null) ? $referUser->id : null;
        $user->mobile = $data['mobile'];
        $user->balance = $bonus_setting->regi_bonus;
        $user->address = [
            'address' => '',
            'state' => '',
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => ''
        ];
        $user->status = 1;
        $user->ev = $gnl->ev ? 0 : 1;
        $user->sv = $gnl->sv ? 0 : 1;
        $user->ts = 0;
        $user->tv = 1;
        $user->save();

        $dashboardColor = new UserPanelColor();
        $dashboardColor->user_id = $user->id;
        $dashboardColor->theme_color = 'light light-sidebar theme-white';
        $dashboardColor->save();

        $transter = new Transaction();
        $transter->user_id = $user->id;
        $transter->amount = $user->balance;
        $transter->currency_code = $gnl->cur_text;
        $transter->post_balance = $user->balance;
        $transter->trx_type = '+';
        $transter->details = 'Registration Bonus';
        $transter->trx = getTrx();
        $transter->save();

        $bonusHistory = new BonusHistory();
        $bonusHistory->user_id = $user->id;
        $bonusHistory->currency_code = $gnl->cur_text;
        $bonusHistory->amount = $bonus_setting->regi_bonus;
        $bonusHistory->bonus_type = 'regi_bonus';
        $bonusHistory->save();

        $info = json_decode(json_encode(getIpInfo()), true);
        $userLogin = new UserLogin();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip = request()->ip();
        $userLogin->longitude = @implode(',', $info['long']);
        $userLogin->latitude = @implode(',', $info['lat']);
        $userLogin->location = @implode(',', $info['city']) . (" - " . @implode(',', $info['area']) . "- ") . @implode(',', $info['country']) . (" - " . @implode(',', $info['code']) . " ");
        $userLogin->country_code = @implode(',', $info['code']);
        $userLogin->browser = @$info['browser'];
        $userLogin->os = @$info['os_platform'];
        $userLogin->country = @implode(',', $info['country']);
        $userLogin->save();


        return $user;
    }

    public function registered()
    {


        return redirect()->route('user.home');
    }

}

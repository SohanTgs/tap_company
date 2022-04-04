<?php

namespace App\Http\Controllers;

use App\Frontend;
use App\Language;
use App\Page;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use Carbon\Carbon;
use App\Subscriber;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function index(){



// \DB::enableQueryLog();

$users = \DB::table('staff')
         ->whereBetween('created_at', ['2022-03-01', '2022-03-05'])
         ->groupBy('role')
         ->get()
         ->map(function($data){
            return \DB::table('staff')
                    ->where('name', $data->name)
                    ->groupBy('created_at')                                                                  
                    ->get();
        });

// dd(\DB::getQueryLog());


      return $users;

        $count = Page::where('tempname',$this->activeTemplate)->where('slug','home')->count();
        if($count == 0){
            $in['tempname'] = $this->activeTemplate;
            $in['name'] = 'HOME';
            $in['slug'] = 'home';
            Page::create($in);
        }

        $data['page_title'] = 'Home';
        $data['sections'] = Page::where('tempname',$this->activeTemplate)->where('slug','home')->firstOrFail();
        return view($this->activeTemplate . 'home', $data);
    }
    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($this->activeTemplate . 'pages', $data);
    }


    public function contact()
    {
        $data['page_title'] = "Contact Us";
        return view($this->activeTemplate . 'contact', $data);
    }


    public function contactSubmit(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $imgs = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

        $this->validate($request, [
            'attachments' => [
                'sometimes',
                'max:4096',
                function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
                    foreach ($imgs as $img) {
                        $ext = strtolower($img->getClientOriginalExtension());
                        if (($img->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf images are allowed");
                        }
                    }
                    if (count($imgs) > 5) {
                        return $fail("Maximum 5 images can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);


        $random = getNumber();

        $ticket->user_id = auth()->id();
        $ticket->name = $request->name;
        $ticket->email = $request->email;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $path = imagePath()['ticket']['path'];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                try {
                    SupportAttachment::create([
                        'support_message_id' => $message->id,
                        'image' => uploadImage($image, $path),
                    ]);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload your ' . $image];
                    return back()->withNotify($notify)->withInput();
                }

            }
        }
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function blogDetails($id,$slug){
        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
        $recentBlogs = Frontend::where('data_keys', 'blog.element')->orderBy('id','DESC')->latest()->take(5)->get();
        $page_title = $blog->data_values->title;
        return view($this->activeTemplate.'blogDetails',compact('blog','page_title', 'recentBlogs'));
    }

    public function placeholderImage($size = null){
        if ($size != 'undefined') {
            $size = $size;
            $imgWidth = explode('x',$size)[0];
            $imgHeight = explode('x',$size)[1];
            $text = $imgWidth . '×' . $imgHeight;
        }else{
            $imgWidth = 150;
            $imgHeight = 150;
            $text = 'Undefined Size';
        }
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function about(){
        $page_title = 'About Us';
        return view($this->activeTemplate . 'about',compact('page_title'));
    }

    public function becomeSubscribe(Request $request){
        $subscriberEmail = new Subscriber();
        $subscriberEmail->email = $request->email;
        $subscriberEmail->save();

        $notify[] = ['success', 'We accepet your subscribe request'];
        return back()->withNotify($notify);
    }

    public function allBlogs(){
        $page_title = 'Blogs';
        $blogs = Frontend::where('data_keys', 'blog.element')->latest()->paginate(10);
        $recentBlogs = Frontend::where('data_keys', 'blog.element')->orderBy('id', 'DESC')->latest()->take(5)->get();
        return view($this->activeTemplate . 'allBlogs', compact('page_title', 'blogs', 'recentBlogs'));
    }






}

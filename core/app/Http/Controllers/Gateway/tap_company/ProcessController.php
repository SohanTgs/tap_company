<?php

namespace App\Http\Controllers\Gateway\tap_company;

use App\Deposit;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    /*
     * Vogue Pay Gateway
     */

    public static function process($deposit)
    {  

    $amount = (int) 5;

    $data = json_encode(
      array (
  'amount' => 1,
  'currency' => 'KWD',
  'threeDSecure' => true,
  'save_card' => false,
  'description' => 'Test Description',
  'statement_descriptor' => 'Sample',
  'metadata' => 
  array (
    'udf1' => $deposit->trx
  ),
  'reference' => 
  array (
    'transaction' => 'txn_0001',
    'order' => 'ord_0001',
  ),
  'receipt' => 
  array (
    'email' => false,
    'sms' => true,
  ),
  'customer' => 
  array (
    'first_name' => 'test',
    'middle_name' => 'test',
    'last_name' => 'test',
    'email' => 'test@test.com',
    'phone' => 
    array (
      'country_code' => '965',
      'number' => '50000000',
    ),
  ),
  'merchant' => 
  array (
    'id' => '',
  ),
  'source' => 
  array (
    'id' => 'src_kw.knet',
  ),
  'post' => 
  array (
    'url' => 'http://your_website.com/post_url',
  ),
  'redirect' => 
  array (
    'url' => 'http://your_website.com/redirect_url',
  ),
)
    );

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/charges",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


        // $alias = $deposit->gateway->alias;

        // $send['notify_url'] = route('ipn.'.$alias);
        // $send['cur'] = $deposit->method_currency;
        // $send['merchant_ref'] = $deposit->trx;
        // $send['memo'] = 'Payment';
        // $send['store_id'] = $deposit->user_id;
        // $send['custom'] = $deposit->trx;
        $send['sec_id'] = json_decode($response)->id;
        // $send['Buy'] = round($deposit->final_amo,2);
        $send['view'] = 'user.payment.tap_company';

        return json_encode($send);
    }

    public function ipn(Request $request)
    {  

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.tap.company/v2/charges/$request->sec_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "{}",
        CURLOPT_HTTPHEADER => array(
          "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      $trx = json_decode($response)->metadata->udf1;
      $data = Deposit::where('trx', $trx)->orderBy('id', 'DESC')->first();

      //Update User Data
      PaymentController::userDataUpdate($data->trx);

      $notify[] = ['success', 'Payment is successful'];
      return redirect()->route('user.deposit')->withNotify($notify);
      
    }
}

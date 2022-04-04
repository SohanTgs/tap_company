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
        'amount' => $amount,
        'currency' => 'USD',
        'customer' => 
          array (
            'first_name' => 'test',
            'middle_name' => '',
            'last_name' => 'test',
            'phone' => 
            array (
              'country_code' => '965',
              'number' => '51234567',
            ),
            'email' => 'testcgara@test.com',
          ),
          'items' => 
          array (
            array (
              'name' => 
              array (
                'en' => 'test',
              ),
              'description' => 
              array (
                'en' => 'test',
              ),
              'image' => '',
              'currency' => 'USD',
              'amount' => $amount,
              'quantity' => '1',
              'discount' => 0,
              array (
                'type' => 'P',
                'value' => 0,
              ),
            ),
          ),
          'tax' => 
          array (
            array (
              'description' => 'test',
              'name' => 'VAT',
              'rate' => 
              array (
                'type' => 'F',
                'value' => 1,
              ),
            ),
          ),
          'shipping' => 
          array (
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 
            array (
              'en' => 'test',
            ),
            'address' => 
            array (
              'recipient_name' => 'test',
              'line1' => 'sdfghjk',
              'line2' => 'oiuytr',
              'district' => 'hawally',
              'city' => 'hawally',
              'state' => 'hw',
              'zip_code' => '30003',
              'po_box' => '200021',
              'country' => 'kuwait',
            ),
          ),
          'metadata' => 
          array (
            'udf1' => '',
            'udf2' => '',
          ),
          'reference' => 
          array (
            'invoice' => '',
            'order' => '',
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
  CURLOPT_POSTFIELDS => "{\"amount\":1,\"currency\":\"KWD\",\"threeDSecure\":true,\"save_card\":false,\"description\":\"Test Description\",\"statement_descriptor\":\"Sample\",\"metadata\":{\"udf1\":\"test 1\",\"udf2\":\"test 2\"},\"reference\":{\"transaction\":\"txn_0001\",\"order\":\"ord_0001\"},\"receipt\":{\"email\":false,\"sms\":true},\"customer\":{\"first_name\":\"test\",\"middle_name\":\"test\",\"last_name\":\"test\",\"email\":\"test@test.com\",\"phone\":{\"country_code\":\"965\",\"number\":\"50000000\"}},\"merchant\":{\"id\":\"\"},\"source\":{\"id\":\"src_kw.knet\"},\"post\":{\"url\":\"http://your_website.com/post_url\"},\"redirect\":{\"url\":\"http://your_website.com/redirect_url\"}}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
// dd(json_decode($response)->id);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}



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
        // $request->validate([
        //     'transaction_id' => 'required'
        // ]);

        // return $request->sec_id;
        // dd($request);

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
  dd($response);
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }

        // $trx = $request->transaction_id;
        // $req_url = "https://voguepay.com/?v_transaction_id=$trx&type=json";
        // $vougueData = curlContent($req_url);
        // $vougueData = json_decode($vougueData);
        // $track = $vougueData->merchant_ref;

        // $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        // $vogueAcc = json_decode($data->gateway_currency()->gateway_parameter);
        // if ($vougueData->status == "Approved" && $vougueData->merchant_id == $vogueAcc->merchant_id && $vougueData->total == getAmount($data->final_amo) && $vougueData->cur_iso == $data->method_currency &&  $data->status == '0') {
        //     //Update User Data
        //     PaymentController::userDataUpdate($data->trx);
        // }
    }
}

@extends( $activeTemplate.'layouts.app' )

@section('panel')

<div class="main-content">

<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-3">
      <div class="panel p-1 text-center" style="background:#FFFFFF;">
        <div class="panel-heading">
          <h3 class="panel-title" style="color:black;">Convert Your Wallet</h3>
        </div>
        <div class="error">
         <h5 style="color:black;" id="result">

        </h5>
        </div>
        <div class="panel-body">
          <form class="form-vertical" action="{{ route('user.transfer.wallet.post') }}" method="post" id="transfer_wallet">
            @csrf
            <div class="form-group inline-block">
              <label for="" style="color:black;">From currency:</label>
              <select class="form-control" name="from_currency" required id="from_currency">
                <option value="">--Select--</option>
                @foreach(json_decode($currencies->currency_rate, true)['rates'] as $key => $value)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group inline-block">
              <label style="color:black;">To currency:</label>
              <select class="form-control" name="to_currency" required id="to_currency">
                <option value="">--Select--</option>
                @foreach(json_decode($currencies->currency_rate, true)['rates'] as $key => $value)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
              </select>
            </div>

             <div class="form-group center col-md-4">
              <label for="">Amount:</label>
              <input type="text" class="amount form-control" name="amount" style="font-size:20px;" required id="amount" placeholder="Enter Amount" min="1">
            </div>

            <div class="form-group center col-md-4">
              <input type="submit" value="Convert Now" class="btn btn-primary">
              <a href="javascript:void(0)" class="btn btn-primary" style="display: none" id='submit_form'>Submit</a>
            </div>

            <label style="color:black;">Last Updated: {{ showDateTime($currencies->updated_at) }} </label>
             <div class="form-group center col-md-4">
                <a href="{{ route('user.refress.rate') }}" class="btn btn-primary">Update Now</a>
            </div>

          </form>
          <p class="results">0</p>
        </div>
            <table class="table table-hover table-striped table-dark">
                <tr>
                    <th>{{ __('BDT') }}</th>
                    <th>{{ __('USD') }}</th>
                    <th>{{ __('EUR') }}</th>
                    <th>{{ __('BTC') }}</th>
                    <th>{{ __('GBP') }}</th>
                    <th>{{ __('LTC') }}</th>
                </tr>
                <tr>
                    <td>{{ $user->balance }}</td>
                    <td>{{ $user->USD }}</td>
                    <td>{{ $user->EUR }}</td>
                    <td>{{ $user->BTC }}</td>
                    <td>{{ $user->GBP }}</td>
                    <td>{{ $user->LTC }}</td>
                </tr>
            </table>
      </div>
    </div>
  </div>



</div>

@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
'use strict';
$(document).ready(function(){

    $('#transfer_wallet').submit(function(e){
        e.preventDefault();
        var data = $('#transfer_wallet').serialize();
        $.ajax({
          url:'convert-currency-amount',
          method:'post',
          data:data,
          success:function(response){

            if(response.success){
                $('#result').html(response.message);
                $('#submit_form').show();

                    $("#submit_form").click(function(){
                        var data = $('#transfer_wallet').serialize();
                        $.ajax({
                        url:'check-convert-currency-amount',
                        method:'post',
                        data:data,
                        success:function(response){
                            if(response.success){
                                e.currentTarget.submit();
                            }else{
                                showErrorToastr(response.message);
                            }
                        },
                        error:function(error){
                            console.log(error);
                        }
                        });
                    });

              }else{

              }
          },
          error:function(error){
              console.log(error);
          }
        });
    });

    function showErrorToastr($message){
        toastr["error"]($message)
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    }

});

</script>
@endpush


@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
.panel {
  background: #333333;
  border: solid white;
}

.results {
  font-size: 1em;
  color: #FFFFFF;
}


.inline-block {
  display: inline-block;
}

.center {
  width: 90%;
  margin: 0 auto 30px;
}


</style>

@endpush

@extends( $activeTemplate.'layouts.app' )

@section('panel')

<div class="main-content"><h3 align='center'>{{ $page_title }}</h3>
    <div class="col-xl-12">
        <div class="card">
            <form id="search_form">
                @csrf
                <div class="card-body">
                    <h3 align='center' style="display: none;" id="no_result"></h3>
                    <input type="hidden" required='' name="currentId" value="{{ Auth::user()->id }}">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4">
                            <label class="font-weight-bold">@lang('Receiver Email') <span class="text-danger">*</span></label>
        <input type="email" class="form-control" placeholder="@lang('Receiver Email')" name="email" id="search" required/>
        <table class="table table-striped" id="table">
            <tbody>

            </tbody>
        </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-1 text-center">
                            <button type="submit" style="background: #6777EF;color:white;" class="btn btn-block btn--primary mr-2">@lang('Search')</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



{{-- Add METHOD MODAL --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Receiver Details')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 align='center' id="balance_error" style="display: none;red;color:black;"></h4>
            <form action="{{ route('user.transfer.confirm') }}" method="POST" id="transfer_form">
                @csrf
                <div class="modal-body">

                        <input type="hidden" required='' id="receiver_id" name="receiver_id">

                    <div class="form-group">
                        <label> @lang('Receiver Email *') </label>
                       <input type="text" name="email" id="email2" class="form-control" readonly=''>
                    </div>

                    <div class="form-group">
                        <label> @lang('Receiver Mobile *') </label>
                       <input type="text" name="mobile" id="mobile" class="form-control" readonly=''>
                    </div>

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

                    <div class="form-group">
                        <label> @lang('Write your amount *') </label>
                       <input type="number" required='' name="amount" id="amount" class="form-control" >
                    </div>

                   <div id="charge"></div>

                    <div class="form-group">
                        <label> @lang('Reference ') </label>
                       <input type="text" required='' name="reference" class="form-control" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" style="background: #6777EF;color:white;" data-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" style="background: #6777EF;color:white;"  class="btn btn--primary">@lang('Sent')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    #imageId{
        height: 50px;
        width: 60px;
        border: 1px solid gray;
    }
    #table td:hover{
        background: lightgoldenrodyellow;
    }
</style>
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

"use strict";
 $(function () {
 	$('#search').on('input',function(){
	    var value = $('#search').val();
	    $.ajax({
           url:'search-receiver',
           method:'get',
           data:{'value':value},
           success:function(response){
     			if(response){
     				getUser(response);
     			}
           },
           error:function(error){
              console.log(error);
           }
        });
	});
	function getUser(data){
		let tbody = $('#table tbody'), output = '';
			tbody.empty();
		data.forEach(function(item, index){
            let path = '';
             if(item.image != null){
                 path = 'http://localhost/bkash/assets/images/user/profile/'+item.image;
            }else{
                 path = 'http://localhost/bkash/assets/images/user/profile/'+'default.png';
            }

			let email = item.email;
			let tr = $('<tr>');
            let img = $('<img>');
            let p = $('<span>');
			tr.append(
				// $(`<td onclick="setSlug('${slug}')">`).text(slug)
				$(`<td onclick="setSlug('${email}')">`).append($('<img>',{id:'imageId',src:path})).append($('<span>').text(' '+email))
			);
			tbody.append(tr);
		});
	}

});

function setSlug(val){
    $('#search').val(val);
}

    'use strict';
    (function($){
        var formEl = $("#search_form");
        formEl.submit(function(e){
            e.preventDefault();
            var data = formEl.serialize();
            $.ajax({
            url:'transfer-user-search',
            method:'post',
            data:data,

            success:function(response){

                if(response.success){
                    $('#no_result').hide();
                    var modal = $('#addModal');
                    modal.modal('show');
                    $('#mobile').val(response.message.mobile);
                    $('#email2').val(response.message.email);
                    $('#receiver_id').val(response.message.id);
                }else{
                    showErrorToastr(response.message);
                }
            },
            error:function(error){
                console.log(error)
            }
            });
        });

        $('#amount').on("input", function() {
            var withdrawCharge = {{ $bonus_setting->transaction_bonus }};
            var dInput = parseInt(this.value);
            var totalCharge = dInput * withdrawCharge / 100;
            var totalAmount = dInput+totalCharge;
            var currency_code = $('#from_currency').val();

            $('#charge').text('Total Charge ' + totalCharge + ' ' +currency_code +' '+' total Amount ' + totalAmount +' '+currency_code);
        });

        var amountForm = $("#transfer_form");

        amountForm.submit(function(e){
            e.preventDefault();
            var data = [];
            data['amount'] = $('#amount').val();
            data['from_currency'] = $('#from_currency').val();

            $.ajax({
            method:'get',
            url:'check-transfer-balance',
            data:{ amount:data['amount'], from_currency:data['from_currency'] },

            success:function(response){
                // console.log(response);
                if(!response.success){
                    showErrorToastr(response.message);
                }else{
                    e.currentTarget.submit();
                }
            },
            error:function(error){
                console.log(error)
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


    })(jQuery);

</script>
@endpush


@extends('admin.layouts.app')

@section('panel')

 <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table" id="table">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('Currency Code')</th>
                                <th scope="col">@lang('Equal')</th>
                                <th scope="col">@lang('Rate')</th>
                            </tr>
                            </thead>
                            <tbody id="showCurrency">

                           </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
              </div>
            </div>
        </div>

    </div>


@endsection

@push('breadcrumb-plugins')
    <select name="select_currency_code" id="select_currency_code" class="btn btn--primary ">
        <option value="">---Base Currency---</option>
        @foreach( json_decode($currencieApiRate->currency_rate, true)['rates'] as $key => $value)
        <option value="{{ $key }}" onchange="getCurrency();">{{ $key }} Base Rate</option>
        @endforeach
    </select>
@endpush

@push('script')

<script>
    (function ($) {
        "use strict";

        var data = @json(json_decode($currencieApiRate->currency_rate, true)['rates']);
        var currency_rate = Object.entries(data);

         $('#select_currency_code').change(function () {
           // console.log( $('#select_currency_code').val() );
            var input = @json(json_decode($currencieApiRate->currency_rate, true)['rates']);
            var currency_code = $('#select_currency_code').val();
            var rate = input[currency_code];

            var covertedDestinationAmount = '';
            if( currency_code == 'USD' ){
                covertedDestinationAmount = rate;
            }else{
                covertedDestinationAmount = rate;
            }

            // console.log(code);
            var i = 1;
            let tbody = $('#showCurrency');
            tbody.empty();
            currency_rate.forEach(function(item, index){

                let tr = $('<tr>');
                    tr.append(
                        $('<td>').text( i ++)
                    )
                    tr.append(
                        $('<td>').text(1+' '+currency_code)
                    )
                    tr.append(
                        $('<td>').text(' = ')
                    )
                    tr.append(
                        $('<td>').text( item[1] / covertedDestinationAmount + ' ' +item[0])
                    )
                    tbody.append(tr);
            });
        });


        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush

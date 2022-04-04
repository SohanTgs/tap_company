@extends( $activeTemplate.'layouts.app' )

@section('panel')

<div class="main-content">

        <div class="col-lg-12"><h3 align='center'>{{ $page_title }}</h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Sl')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('After Charge')</th>
                                <th scope="col">Balance</th>
                                <th scope="col">@lang('Type')</th>
                                <th scope="col"> @lang('Time')</th>
                                <th scope="col"> @lang('More')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $currencyTransactions as $transaction )
                                    <tr>
                                        <td> {{ $loop->index + 1 }} </td>
                                        <td> {{ number_format($transaction->amount, 2) }} {{ $transaction->currency_code }}</td>
                                        <td> {{ number_format($transaction->charge, 2) }} {{ $transaction->currency_code }}</td>
                                        <td> {{ number_format($transaction->charge + $transaction->amount, 2) }}
                                             {{ $transaction->currency_code }}
                                        </td>
                                        <td> {{ number_format($transaction->post_balance, 2) }} {{ $transaction->currency_code }}</td>
                                        <td> {{ $transaction->trx_type }} </td>
                                        <td> {{ showDateTime($transaction->created_at) }} </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm approveBtn" data-details="{{ $transaction->details }}"
                                                        data-trx="{{ $transaction->trx }}">
                                                <i class='fa fa-desktop'></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
      {{ $currencyTransactions->links() }}
              </div>
            </div>
        </div>
    </div>


    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item dark-bg">
                           <b>Trx Id: </b> <span class="trx"></span>
                        </li>
                        <li class="list-group-item dark-bg">
                           <b>Details: </b> <span class="details"></span>
                        </li>
                    </ul>
                    <ul class="list-group withdraw-detail mt-1">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        $('.approveBtn').on('click', function() {
            var modal = $('#approveModal');
            modal.find('.trx').text($(this).data('trx'));
            modal.find('.details').text($(this).data('details'));
            modal.modal('show');
        });
    </script>
@endpush

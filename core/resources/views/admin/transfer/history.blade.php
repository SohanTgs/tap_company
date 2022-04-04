@extends('admin.layouts.app')

@section('panel')

<div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('Sender')</th>
                                <th scope="col">@lang('Receiver')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('Total Send')</th>
                                <th scope="col">@lang('Get Amount')</th>
                                <th scope="col">@lang('Time')</th>
                                <th> @lang('More') </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($transfersHistories as $history)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.detail', $history->sender) }}">
                                            {{ $history->senderName->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.detail', $history->receiver) }}">
                                            {{ $history->receiverName->email }}
                                        </a>
                                    </td>
                                    <td>{{ $history->amount }} {{ $history->currency_code }}</td>
                                    <td>{{ $history->charge }} {{ $history->currency_code }}</td>
                                    <td>{{ $history->amount+$history->charge }} {{ $history->currency_code }}</td>
                                    <td>{{ $history->get_amount }}  {{ $history->get_currency_code }}</td>
                                    <td>{{ showDateTime($history->created_at) }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm approveBtn" data-trx="{{$history->trx}}"
                                        data-ref="{{$history->reference}}"
                                            >
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
      {{ $transfersHistories->links() }}
              </div>
            </div>
        </div>
    </div>

        <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Transaction ID</label>
                    <input type="text" readonly='' name="trx" class='form-control'>
                    <label>Reference</label>
                    <textarea name='ref' class='form-control'></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')

    <script>
        var currency = @json($general->cur_text);

        $('.approveBtn').on('click', function() {

            var modal = $('#detailModal');
            modal.find('input[name=trx]').val($(this).data('trx'));
            modal.find('textarea[name=ref]').val($(this).data('ref'));

            modal.modal('show');
        });

    </script>

@endpush

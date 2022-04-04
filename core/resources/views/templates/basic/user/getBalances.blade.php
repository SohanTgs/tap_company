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
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('Sender')</th>
                                <th scope="col">@lang('Sender Email')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col"> @lang('Time')</th>
                                <th scope="col"> @lang('More')</th>
                            </tr>
                            </thead>
                             <tbody>
                                @php($i=1)
                                @foreach($receiveBalances as $receiver)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $receiver->senderName->fullname }}</td>
                                        <td>{{ $receiver->senderName->email }}</td>
                                        <td>{{ $receiver->get_amount }} {{ $receiver->get_currency_code }}</td>
                                        <td>
                                            <i class="fa fa-calendar"></i>
                                            {{ showDateTime($receiver->created_at) }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm approveBtn" data-trx="{{$receiver->trx}}"
                                            data-ref="{{$receiver->reference}}"
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
      {{ $receiveBalances->links() }}
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

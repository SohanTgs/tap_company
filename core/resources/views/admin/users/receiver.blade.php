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
                                <th scope="col">@lang('Get Amount')</th>
                                <th scope="col">@lang('From Currency')</th>
                                <th scope="col">@lang('Date')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($receiveHistories as $history)
                                   <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.detail', $history->sender) }}">
                                                 {{ $history->senderName->fullname }}
                                            </a>
                                        </td>
                                        <td>{{ number_format($history->get_amount,2) }} {{ $history->get_currency_code }}</td>
                                        <td>{{ $history->amount }} {{ $history->currency_code }}</td>
                                        <td>{{ showDateTime($history->created_at) }}</td>
                                   </tr>
                                @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
      		{{ $receiveHistories->links('admin.partials.paginate') }}
              </div>
            </div><!-- card end -->
        </div>

    </div>

@endsection

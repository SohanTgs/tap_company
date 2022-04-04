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
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Bonus Type')</th>
                                <th scope="col">@lang('Date')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($allBonuses as $bonus)
                                   <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ number_format($bonus->amount,2) }} {{ $bonus->currency_code }}</td>
                                        <td>{{ $bonus->bonus_type }}</td>
                                        <td>{{ showDateTime($bonus->created_at) }}</td>
                                   </tr>
                                @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
      		{{ $allBonuses->links('admin.partials.paginate') }}
              </div>
            </div><!-- card end -->
        </div>

    </div>

@endsection

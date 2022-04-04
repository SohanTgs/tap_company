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
                                <th scope="col">@lang('Bonus type')</th>
                                <th scope="col"> @lang('Time')</th>
                            </tr>
                            </thead>
                          <tbody>
                                @php($i=1)
                                @foreach($transactionsBonus as $bonus)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $bonus->amount }} {{ $bonus->currency_code }} </td>
                                        <td>{{ $bonus->bonus_type }}</td>
                                        <td>
                                            <i class="fa fa-calendar"></i>
                                            {{ showDateTime($bonus->created_at) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
      {{ $transactionsBonus->links() }}
              </div>
            </div>
        </div>
    </div>

@endsection


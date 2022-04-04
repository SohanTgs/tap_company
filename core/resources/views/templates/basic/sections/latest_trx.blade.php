@php
    $deposits = App\Deposit::latest()->take(10)->get();
    $withdraws = App\Withdrawal::latest()->take(10)->get();
    $text = getContent('latest_trx.content',true);
@endphp

<div class="transaction_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading index2_heading index2_heading_center index3_heading ">
                        <h4>{{ __($text->data_values->title) }}</h4>
                        <h3>{{ __($text->data_values->heading) }}</h3>
                        <div class="line_shape line_shape2"></div>

                    </div>
                    <div class="x_offer_tabs_wrapper index3_offer_tabs">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"> deposits</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu2">withdraw</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="table_next_race index3_table_race league_table overflow-scroll">
                                        <table>
                                            <tr>
                                                <th class="form_table_resp">name</th>
                                                <th>date</th>
                                                <th>amount</th>
                                                <th>currency</th>
                                                <th>deposit</th>

                                            </tr>
                                        <tbody>
                                        @foreach($deposits as $value)
                                            <tr>
            @if($value->user->image == null)
            <td><img src="{{ getImage('assets/images/user/profile/'.'default.png') }}" height="50" style="border-radius: 50%;" alt="img"> <span>
                    @else
        <td><img src="{{ getImage('assets/images/user/profile/'.$value->user->image) }}" height="50" style="border-radius: 50%;" alt="img"> <span>
            @endif

                                                {{ $value->user->firstname.' '.$value->user->lastname }}
                                                </span></td>
                                                <td>{{ $value->created_at->format('M d, Y') }}</td>
                                                <td>{{ $general->cur_sym }}{{ number_format($value->amount,2) }}</td>
                                                <td>{{ $value->method_currency }}</td>
                                                <td>{{ diffForHumans($value->created_at) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="table_next_race index3_table_race league_table overflow-scroll">
                                        <table>
                                            <tr>
                                                <th class="form_table_resp">name</th>
                                                <th>date</th>
                                                <th>amount</th>
                                                <th>currency</th>
                                                <th>withdraw</th>

                                            </tr>
                                        <tbody>
                                        @foreach($withdraws as $value)
                                            <tr>
            @if($value->user->image == null)
                <td><img src="{{ getImage('assets/images/user/profile/'.'default.png') }}" height="50" style="border-radius: 50%;" alt="img"> <span>
                        @else
            <td><img src="{{ getImage('assets/images/user/profile/'.$value->user->image) }}" height="50" style="border-radius: 50%;" alt="img"> <span>
                        @endif
                                                <span>
                                                {{ $value->user->firstname.' '.$value->user->lastname }}
                                                </span></td>
                                                <td>{{ $value->created_at->format('M d, Y') }}</td>
                                                <td>{{ number_format($value->amount,2) }}</td>
                                                <td>{{ $value->currency }}</td>
                                                <td>{{ diffForHumans($value->created_at) }}</td>
                                            </tr>
                                        @endforeach
                                     </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

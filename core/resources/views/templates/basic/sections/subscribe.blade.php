@php
    $subscribe = getContent('subscribe.content',true);
@endphp

<div class="global_community_wrapper newsletter_wrapper index2_newsletter index3_newsletter float_left">
        <div class="container">
            <div class="row">
                <div class="global_comm_wraper news_cntnt">
                    <h1>{{ __($subscribe->data_values->heading) }}</h1>
                    <p>{{ __($subscribe->data_values->text) }}</p>
                    <div class="save_newsletter_field">
                    <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                        <input type="text" name="email" placeholder="Enter Your Email">
                        <button type="submit">{{ __($subscribe->data_values->subscribe_text) }}</button>
                    </form>
                    </div>
                </div>
                <div class="zero_balance_wrapper">
                    <div class="zero_commisition refreal_commison_section">
                        <h1>{{ __($subscribe->data_values->heading_two) }}</h1>
                        <p>{{ __($subscribe->data_values->text_two) }}</p>
                        <div class="about_btn refreal_btn index3_about_btn float_left">
                            <h3>{{ __($subscribe->data_values->commission) }}</h3>
                            <ul>
                                <li>
                                    <a href="{{ $subscribe->data_values->button_link }}">{{ __($subscribe->data_values->button_text) }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

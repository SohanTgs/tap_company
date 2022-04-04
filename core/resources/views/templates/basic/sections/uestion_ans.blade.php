@php
    $question = getContent('uestion_ans.content',true);
    $questions = getContent('uestion_ans.element')->take(3);
@endphp
<div class="faq_wrapper float_left">
        <div class="investment_overlay faq_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">

                    <div class="sv_heading_wraper heading_wrapper_dark index2_heading index2_heading_center index3_heading">
                        <h4>{{ __($question->data_values->title) }}</h4>
                        <h3>{{ __($question->data_values->heading) }}</h3>
                        <div class="line_shape line_shape2"></div>
                    </div>
                </div>
            </div>
            <div id="accordion" role="tablist">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        @php($i=1)
                        @foreach($questions as $value)
                        <div class="card index3_card">
                            <div class="card_pagee" role="tab" id="{{ $value->id }}">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#id" role="button" aria-expanded="false" aria-controls="id">
								         		{{ $value->data_values->question }}
								        	</a>
								     	 </h5>
                            </div>

                            <div id="id" class="collapse" role="tabpanel" aria-labelledby="{{ $value->id }}" data-parent="#accordion">
                                <div class="card-body">

                                    <div class="card_cntnt">
                                        <p> {{ $value->data_values->answer }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-12 col-md-12">
                <div class="about_btn calc_btn faqq_btn index3_about_btn  float_left">
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal">ask questions ?</a>
                        </li>
                    </ul>
                </div>
                <div class="modal fade question_modal index3_question_modal" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="sv_question_pop float_left">
                                        <h1>ask questions ? </h1>
                                        <div class="search_alert_box float_left">
                                    <form action="{{ route('contact.send') }}" method="post">
                                        @csrf
                                            <div class="apply_job_form">
                                               <input name="name" type="text" placeholder="@lang('Your Name')" class="form-control"
                                              value="{{ old('name') }}" required>
                                            </div>
                                            <div class="apply_job_form">
                                                <input name="email" type="text" placeholder="@lang('Enter E-Mail Address')" class="form-control"
                                                 value="{{old('email')}}" required>
                                            </div>
                                            <div class="apply_job_form">
                                                <input name="subject" type="text" placeholder="@lang('Write your subject')" class="form-control"
                                              value="{{old('subject')}}" required>
                                            </div>
                                            <div class="apply_job_form">
                                                <textarea name="message" wrap="off" placeholder="@lang('Write your message')"
                                                  class="form-control">{{old('message')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="question_sec float_left">
                                            <div class="about_btn calc_btn faqq_btn index3_about_btn  ques_Btn">
                                                <ul>
                                                    <li>
                                                        <a href="#"><input type="submit" class="btn" value="Submit" style="background:transparent"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </form>
                                            <div class="cancel_wrapper">
                                                <a href="#" class="" data-dismiss="modal">cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

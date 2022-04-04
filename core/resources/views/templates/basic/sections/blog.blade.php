@php
    $blog = getContent('blog.content',true);
    $blogs = getContent('blog.element')->take(3);
@endphp
<div class="our_blog_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">

                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading index2_heading index2_heading_center index3_heading">
                        <h4>{{ __($blog->data_values->title) }}</h4>
                        <h3>{{ __($blog->data_values->heading) }}</h3>
                        <div class="line_shape line_shape2"></div>

                    </div>
                </div>
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="blog_box_wrapper index2_blog_wrapepr index3_blog_wrapper float_left">
                        <div class="blog_img_wrapper">
                            <img src="{{ getImage('assets/images/frontend/blog/'.$blog->data_values->blog_image) }}" alt="blog_img">
                            <div class="blog_date_wrapper index2_blog_date index3_blog_date">
                                <p>{{ __($blog->created_at->format('d')) }}
                                    <br> <span>{{ __($blog->created_at->format('M')) }}</span></p>
                            </div>
                        </div>
                        <div class="btc_blog_indx_cont_wrapper">

                            <h5> <a href="{{ route('blog.details',['id'=>$blog->id,'slug'=>slug($blog->data_values->title)]) }}">{{ $blog->data_values->title }}</a></h5>
                            <p>{{ $blog->data_values->paragraph }}</p>
                        </div>
                        <div class="btc_blog_indx_cont_bottom">
                            <div class="btc_blog_indx_cont_bottom_left">
                                <p><i class="fa fa-user"></i> &nbsp;<a href="javascript:void(0)">by Admin</a></p>
                            </div>
                            <div class="btc_blog_indx_cont_bottom_right">
                                {{-- <p class="comments"><i class="fa fa-eye"></i>&nbsp;<a href="#"> --}}

                                </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

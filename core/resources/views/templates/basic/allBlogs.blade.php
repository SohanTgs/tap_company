@extends($activeTemplate.'layouts.frontend')
@section('content')

<div class="blog_category_wrapper fixed_portion float_left">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
            @foreach($blogs as $blog)
                    <div class="blog_category_box_wrapper blog_box_wrapper float_left">
                        <div class="blog_news_img_wrapper float_left">

                            <img src="{{ getImage('assets/images/frontend/blog/'.$blog->data_values->blog_image) }}" alt="blog_img">
                            <div class="blog_date_wrapper">
                                <p>{{ __($blog->created_at->format('d')) }}
                                    <br> <span>{{ __($blog->created_at->format('M')) }}</span></p>
                            </div>

                        </div>
                        <div class="lest_news_cont_wrapper float_left">

                            <div class="blog_heaidng_top">

                                <h3> <a href="{{ route('blog.details',['id'=>$blog->id,'slug'=>slug($blog->data_values->title)]) }}">{{ __($blog->data_values->title) }}</a></h3>

                            </div>
                            <div class="blog-single_cntnt">
                                <p>{{ __($blog->data_values->description) }}</p>

                            </div>

                            <div class="lest_news_cont_bottom float_left">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-user"></i>by Admin.</a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>
@endforeach


                    <div class="comments_wrapper float_left">
                        <div class="row">
                            {{ $blogs->links() }}
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar_widget">
                            <h4>Recent Post</h4>
                        </form>
                    </div>


                    <div class="sidebar_widget">
                        <div class="wrapper_second_blog wrapper_second_blog_2">
                    @foreach($recentBlogs as $blog)
                            <div class="blog_wrapper2">
                                <div class="blog_image">
                                    <img src="{{ getImage('assets/images/frontend/blog/'.$blog->data_values->blog_image) }}" class="img-responsive" alt="img" />
                                </div>
                                <div class="sv_blog_text">
                                    <h5><a href="{{ route('blog.details',['id'=>$blog->id,'slug'=>slug($blog->data_values->title)]) }}">{{ __($blog->data_values->title) }}</a></h5>
                                    <div class="blog_date blog_date_blog"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $blog->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                    @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

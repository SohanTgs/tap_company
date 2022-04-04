@php
$content = getContent('video.content',true);
@endphp

 <div class="works_wrapper float_left">
        <div class="work_banner_wrapper">
            <img src="{{ getImage('assets/images/frontend/video/'.$content->data_values->video_image) }}" alt="img">
        </div>
        <div class="howwork_banner_wrapper index2_homwork_banner_wrapper index3_banner_wrapper">
            <div class="vedio_link_wrapper">
                <a class="test-popup-link button" rel='external' href='{{ $content->data_values->video_link }}' title='title'><i class="fa fa-play"></i></a>
                <div class="work_content_wrap">
                    <h1>{{ __($content->data_values->heading) }}</h1>
                    <ul class="work_checklist_wrapper">
                        <li>
                            <a href="javasctipt:void(0)">
                                @php echo $content->data_values->icon @endphp
                                {{ __($content->data_values->text) }}
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>

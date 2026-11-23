@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

@php
    $videoSetting = json_decode($widget['setting'] ?? '{}', true) ?? [];
    $videoId = function_exists('widget_video_id') ? widget_video_id((string) ($videoSetting['video_id'] ?? '')) : null;
    $videoAutoplay = ! empty($videoSetting['autoplay']);
    $videoTitle = is_string($judul_widget ?? null) ? $judul_widget : $widget['judul'];
@endphp
@if ($videoId)
    <div class="single_bottom_rightbar">
        <h2><i class="fa fa-youtube"></i>&ensp;{{ $videoTitle }}</h2>
        <div class="box-body">
            <iframe
                src="https://www.youtube-nocookie.com/embed/{{ $videoId }}?autoplay={{ $videoAutoplay ? '1' : '0' }}&amp;mute={{ $videoAutoplay ? '1' : '0' }}&amp;playsinline=1"
                title="{{ $videoTitle }}"
                style="width:100%;min-height:200px;aspect-ratio:16/9;border:0"
                allow="autoplay; encrypted-media; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
    </div>
@endif

@props(["item"])

<div class="col-lg-4 col-md-6 video-item">
    <div class="video-preview">
        <a data-fancybox href="https://www.youtube.com/watch?v={{ $item->yt_video_id }}"><img src="https://img.youtube.com/vi/{{ $item->yt_video_id }}/maxresdefault.jpg" alt=""></a>
    </div>
    <div class="video-meta">
        <p>{{ $item->title }}</p>
        <p>{{ $item->description }}</p>
        <p><a data-text="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#descriptionModal">{{ __('Читать описание') }}</a></p>
    </div>
    <div id="desc-block_{{ $item->id }}" class="desc-block">
        <h2>{{ $item->title }}</h2>
        {!! $item->content !!}
    </div>
</div>

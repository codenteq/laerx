@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{$lesson->title}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <div class="gap-audio player-accessible w-100">
                        <audio>
                            <source src="{{imagePath($lesson->file)}}" type="audio/mpeg">
                        </audio>
                    </div>

                    <article class="mt-3 p-3">
                        <p>
                            {!! $lesson->content !!}
                        </p>
                    </article>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{$lesson->title}}</title>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/gh/greghub/green-audio-player/dist/css/green-audio-player.min.css">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/greghub/green-audio-player/dist/js/green-audio-player.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new GreenAudioPlayer('.gap-audio', {showTooltips: true, showDownloadButton: true, enableKeystrokes: true});
        });
    </script>
@endsection

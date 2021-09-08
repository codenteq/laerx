@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{$lesson->title}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.lesson.index')}}">Derslerim</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$lesson->title}}</li>
                    </ol>
                </nav>
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
                            Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı
                            bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini
                            alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak
                            kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek
                            değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren
                            Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
                            sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
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

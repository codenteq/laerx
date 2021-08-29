@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Blog adı buraya gelecek</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('user.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('user.lessons.index')}}"><i class="fas fa-home"></i> Derslerim</a> /</span>
                    <span class="active">Blog adı buraya gelecek</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <audio controls style="width: 100%">
                        <source src="http://commondatastorage.googleapis.com/codeskulptor-assets/Epoq-Lepidoptera.ogg"
                                type="audio/mpeg">
                    </audio>

                    <blockquote class="blockquote">
                        <p>
                            Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı
                            bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini
                            alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak
                            kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek
                            değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren
                            Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
                            sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
                        </p>
                        <p>
                            Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem
                            Ipsum kullanmanın amacı, sürekli 'buraya metin gelecek, buraya metin gelecek' yazmaya
                            kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok
                            masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak
                            Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında 'lorem ipsum' anahtar sözcükleri ile
                            arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde,
                            bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri
                            geliştirilmiştir.
                        </p>
                    </blockquote>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Blog adı buraya gelecek</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

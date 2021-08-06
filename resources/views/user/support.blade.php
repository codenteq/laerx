@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Destek</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('user.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Destek</span>
                </figcaption>
            </figure>
            <div class="row">
                <form class="form-control p-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingWhy" placeholder="İletişim Nedeniniz?">
                        <label for="floatingWhy">İletişim Nedeniniz?</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPhone"
                               placeholder="Sizinle iletişime geçmemiz için Telefon veya E-Posta adresi bilgisi - İsteğe bağlı">
                        <label for="floatingPhone">Sizinle iletişime geçmemiz için Telefon veya E-Posta adresi
                            bilgisi - İsteğe bağlı</label>
                    </div>

                    <div class="form-floating">
                            <textarea class="form-control" placeholder="Mesajınız" id="floatingTextarea"
                                      style="height: 100px"></textarea>
                        <label for="floatingTextarea">Mesajınız</label>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-success">Gönder</button>
                        <button type="button" class="btn btn-danger">İptal</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Destek</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection


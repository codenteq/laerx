@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Bildirim Oluştur</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('manager.notification.index')}}"><i class="fas fa-bell"></i> Bildirimler</a> /</span>
                    <span class="active">Bildirim Oluştur</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @foreach($users as $user)
                            @if($user->info->companyId === companyId())
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="{{$user->id}}"
                                           id="notificationUser{{$user->id}}">
                                    <label class="form-check-label" for="notificationUser{{$user->id}}">
                                        {{$user->name .' '. $user->surname}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <br>
                        <div class="form-floating">
                                <textarea class="form-control h-100" placeholder="Bildirim Mesajı" name="message" id="floatingTextarea2"></textarea>
                            <label for="floatingTextarea2">Bildirim Mesajı</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.notification.index')}}" class="btn btn-danger">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Bildirim Oluştur</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.notification.store')}}';
        const backUrl = '{{route('manager.notification.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection


@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Eğitmenler</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Eğitmenler</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.course-teacher.create')}}" class="btn btn-success">Yeni Eğitmen
                            Ekle</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Eposta</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Kayıt Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @if ($user->user->type === 2)
                                <tr>
                                    <th scope="row">{{$user->user->name .' '. $user->user->surname}}</th>
                                    <td>{{$user->user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td class="{{$user->status === 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$user->status === 1 ? 'Aktif' : 'Pasif'}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('manager.course-teacher.edit',$user->userId)}}"><i
                                                class="fas fa-user-edit"></i></a>
                                        <button class="btn"
                                                onclick="deleteButton(this,`${{route('manager.course-teacher.destroy',$user->userId)}}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Eğitmenler</title>

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
        const backUrl = '{{route('manager.course-teacher.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

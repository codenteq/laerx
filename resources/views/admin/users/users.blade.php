@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kullanıcı Listesi</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Listesi</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('admin.manager-user.create')}}" class="btn btn-success">Kullanıcı Oluştur</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Adı Soyadı</th>
                            <th>TCKN</th>
                            <th>Telefon</th>
                            <th>Şirket</th>
                            <th>Dil</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->user->type === 2)
                                <tr>
                                    <td>{{$user->user->name .' '. $user->user->surname}}</td>
                                    <td>{{$user->user->tc}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->company->title}}</td>
                                    <td>{{$user->language->title}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <a href="{{route('admin.manager-user.edit',$user->userId)}}"><i
                                                class="fas fa-user-edit"></i></a>
                                        <button class="btn"
                                                onclick="deleteButton(this,`${{route('admin.manager-user.destroy',$user->userId)}}`)">
                                            <i
                                                class="fas fa-trash-alt"></i></button>
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

    <title>Kullanıcı Listesi</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('admin.manager-user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection

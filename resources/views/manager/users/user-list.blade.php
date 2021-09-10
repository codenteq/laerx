@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer Listesi</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user-operations')}}">Kursiyer İşlemleri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kursiyer Listesi</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.user.create')}}" class="btn btn-success">Kursiyer Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Seç</th>
                            <th>Adı Soyadı</th>
                            <th>TCKN</th>
                            <th>Dönem</th>
                            <th>Ay</th>
                            <th>Grup</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @if ($user->user->type === 3)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    </td>
                                    <td>{{$user->user->name .' '. $user->user->surname}}</td>
                                    <td>{{$user->user->tc}}</td>
                                    <td>{{$user->period->title}}</td>
                                    <td>{{$user->month->title}}</td>
                                    <td>{{$user->group->title}}</td>
                                    <td>{{$user->status === 0 ? 'Pasif' : 'Aktif'}}</td>
                                    <td>
                                        <a href="{{route('manager.user.edit',$user->userId)}}">
                                            <i class="bi bi-pen text-dark"></i>
                                        </a>
                                        <button class="btn"
                                                onclick="deleteButton(this,`${{route('manager.user.destroy',$user->userId)}}`)">
                                            <i class="bi bi-trash"></i>
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

    <title>Kursiyer Listesi</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection


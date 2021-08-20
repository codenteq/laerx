@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Destek</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Destek</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 overflow-scroll">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">TCKN</th>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Destek Nedeni</th>
                            <th scope="col">İletişim Telefon</th>
                            <th scope="col">Oluşturulma Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supports as $support)
                            <tr>
                                <td>{{$support->user->tc}}</td>
                                <td>{{$support->user->name .' '. $support->user->surname}}</td>
                                <td>{{$support->subject}}</td>
                                <td>{{$support->info->phone}}</td>
                                <td>{{$support->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#supportShow{{$support->id}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="supportShow{{$support->id}}" data-bs-backdrop="static"
                                         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{$support->user->name .' '. $support->user->surname}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$support->message}}
                                                </div>
                                                <div class="modal-footer">
                                                    <form name="form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="button" onclick="modalCreateAndUpdateButton(`${{route('manager.support.update',$support)}}`)" class="btn btn-primary">Tamamlandı</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Destek</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

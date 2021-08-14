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
                <div class="col-12 col-lg-12">
                    <table class="table">
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

@endsection

@section('js')

@endsection

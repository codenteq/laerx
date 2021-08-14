@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araçlar</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment')}}"><i class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span class="active">Araçlar</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.car.create')}}" class="btn btn-success">Araç Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th scope="col">Plaka</th>
                            <th scope="col">Türü</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <th scope="row">{{$car->plate_code}}</th>
                                <td>{{$car->type->title}}</td>
                                <td class="{{$car->status === 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$car->status === 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>
                                    <a href="{{route('manager.car.edit',$car)}}"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('manager.car.destroy',$car)}}`)">
                                        <i
                                            class="fas fa-trash-alt"></i></button>
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

    <title>Araçlar</title>

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
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

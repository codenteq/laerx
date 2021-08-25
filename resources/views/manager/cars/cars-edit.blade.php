@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araç Ekle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment-car')}}">Araç & Randevular</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.car.index')}}">Araçlar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Araç Düzenle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="plate_code" placeholder="Araç Plaka"
                                   value="{{$car->plate_code}}">
                            <label for="floatingFirst">Araç Plaka</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($cartypes as $type)
                                    <option
                                        value="{{$type->id}}" {{$car->typeId === $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Araç Türü</label>
                        </div>

                        <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked"
                                {{$car->status === 1 ? 'checked' : null}}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Araç Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.car.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Araç Düzenle</title>

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
        const actionUrl = '{{route('manager.car.update',$car)}}';
        const backUrl = '{{route('manager.car.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection


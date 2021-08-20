@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevu Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment-car')}}"><i
                                class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span><a href="{{route('manager.appointment.index')}}"><i
                                class="fas fa-car"></i> Randevular</a> /</span>
                    <span class="active">Randevu Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating">
                            <select class="form-select" name="userId" aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name .' '. $user->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kursiyer</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="teacherId" aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name .' '. $teacher->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Eğitmen</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="carId" aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}">{{$car->plate_code}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Araç</label>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="date" placeholder="Tarih"
                                   min="{{\Carbon\Carbon::now()->toDateString()}}">
                            <label for="floatingAddress">Tarih</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.appointment.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Randevu Ekle</title>

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
        const actionUrl = '{{route('manager.appointment.store')}}';
        const backUrl = '{{route('manager.appointment.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

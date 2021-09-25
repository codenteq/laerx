@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.appointment_create')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment-car')}}">{{__('manager/menu.car_appointment')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment.index')}}">{{__('manager/menu.appointment')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.appointment_create')}}</li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating">
                            <select class="form-select" name="userId" aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name .' '. $user->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.trainee')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="teacherId" aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name .' '. $teacher->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.teacher')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="carId" aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}">{{$car->plate_code}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.car')}}</label>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="date" placeholder="Tarih"
                                   min="{{\Carbon\Carbon::now()->toDateString()}}">
                            <label for="floatingAddress">{{__('manager/car-appointment/appointment-add-edit.date')}}</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/car-appointment/appointment-add-edit.save_btn')}}</button>
                            <a href="{{route('manager.appointment.index')}}" class="btn btn-danger">{{__('manager/car-appointment/appointment-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.appointment_create')}}</title>

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

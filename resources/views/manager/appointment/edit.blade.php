@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.appointment_edit')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating">
                            <select class="form-select" name="userId">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($users as $user)
                                    <option
                                        value="{{$user->id}}" {{$appointment->userId === $user->id ? 'selected' : null}}>{{$user->name .' '. $user->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.trainee')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="teacherId">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($teachers as $teacher)
                                    <option
                                        value="{{$teacher->id}}" {{$appointment->teacherId === $teacher->id ? 'selected' : null}}>{{$teacher->name .' '. $teacher->surname}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.teacher')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="carId">
                                <option disabled selected>{{__('manager/car-appointment/appointment-add-edit.select')}}</option>
                                @foreach($cars as $car)
                                    <option
                                        value="{{$car->id}}" {{$appointment->carId === $car->id ? 'selected' : null}}>{{$car->plate_code}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/appointment-add-edit.car')}}</label>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="date" placeholder="Tarih"
                                   min="{{\Carbon\Carbon::now()->toDateString()}}"
                                   value="{{$appointment->date}}">
                            <label for="floatingAddress">{{__('manager/car-appointment/appointment-add-edit.date')}}</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/car-appointment/appointment-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.appointment.index')}}" class="btn btn-danger">{{__('manager/car-appointment/appointment-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.appointment_edit')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.appointment.update',$appointment)}}';
        const backUrl = '{{route('manager.appointment.index')}}';
    </script>
    @include('partials.script')
@endsection

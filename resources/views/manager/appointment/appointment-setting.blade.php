@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.appointment_setting')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment-car')}}">{{__('manager/menu.car_appointment')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.appointment_setting')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">

                    <div class="card col-12 col-md-8">
                        <h5 class="card-header"><i class="bi bi-calendar4-range fs-5"></i>&nbsp;{{__('manager/car-appointment/appointment-setting.appointment_day')}}</h5>
                        <div class="card-body">
                            <form name="form-data">
                                @csrf
                                <h5 class="card-title">{{__('manager/car-appointment/appointment-setting.appointment_day_info')}}</h5>
                                <div class="row p-5x p-4">
                                    @foreach($months as $key => $val)
                                        @foreach ($val as $keys => $value)
                                            <div class="form-check col-4">
                                                <input class="form-check-input" type="checkbox" value="{{$keys}}"
                                                       name="{{rand()}}"
                                                       id="month{{$keys}}" {{$value == true ? 'checked' : null}}>
                                                <label class="form-check-label" for="month{{$keys}}">
                                                    {{$keys}}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">
                                        {{__('manager/car-appointment/appointment-setting.save_btn')}}
                                    </button>
                                    <a href="{{route('manager.appointment-car')}}" class="btn btn-danger">{{__('manager/car-appointment/appointment-setting.cancel_btn')}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.appointment_setting')}}</title>

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
        const actionUrl = '{{route('manager.appointment.setting.store')}}';
        const backUrl = '{{route('manager.appointment.setting')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

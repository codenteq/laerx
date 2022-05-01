@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.car_appointment')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.car_appointment')}}</li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2 mt-2 fast-access-top">
                        <a href="{{route('manager.car.index')}}">
                            <i class="bi bi-minecart-loaded fs-1"></i><br>
                            <span>{{__('manager/menu.car')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2 mt-2">
                        <a href="{{route('manager.appointment.index')}}">
                            <i class="bi bi-calendar4-range fs-1"></i><br>
                            <span>{{__('manager/menu.appointment')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5 mt-2 fast-access-bottom">
                        <a href="{{route('manager.appointment.setting')}}">
                            <i class="bi bi-sliders fs-1"></i><br>
                            <span>{{__('manager/menu.appointment_setting')}}</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.car_appointment')}}</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

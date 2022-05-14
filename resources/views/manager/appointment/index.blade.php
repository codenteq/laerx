@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.appointment')}}</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('manager.appointment.create')}}" class="btn btn-success">{{__('manager/menu.appointment_create')}}</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.trainee')}}</th>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.teacher')}}</th>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.car')}}</th>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.date')}}</th>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.status')}}</th>
                            <th scope="col">{{__('manager/car-appointment/appointment-list.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <th scope="row">{{$appointment->user->name .' '. $appointment->user->surname}}</th>
                                <td>{{$appointment->teacher->name .' '. $appointment->teacher->surname}}</td>
                                <td>{{$appointment->car->plate_code}}</td>
                                <td>{{$appointment->date}}</td>
                                <td class="{{$appointment->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$appointment->status === 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>
                                    <a href="{{route('manager.appointment.edit',$appointment)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('manager.appointment.destroy',$appointment)}}`)">
                                        <i class="bi bi-trash"></i>
                                    </button>
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
    <title>{{__('manager/menu.appointment')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('manager.appointment.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

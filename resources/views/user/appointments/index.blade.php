@extends('user.layout.app')

@section('content')
    @include('user.appointments.create')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.my_appointment')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mb-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createAppointment">
                        {{__('user/my-appointment.create_appontment')}}
                    </button>
                </div>
                <div class="col-12 col-lg-12 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('user/my-appointment.teacher')}}</th>
                            <th scope="col">{{__('user/my-appointment.date')}}</th>
                            <th scope="col">{{__('user/my-appointment.status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <th scope="row">{{$appointment->user->name .' '. $appointment->user->surname}}</th>
                                <td>{{$appointment->date}}</td>
                                <td class="{{$appointment->status == 1 ? 'text-success' : 'text-danger'}}">{{$appointment->status == 1 ? 'Aktif' : 'Pasif'}}</td>
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

    <title>{{__('user/menu.my_appointment')}}</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/tr.js"></script>
    <script>
        const dateInput = document.querySelector("#date");
        const fp = flatpickr(dateInput, {
            locale: "tr",
            minDate: "today",
            disableMobile: "true"
        });  // flatpickr
    </script>
    <script>
        const actionUrl = '{{route('user.appointment.store')}}';
        const backUrl = '{{route('user.appointment.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

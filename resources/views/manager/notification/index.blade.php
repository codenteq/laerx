@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.notifications')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mb-3">
                    <h4><a href="{{route('manager.notification.create')}}" class="btn btn-success">{{__('manager/menu.notification_create')}}</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/notification.message')}}</th>
                            <th scope="col">{{__('manager/notification.status')}}</th>
                            <th scope="col">{{__('manager/notification.date')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$notification->message}}</td>
                                <td class="{{$notification->status == 0 ? 'text-warning' : 'text-success'}} fw-bold">{{$notification->status == 0 ? 'Gönderiliyor' : 'Gönderildi'}}</td>
                                <td>{{$notification->created_at}}</td>
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
    <title>{{__('manager/menu.notifications')}}</title>
@endsection

@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
@endsection

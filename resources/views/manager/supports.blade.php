@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.support')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/support.tc')}}</th>
                            <th scope="col">{{__('manager/support.name_surname')}}</th>
                            <th scope="col">{{__('manager/support.why')}}</th>
                            <th scope="col">{{__('manager/support.contact_phone')}}</th>
                            <th scope="col">{{__('manager/support.created_at')}}</th>
                            <th scope="col">{{__('manager/support.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supports as $support)
                            <tr>
                                <td>{{$support->user->tc}}</td>
                                <td>{{$support->user->name .' '. $support->user->surname}}</td>
                                <td>{{$support->subject}}</td>
                                <td>{{$support->info->phone}}</td>
                                <td>{{$support->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#supportShow{{$support->id}}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="modal fade" id="supportShow{{$support->id}}" data-bs-backdrop="static"
                                         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{$support->user->name .' '. $support->user->surname}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$support->message}}
                                                </div>
                                                <div class="modal-footer">
                                                    <form name="form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="button" onclick="modalCreateAndUpdateButton(`${{route('manager.support.update',$support)}}`)" class="btn btn-success">{{__('manager/support.done_btn')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <title>{{__('manager/menu.support')}}</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

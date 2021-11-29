@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.trainee_list')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{route('manager.user.operations')}}">{{__('manager/menu.trainee_transactions')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.trainee_list')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 row">
                    <h4>
                        <a href="{{route('manager.user.create')}}"
                           class="btn btn-success">{{__('manager/menu.new_trainee')}}</a>
                        <a href="{{route('manager.user.excel-export')}}"
                           class="btn btn-warning">{{__('manager/user/trainee-list.list_print')}}</a>
                    </h4>
                </div>
                <div class="mt-3 justify-content-around">
                    <form class="row g-2" method="get">
                        <div class="form-floating col-md-4">
                            <select class="form-select" id="floatingSelect1" name="period"
                                    onchange="this.form.submit()">
                                <option value="0">Hepsi</option>
                                @foreach($periods as $period)
                                    <option
                                        value="{{$period->id}}" {{$period->id == request()->get('period') ? 'selected' : null}}>{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect1">{{__('manager/user/trainee-add-edit.period')}}</label>
                        </div>
                        <div class="form-floating col-md-4">
                            <select class="form-select" id="floatingSelect2" name="month" onchange="this.form.submit()">
                                <option value="0">Hepsi</option>
                                @foreach($months as $month)
                                    <option
                                        value="{{$month->id}}" {{$month->id == request()->get('month') ? 'selected' : null}}>{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect2">{{__('manager/user/trainee-add-edit.month')}}</label>
                        </div>
                        <div class="form-floating col-md-4">
                            <select class="form-select" id="floatingSelect3"
                                    id="floatingSelect3" name="group" onchange="this.form.submit()">>
                                <option value="0">Hepsi</option>
                                @foreach($groups as $group)
                                    <option
                                        value="{{$group->id}}" {{$group->id == request()->get('group') ? 'selected' : null}}>{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect3">{{__('manager/user/trainee-add-edit.group')}}</label>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{__('manager/user/trainee-list.name_surname')}}</th>
                            <th>{{__('manager/user/trainee-list.tc')}}</th>
                            <th>{{__('manager/user/trainee-list.period')}}</th>
                            <th>{{__('manager/user/trainee-list.month')}}</th>
                            <th>{{__('manager/user/trainee-list.group')}}</th>
                            <th>{{__('manager/user/trainee-list.status')}}</th>
                            <th>{{__('manager/user/trainee-list.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->user->name .' '. $user->user->surname}}</td>
                                <td>{{$user->user->tc}}</td>
                                <td>{{$user->period->title}}</td>
                                <td>{{$user->month->title}}</td>
                                <td>{{$user->group->title}}</td>
                                <td>{{$user->status == 0 ? 'Pasif' : 'Aktif'}}</td>
                                <td>
                                    <a href="{{route('manager.user.edit',$user->userId)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('manager.user.destroy',$user->userId)}}`)">
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

    <title>{{__('manager/menu.trainee_list')}}</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection


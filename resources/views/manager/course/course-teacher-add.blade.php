@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.teacher_create')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.course-teacher.index')}}">{{__('manager/menu.teachers')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.teacher_create')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN" maxlength="11">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.tc')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Ad">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Soyad">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.surname')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-posta">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.email')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Şifre">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.password')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">{{__('manager/teacher/teacher-add-edit.password_repeat')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.phone')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress" placeholder="Adres"
                                   name="address">
                            <label for="floatingAddress">{{__('manager/teacher/teacher-add-edit.address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="languageId"
                                    aria-label="Floating label select example">
                                @foreach ($languages as $language)
                                    <option
                                        value="{{$language->id}}">{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/teacher/teacher-add-edit.language')}}...</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('manager/teacher/teacher-add-edit.teacher_checkbox')}}</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/teacher/teacher-add-edit.save_btn')}}</button>
                            <a href="{{route('manager.course-teacher.index')}}" class="btn btn-danger">{{__('manager/teacher/teacher-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.teacher_create')}}</title>

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
        const actionUrl = '{{route('manager.course-teacher.store')}}';
        const backUrl = '{{route('manager.course-teacher.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection


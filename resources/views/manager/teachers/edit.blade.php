@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.teacher_edit')}}</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('put')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN" maxlength="11" value="{{$user->user->tc}}">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.tc')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Ad" value="{{$user->user->name}}">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Soyad" value="{{$user->user->surname}}">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.surname')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-posta" value="{{$user->user->email}}">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.email')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.new_password')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">{{__('manager/teacher/teacher-add-edit.new_password_repeat')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon" value="{{$user->phone}}">
                            <label for="floatingFirst">{{__('manager/teacher/teacher-add-edit.phone')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress" placeholder="Adres"
                                   name="address"
                                   value="{{$user->address}}">
                            <label for="floatingAddress">{{__('manager/teacher/teacher-add-edit.address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="languageId">
                                @foreach ($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$language->id == $user->languageId ? 'selected' : null}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/teacher/teacher-add-edit.language')}}...</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked" {{$user->status == 1 ? 'checked' : null}}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('manager/teacher/teacher-add-edit.teacher_checkbox')}}</label>

                        <div class="mt-3">
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
    <title>{{__('manager/menu.teacher_edit')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.course-teacher.update',$user->userId)}}';
        const backUrl = '{{route('manager.course-teacher.index')}}';
    </script>
    @include('partials.script')
@endsection


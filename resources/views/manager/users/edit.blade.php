@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.edit_trainee')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="row g-2 col-md-12">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="tc" placeholder="TCKN"
                                       value="{{$user->user->tc}}">
                                <label for="floatingFirst">{{__('manager/user/trainee-add-edit.tc')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Üye Adı"
                                       value="{{$user->user->name}}">
                                <label for="floatingFirst">{{__('manager/user/trainee-add-edit.name')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="surname" placeholder="Üye Soyadı"
                                       value="{{$user->user->surname}}">
                                <label for="floatingLast">{{__('manager/user/trainee-add-edit.surname')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Eposta Adresi"
                                       value="{{$user->user->email}}">
                                <label for="floatingMail">{{__('manager/user/trainee-add-edit.email_address')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                                <label>{{__('manager/user/trainee-add-edit.new_password')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="password-confirm" placeholder="Şifre">
                                <label
                                    for="floatingLast">{{__('manager/user/trainee-add-edit.new_password_repeat')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası"
                                       value="{{$user->phone}}">
                                <label for="floatingPhone">{{__('manager/user/trainee-add-edit.phone')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Adres"
                                       value="{{$user->address}}">
                                <label for="floatingAddress">{{__('manager/user/trainee-add-edit.address')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" id="floatingSelect" name="periodId">
                                    @foreach($periods as $period)
                                        <option
                                            value="{{$period->id}}" {{$user->periodId == $period->id ? 'selected' : null}}>{{$period->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.period')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="monthId">
                                    @foreach($months as $month)
                                        <option
                                            value="{{$month->id}}" {{$user->monthId == $month->id ? 'selected' : null}}>{{$month->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.month')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="groupId">
                                    @foreach($groups as $group)
                                        <option
                                            value="{{$group->id}}" {{$user->groupId == $group->id ? 'selected' : null}}>{{$group->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.group')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="languageId">
                                    @foreach($languages as $language)
                                        <option
                                            value="{{$language->id}}" {{$user->languageId == $language->id ? 'selected' : null}}>{{$language->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.language')}}</label>
                            </div>

                            <div class="input-group mb-3 col-md-6">
                                <input type="file" class="form-control" name="photo">
                                <label class="input-group-text"
                                       for="inputGroupFile02">{{__('manager/user/trainee-add-edit.profile_photo')}}</label>
                            </div>

                            <div class="form-check form-switch mb-3 col-md-6">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                       name="status" value="1"
                                    {{$user->status == 1 ? 'checked' : null}}>
                                <label class="form-check-label"
                                       for="flexSwitchCheckChecked">{{__('manager/user/trainee-add-edit.status')}}</label>
                            </div>

                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()"
                                    class="btn btn-success">{{__('manager/user/trainee-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.user.index')}}"
                               class="btn btn-danger">{{__('manager/user/trainee-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.edit_trainee')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.user.update',$user->userId)}}';
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    @include('partials.script')
@endsection

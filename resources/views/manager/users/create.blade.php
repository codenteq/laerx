@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.new_trainee')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf

                       <div class="row g-2 col-md-12">
                           <div class="form-floating mb-3 col-md-6">
                               <input type="text" class="form-control" name="tc" placeholder="TCKN" maxlength="11">
                               <label for="floatingFirst">{{__('manager/user/trainee-add-edit.tc')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="text" class="form-control" name="name" placeholder="Üye Adı">
                               <label for="floatingFirst">{{__('manager/user/trainee-add-edit.name')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="text" class="form-control" name="surname" placeholder="Üye Soyadı">
                               <label for="floatingLast">{{__('manager/user/trainee-add-edit.surname')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="email" class="form-control" name="email" placeholder="Eposta Adresi">
                               <label for="floatingMail">{{__('manager/user/trainee-add-edit.email_address')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="password" class="form-control" name="password" placeholder="Şifre">
                               <label>{{__('manager/user/trainee-add-edit.password')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                               <label for="floatingLast">{{__('manager/user/trainee-add-edit.password_repeat')}}</label>
                           </div>

                           <div class="form-floating mb-3 col-md-6">
                               <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası">
                               <label for="floatingPhone">{{__('manager/user/trainee-add-edit.phone')}}</label>
                           </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Adres">
                                <label for="floatingAddress">{{__('manager/user/trainee-add-edit.address')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" id="floatingSelect" name="periodId">
                                    @foreach($periods as $period)
                                        <option value="{{$period->id}}">{{$period->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.period')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="monthId">
                                    @foreach($months as $month)
                                        <option value="{{$month->id}}">{{$month->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.month')}}</label>
                            </div>


                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="groupId">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.group')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="languageId">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.language')}}</label>
                            </div>
                            <div class="input-group mb-3 col-md-6">
                                <input type="file" class="form-control" name="photo">
                                <label class="input-group-text" for="inputGroupFile02">{{__('manager/user/trainee-add-edit.profile_photo')}}</label>
                            </div>
                           <div class="form-check form-switch col-md-6">
                               <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" value="1"
                                      checked>
                               <label class="form-check-label" for="flexSwitchCheckChecked">{{__('manager/user/trainee-add-edit.status')}}</label>
                           </div>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/user/trainee-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.user.index')}}" class="btn btn-danger">{{__('manager/user/trainee-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.new_trainee')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.user.store')}}';
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    @include('partials.script')
@endsection

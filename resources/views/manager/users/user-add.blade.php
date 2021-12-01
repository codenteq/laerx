@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.new_trainee')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.operations')}}">{{__('manager/menu.trainee_transactions')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.index')}}">{{__('manager/menu.trainee_list')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.new_trainee')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
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
                                <select class="form-select" id="floatingSelect" name="periodId"
                                        aria-label="Floating label select example">
                                    @foreach($periods as $period)
                                        <option value="{{$period->id}}">{{$period->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.period')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="monthId" aria-label="Floating label select example">
                                    @foreach($months as $month)
                                        <option value="{{$month->id}}">{{$month->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.month')}}</label>
                            </div>


                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="groupId" aria-label="Floating label select example">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.group')}}</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="languageId" aria-label="Floating label select example">
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

                        <div class="mt-3 mb-5">
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
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.user.store')}}';
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

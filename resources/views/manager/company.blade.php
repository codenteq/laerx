@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.company_edit')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="title" placeholder="Şirket Adı"
                                           value="{{$company->title}}">
                                    <label for="floatingFirst">{{__('manager/company.name')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="tax_no" maxlength="11"
                                           placeholder="Vergi No" value="{{$company->info->tax_no}}">
                                    <label for="floatingFirst">{{__('manager/company.tax_no')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail"
                                           value="{{$company->info->email}}">
                                    <label for="floatingFirst">{{__('manager/company.email')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="website_url" placeholder="Web Site"
                                           value="{{$company->info->website_url}}">
                                    <label for="floatingFirst">{{__('manager/company.website')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Telefon"
                                           value="{{$company->info->phone}}">
                                    <label for="floatingFirst">{{__('manager/company.phone')}}</label>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" onchange="countryChange()" id="country" name="countryId"
                                            aria-label="Floating label select example">
                                        <option disabled selected>{{__('manager/company.select')}}</option>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{$country->id}}" {{$company->info->countryId == $country->id ? 'selected' : null}}>{{$country->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">{{__('manager/company.country')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" onchange="cityChange()" id="city" name="cityId"
                                            aria-label="Floating label select example">
                                        @foreach($cities as $city)
                                            <option
                                                value="{{$city->id}}" {{$company->info->cityId == $city->id ? 'selected' : null}}>{{$city->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">{{__('manager/company.city')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" name="stateId" id="state"
                                            aria-label="Floating label select example">
                                        @foreach($states as $state)
                                            <option
                                                value="{{$state->id}}" {{$company->info->stateId == $state->id ? 'selected' : null}}>{{$state->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">{{__('manager/company.state')}}</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="zip_code" placeholder="Posta Kodu"
                                           value="{{$company->info->zip_code}}">
                                    <label for="floatingFirst">{{__('manager/company.zipcode')}}</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="logo">
                                    <label class="input-group-text" for="inputGroupFile02">{{__('manager/company.logo')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="address" placeholder="Adres"
                                   value="{{$company->info->address}}">
                            <label for="floatingFirst">{{__('manager/company.address')}}</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/company.save_btn')}}
                            </button>
                            <a href="{{route('manager.dashboard')}}" class="btn btn-danger">{{__('manager/company.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.company_edit')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.company.update')}}';
        const backUrl = '{{route('manager.company.edit')}}';
    </script>
    <script>
        function countryChange() {
            const countryId = document.getElementById("country").value;
            const cityUrl = "{{route('city')}}/" + countryId;
            axios.get(cityUrl).then(res => {
                var option = "";
                Object.keys(res.data).forEach(key => {
                    option += "<option value=" + res.data[key].id + ">" + res.data[key].title + "</option>";
                });
                document.getElementById("city").innerHTML = option;
            });
        }

        function cityChange() {
            const cityId = document.getElementById("city").value;
            const stateUrl = "{{route('state')}}/" + cityId;
            axios.get(stateUrl).then(res => {
                var option = "";
                Object.keys(res.data).forEach(key => {
                    option += "<option value=" + res.data[key].id + ">" + res.data[key].title + "</option>";
                });
                document.getElementById("state").innerHTML = option;
            });
        }
    </script>
    @include('partials.script')
@endsection


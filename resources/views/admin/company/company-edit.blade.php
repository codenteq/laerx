@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Şirket Güncelle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">Şirketler</a></li>
                        <li class="breadcrumb-item">Şirket Güncelle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="title" placeholder="Şirket Adı"
                                           value="{{$company->title}}">
                                    <label for="floatingFirst">Şirket Adı</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="tax_no" maxlength="11"
                                           placeholder="Vergi No" value="{{$company->info->tax_no}}">
                                    <label for="floatingFirst">Vergi No</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail"
                                           value="{{$company->info->email}}">
                                    <label for="floatingFirst">E-mail</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="website_url" placeholder="Web Site"
                                           value="{{$company->info->website_url}}">
                                    <label for="floatingFirst">Web Site</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Telefon"
                                           value="{{$company->info->phone}}">
                                    <label for="floatingFirst">Telefon</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" onchange="countryChange()" id="country" name="countryId"
                                            aria-label="Floating label select example">
                                        <option disabled selected>Seçiniz</option>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{$country->id}}" {{$company->info->countryId == $country->id ? 'selected' : null}}>{{$country->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Ülke</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" onchange="cityChange()" id="city" name="cityId"
                                            aria-label="Floating label select example">
                                        @foreach($cities as $city)
                                            <option
                                                value="{{$city->id}}" {{$company->info->cityId == $city->id ? 'selected' : null}}>{{$city->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">İl</label>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">

                                <div class="form-floating mb-3">
                                    <select class="form-select" name="stateId" id="state"
                                            aria-label="Floating label select example">
                                        @foreach($states as $state)
                                            <option
                                                value="{{$state->id}}" {{$company->info->stateId == $state->id ? 'selected' : null}}>{{$state->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">İlçe</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="Adres"
                                           value="{{$company->info->address}}">
                                    <label for="floatingFirst">Adres</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="zip_code" placeholder="Posta Kodu"
                                           value="{{$company->info->zip_code}}">
                                    <label for="floatingFirst">Posta Kodu</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" name="packageId"
                                            aria-label="Floating label select example">
                                        <option disabled selected>Seçiniz</option>
                                        @foreach($packages as $package)
                                            <option
                                                value="{{$package->id}}" {{$company->info->packageId == $package->id ? 'selected' : null}}>{{$package->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Paket</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="start_date"
                                           placeholder="Başlangıç Tarihi" value="{{$invoice->start_date}}">
                                    <label for="floatingFirst">Başlangıç Tarihi</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="end_date" placeholder="Bitiş Tarihi"
                                           value="{{$invoice->end_date}}">
                                    <label for="floatingFirst">Bitiş Tarihi</label>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="logo">
                                    <label class="input-group-text" for="inputGroupFile02">Logo</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.company.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Şirket Düzenle</title>

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
        const actionUrl = '{{route('admin.company.update',$company)}}';
        const backUrl = '{{route('admin.company.index')}}';
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
    <script src="{{asset('js/post.js')}}"></script>
@endsection


@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Paket Güncelle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form class="form-control" name="form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPackageName" name="title" value="{{$package->title}}">
                            <label for="floatingPackageName">Paket Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Paket Açıklaması" id="floatingTextarea2" style="height: 100px">
                                {!! $package->description !!}
                            </textarea>
                            <label for="floatingTextarea2">Paket Açıklaması</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" id="floatingPrice" value="{{$package->price}}">
                            <label for="floatingPrice">Fiyat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="planId"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($paymentPlans as $paymentPlan)
                                    <option
                                        value="{{$paymentPlan->id}}" {{$package->planId == $paymentPlan->id ? 'selected' : null}}>{{$paymentPlan->description}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Ödeme Planı</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.package.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Paket Düzenle</title>

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
        const actionUrl = '{{route('admin.package.update',$package)}}';
        const backUrl = '{{route('admin.package.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

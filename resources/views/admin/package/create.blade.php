@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Paket Oluştur</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPackageName" name="title">
                            <label for="floatingPackageName">Paket Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Paket Açıklaması"
                                      id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Paket Açıklaması</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" id="floatingPrice">
                            <label for="floatingPrice">Fiyat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="planId">
                                <option disabled selected>Seçiniz</option>
                                @foreach($paymentPlans as $paymentPlan)
                                    <option
                                        value="{{$paymentPlan->id}}">{{$paymentPlan->description}}</option>
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
    <title>Paket Oluştur</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.package.store')}}';
        const backUrl = '{{route('admin.package.index')}}';
    </script>
    @include('partials.script')
@endsection

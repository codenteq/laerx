@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ödeme Planı Oluştur</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="month" placeholder="Ay">
                            <label for="floatingFirst">Ay</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Açıklama">
                            <label for="floatingFirst">Açıklama</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.payment-plan.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>Ödeme Planı Oluştur</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.payment-plan.store')}}';
        const backUrl = '{{route('admin.payment-plan.index')}}';
    </script>
    @include('partials.script')
@endsection

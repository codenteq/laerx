@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kupon Oluştur</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 ">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code" placeholder="Kupon Kodu">
                            <label for="floatingFirst">Kupon Kodu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="discount" placeholder="İndirim Oranı">
                            <label for="floatingFirst">İndirim Oranı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="start_date"
                                   placeholder="Başlangıç Tarihi">
                            <label for="floatingFirst">Başlangıç Tarihi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="end_date" placeholder="Bitiş Tarihi">
                            <label for="floatingFirst">Bitiş Tarihi</label>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.coupon.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Şirket Oluştur</title>

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
        const actionUrl = '{{route('admin.coupon.store')}}';
        const backUrl = '{{route('admin.coupon.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection


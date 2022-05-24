@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kupon Güncelle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code" placeholder="Kupon Kodu"
                                   value="{{$coupon->code}}">
                            <label for="floatingFirst">Kupon Kodu</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="discount" placeholder="İndirim Oranı"
                                   value="{{$coupon->discount}}">
                            <label for="floatingFirst">İndirim Oranı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="start_date"
                                   placeholder="Başlangıç Tarihi" value="{{$coupon->start_date}}">
                            <label for="floatingFirst">Başlangıç Tarihi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="end_date" placeholder="Bitiş Tarihi"
                                   value="{{$coupon->end_date}}">
                            <label for="floatingFirst">Bitiş Tarihi</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">
                                Kaydet
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
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.coupon.update',$coupon)}}';
        const backUrl = '{{route('admin.coupon.index')}}';
    </script>
    @include('partials.script')
@endsection


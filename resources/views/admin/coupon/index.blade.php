@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kuponlar</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('admin.coupon.create')}}" class="btn btn-success">Kupon Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Kupon kodu</th>
                            <th>İndirim Oranı</th>
                            <th>Başlangıç tarihi</th>
                            <th>Bitiş tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->discount}}</td>
                                <td>{{$coupon->start_date}}</td>
                                <td>{{$coupon->end_date}}</td>
                                <td>
                                    <a href="{{route('admin.coupon.edit',$coupon->id)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Kuponlar</title>

@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.coupon.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

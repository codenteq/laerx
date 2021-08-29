@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Şirketler</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item">Şirketler</li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('admin.company.create')}}" class="btn btn-success">Şirket Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>İd</th>
                            <th>Seç</th>
                            <th>Şirket Adı</th>
                            <th>Kalan Gün</th>
                            <th>Ödeme</th>
                            <th>Durum</th>
                            <th>Güncelleme Tarih</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></td>
                                <td>{{$company->title}}</td>
                                <td>{{invoiceDiffDate($company->id)}}</td>
                                <td class="{{$company->invoice->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$company->invoice->status == 1 ? 'Ödeme Alındı' : 'Ödeme Alınmadı'}}</td>
                                <td class="text-success fw-bold">Aktif</td>
                                <td>{{$company->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.company.edit',$company->id)}}"><i
                                            class="fas fa-user-edit"></i></a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('admin.company.destroy',$company)}}`)"><i
                                            class="fas fa-trash-alt"></i></button>
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

    <title>Şirketler</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('admin.company.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection

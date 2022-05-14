@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Şirketler</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('admin.company.create')}}" class="btn btn-success">Şirket Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>İd</th>
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
                                <td>{{$company->title}}</td>
                                <td>{{invoiceDiffDate($company->id)}}</td>
                                <td class="{{$company->invoice->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$company->invoice->status == 1 ? 'Ödeme Alındı' : 'Ödeme Alınmadı'}}</td>
                                <td class="{{$company->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$company->status == 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>{{$company->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.company.edit',$company->id)}}" class="me-2">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <a href="{{route('admin.company.invoice',$company->id)}}">
                                        <i class="bi bi-receipt text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.company.destroy',$company)}}`)">
                                        <i
                                            class="bi bi-trash"></i>
                                    </button>
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
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.company.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

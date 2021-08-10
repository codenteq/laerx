@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Şirletler</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Şirletler</span>
                </figcaption>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('admin.company.create')}}" class="btn btn-success">Şirket Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>İd</th>
                            <th>Seç</th>
                            <th>Şirket Adı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
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
                                <td>{{$company->start_date}}</td>
                                <td>{{$company->end_date}}</td>
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
@endsection

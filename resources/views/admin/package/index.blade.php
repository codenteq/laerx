@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Paketler</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('admin.package.create')}}" class="btn btn-success">Paket Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Paket Adı</th>
                            <th>Paket Fiyat</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>{{$package->title}}</td>
                                <td>{{$package->price}}</td>
                                <td>
                                    <a href="{{route('admin.package.edit',$package)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.package.destroy',$package)}}`)">
                                        <i class="bi bi-trash"></i>
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
    <title>Paketler</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.package.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

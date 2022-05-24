@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Diller</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('admin.language.create')}}" class="btn btn-success">Dil Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Kodu</th>
                            <th>Adı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{$language->code}}</td>
                                <td>{{$language->title}}</td>
                                <td>
                                    <a href="{{route('admin.language.edit',$language)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button
                                        onclick="deleteButton(this,`${{route('admin.language.destroy',$language)}}`)">
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
    <title>Diller</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.language.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

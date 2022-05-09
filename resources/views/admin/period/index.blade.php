@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Dönemler</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('admin.period.create')}}" class="btn btn-success">Dönem Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Dönem</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($periods as $period)
                            <tr>
                                <td>{{$period->title}}</td>
                                <td>
                                    <a href="{{route('admin.period.edit',$period)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.period.destroy',$period)}}`)">
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

    <title>Dönemler</title>

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
        const backUrl = '{{route('admin.period.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection

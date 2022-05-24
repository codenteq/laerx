@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Dönem Güncelle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="title" placeholder="Dönem"
                                   value="{{$period->title}}">
                            <label for="floatingFirst">Dönem</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.period.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>Dönem Düzenle</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.period.update',$period)}}';
        const backUrl = '{{route('admin.period.index')}}';
    </script>
    @include('partials.script')
@endsection

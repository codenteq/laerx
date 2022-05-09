@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.home')}}</h2>
                </blockquote>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between"></div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('user/menu.panel')}}</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

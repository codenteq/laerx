@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.trainee_transactions')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.trainee_transactions')}}</li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.create')}}">
                            <i class="bi bi-person-plus fs-1"></i><br>
                            <span>{{__('manager/menu.new_trainee')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.index')}}">
                            <i class="bi bi-person-check fs-1"></i><br>
                            <span>{{__('manager/menu.trainee_list')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('manager.user.excel-import')}}">
                            <i class="bi bi-file-earmark-spreadsheet fs-1"></i><br>
                            <span>{{__('manager/menu.new_trainee_excel')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.mebbis.import')}}">
                            <i class="bi bi-person-plus fs-1"></i><br>
                            <span>Mebbis {{__('manager/menu.new_trainee')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('manager.user.results')}}">
                            <i class="bi bi-clipboard-data fs-1"></i><br>
                            <span>{{__('manager/menu.trainee_report')}}</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.trainee_transactions')}}</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

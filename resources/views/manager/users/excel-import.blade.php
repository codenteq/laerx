@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.new_trainee_excel')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.operations')}}">{{__('manager/menu.trainee_transactions')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.index')}}">{{__('manager/menu.trainee_list')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.new_trainee_excel')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <div class="text-wrap p-3">
                        <p class="fs-5"></p>
                        <ul class="list-unstyled">
                            <li>{{__('manager/user/trainee-excel-import.info_title')}}</li>
                            <li>{{__('manager/user/trainee-excel-import.info_required_fields')}}
                                <ul>
                                    <li>{{__('manager/user/trainee-excel-import.info_1')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_2')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_3')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_4')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_5')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_6')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_7')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_8')}}</li>
                                    <li>{{__('manager/user/trainee-excel-import.info_9')}}</li>
                                </ul>
                            </li>
                            <li class="text-danger fw-bold mb-3 mt-2">{{__('manager/user/trainee-excel-import.info_note')}}</li>
                            <li><a href="{{asset('/files/kursiyer-excel-sablon.xls')}}" class="btn btn-primary" target="_blank"><i class="bi bi-download me-2"></i>{{__('manager/user/trainee-excel-import.download_template_btn')}}</a></li>
                        </ul>
                    </div>
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="excel">
                            <label class="input-group-text" for="inputGroupFile02">{{__('manager/user/trainee-excel-import.upload_excel_list_file_input')}}</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/user/trainee-excel-import.save_btn')}}
                            </button>
                            <a href="{{route('manager.user.index')}}" class="btn btn-danger">{{__('manager/user/trainee-excel-import.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.new_trainee_excel')}}</title>

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
        const actionUrl = '{{route('manager.user.excel-import.create')}}';
        const backUrl = '{{route('manager.user.excel-import')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

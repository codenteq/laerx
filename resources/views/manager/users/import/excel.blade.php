@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.new_trainee_excel')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
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
                            <li><a href="{{asset('/files/kursiyer-excel-sablon.xls')}}" class="btn btn-success" target="_blank"><i class="bi bi-download me-2"></i>{{__('manager/user/trainee-excel-import.download_template_btn')}}</a></li>
                        </ul>
                    </div>
                    <form name="form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="excel">
                            <label class="input-group-text" for="inputGroupFile02">{{__('manager/user/trainee-excel-import.upload_excel_list_file_input')}}</label>
                        </div>

                        <div>
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
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.user.excel-import.create')}}';
        const backUrl = '{{route('manager.user.excel-import')}}';
    </script>
    @include('partials.script')
@endsection

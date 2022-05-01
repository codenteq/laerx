@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Mebbis {{__('manager/menu.new_trainee')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-md-3">
                                <select class="form-select" id="floatingSelect1" name="periodId"
                                        >
                                    @foreach($periods as $period)
                                        <option
                                            value="{{$period->id}}" >{{$period->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect1">{{__('manager/user/trainee-add-edit.period')}}</label>
                            </div>
                            <div class="form-floating col-md-3">
                                <select class="form-select" id="floatingSelect2" name="monthId" >
                                    @foreach($months as $month)
                                        <option
                                            value="{{$month->id}}" >{{$month->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect2">{{__('manager/user/trainee-add-edit.month')}}</label>
                            </div>
                            <div class="form-floating col-md-3">
                                <select class="form-select" id="floatingSelect3"
                                        id="floatingSelectd" name="groupId" >>
                                    @foreach($groups as $group)
                                        <option
                                            value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectd">{{__('manager/user/trainee-add-edit.group')}}</label>
                            </div>
                            <div class="form-floating col-md-3">
                                <select class="form-select" name="languageId"
                                        aria-label="Floating label select example">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{__('manager/user/trainee-add-edit.language')}}</label>
                            </div>

                        </div>

                        <textarea id="ckeditor" name="content"></textarea>

                        <input type="hidden" name="ck_editor" value="1">

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()"
                                    class="btn btn-success">{{__('manager/user/trainee-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.user.index')}}"
                               class="btn btn-danger">{{__('manager/user/trainee-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Mebbis {{__('manager/menu.new_trainee')}}</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script>
        const actionUrl = '{{route('manager.user.mebbis.store')}}';
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

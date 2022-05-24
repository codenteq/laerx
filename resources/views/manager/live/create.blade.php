@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.live_lesson_create')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="live_date">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.date')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Ders Adı">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url" placeholder="Ders Link">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.link')}}</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.type')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="periodId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.period')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="monthId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($months as $month)
                                    <option value="{{$month->id}}">{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.month')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="groupId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.group')}}</label>
                        </div>

                        <br>

                        {{--<div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="flexSwitchCheckChecked"
                                   checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('manager/live-lesson/live-lesson-add-edit.trainee_checkbox')}}</label>
                        </div>

                        <br>--}}

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/live-lesson/live-lesson-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.live-lesson.index')}}" class="btn btn-danger">{{__('manager/live-lesson/live-lesson-add-edit.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.live_lesson_create')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.live-lesson.store')}}';
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    @include('partials.script')
@endsection

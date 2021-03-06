@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.live_lesson_edit')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="live_date" placeholder="Tarih"
                                   value="{{\Carbon\Carbon::parse($live_lesson->live_date)->format("Y-m-d\TH:i:s")}}">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.date')}} </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Üye Adı"
                                   value="{{$live_lesson->title}}">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url" placeholder="Ders Link"
                                   value="{{$live_lesson->url}}">
                            <label for="floatingFirst">{{__('manager/live-lesson/live-lesson-add-edit.link')}}</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$live_lesson->typeId == $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.type')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="periodId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($periods as $period)
                                    <option
                                        value="{{$period->id}}" {{$live_lesson->periodId == $period->id ? 'selected' : null}}>{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.period')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="monthId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($months as $month)
                                    <option
                                        value="{{$month->id}}" {{$live_lesson->monthId == $month->id ? 'selected' : null}}>{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.month')}}</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="groupId">
                                <option selected disabled>{{__('manager/live-lesson/live-lesson-add-edit.select')}}</option>
                                @foreach($groups as $group)
                                    <option
                                        value="{{$group->id}}" {{$live_lesson->groupId == $group->id ? 'selected' : null}}>{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/live-lesson/live-lesson-add-edit.group')}}</label>
                        </div>

                        <br>

                        {{--<div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked"
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
    <title>{{__('manager/menu.live_lesson_edit')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.live-lesson.update',$live_lesson)}}';
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    @include('partials.script')
@endsection

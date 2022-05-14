@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.live_lesson')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('manager.live-lesson.create')}}" class="btn btn-success">Ders Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/live-lesson/live-lesson-list.name')}}</th>
                            <th scope="col">{{__('manager/live-lesson/live-lesson-list.join')}}</th>
                            <th scope="col">{{__('manager/live-lesson/live-lesson-list.type')}}</th>
                            <th scope="col">{{__('manager/live-lesson/live-lesson-list.date')}}</th>
                            <th scope="col">{{__('manager/live-lesson/live-lesson-list.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($live_lessons as $live_lesson)
                            <tr>
                                <td>{{$live_lesson->title}}</td>
                                <td>
                                    <a href="{{url($live_lesson->url)}}" target="_blank" class="btn btn-light">{{__('manager/live-lesson/live-lesson-list.join_btn')}}</a>
                                </td>
                                <td>{{$live_lesson->type->title}}</td>
                                <td>{{$live_lesson->live_date}}</td>
                                <td>
                                    <a href="{{route('manager.live-lesson.edit',$live_lesson)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('manager.live-lesson.destroy',$live_lesson)}}`)">
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
    <title>{{__('manager/menu.live_lesson')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.class_exam_create')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form class="form-control" name="form-data" onchange="changeValue()">
                        @csrf
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect1" name="periodId"
                                    aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/class_exam.select')}}</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect1">{{__('manager/class_exam.period')}}</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect2" name="monthId"
                                    aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/class_exam.select')}}</option>
                                @foreach($months as $month)
                                    <option value="{{$month->id}}">{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect2">{{__('manager/class_exam.month')}}</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect3" name="groupId"
                                    aria-label="Floating label select example">
                                <option disabled selected>{{__('manager/class_exam.select')}}</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect3">{{__('manager/class_exam.class')}}</label>
                        </div>

                        @foreach($types as $type)
                            <label class="form-label">{{$type->title}}</label>
                            <div class="input-group mb-3">
                                <input name="{{$type->id}}" type="range" class="form-range" min="1" max="25"
                                       oninput="this.nextElementSibling.value = this.value">
                                <output>13</output>
                            </div>
                        @endforeach

                        <div class="col-md-3 rounded mb-5">
                            <label class="fw-bold text-danger">
                                {{__('manager/class_exam.question_length')}} : <span id="total"></span>
                            </label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/class_exam.save_btn')}}
                            </button>
                            <a href="{{route('manager.car.index')}}" class="btn btn-danger">{{__('manager/class_exam.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.class_exam_create')}}</title>

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
        const actionUrl = '{{route('manager.class-exam.store')}}';
        const backUrl = '{{route('manager.class-exam.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script>

        let output = document.getElementsByTagName("output");
        var total = 0;
        for (let item of output) {
            let itemOutput = parseInt(item.textContent);
            total += itemOutput;
        }
        document.querySelector('#total').innerHTML = total;

        function changeValue() {
            let output = document.getElementsByTagName("output");
            var total = 0;
            for (let item of output) {
                let itemOutput = parseInt(item.textContent);
                total += itemOutput;
            }
            document.querySelector('#total').innerHTML = total;
        }

    </script>
    @include('layouts.script')
@endsection

@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.car_create')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="plate_code" placeholder="Araç Plaka">
                            <label for="floatingFirst">{{__('manager/car-appointment/car.plate_code')}}</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId">
                                @foreach($cartypes as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/car-appointment/car.type')}}</label>
                        </div>

                        <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('manager/car-appointment/car.car_checkbox')}}</label>
                        </div>

                        <br>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/car-appointment/car.save_btn')}}</button>
                            <a href="{{route('manager.car.index')}}" class="btn btn-danger">{{__('manager/car-appointment/car.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>Araç Ekle</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.car.store')}}';
        const backUrl = '{{route('manager.car.index')}}';
    </script>
    @include('partials.script')
@endsection


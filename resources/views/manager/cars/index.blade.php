@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.car')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{route('manager.car.create')}}" class="btn btn-success">{{__('manager/menu.car_create')}}</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/car-appointment/car.plate_code')}}</th>
                            <th scope="col">{{__('manager/car-appointment/car.type')}}</th>
                            <th scope="col">{{__('manager/car-appointment/car.status')}}</th>
                            <th scope="col">{{__('manager/car-appointment/car.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <th scope="row">{{$car->plate_code}}</th>
                                <td>{{$car->type->title}}</td>
                                <td class="{{$car->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$car->status == 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>
                                    <a href="{{route('manager.car.edit',$car)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('manager.car.destroy',$car)}}`)">
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
    <title>{{__('manager/menu.car')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('manager.car.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection

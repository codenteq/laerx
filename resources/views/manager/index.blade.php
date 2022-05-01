@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.home')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.dashboard')}}</li>
                    </ol>
                </nav>
            </figure>

            <!-- pay modal -->
        @if(session('invoice'))
            @include('manager.modal-component.pay-method')
        @endif
        <!-- pay modal end -->

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="alert alert-info w-100 text-start fast-access-top" role="alert">
                        @if(session('invoice'))
                            <i class="bi bi-info-square me-2"></i>{{__('manager/index.info_payment_error')}}
                            <button type="button" class="btn btn-success ms-3" data-bs-toggle="modal"
                                    data-bs-target="#pay">
                                {{__('manager/index.pay_btn')}}
                            </button>
                        @else
                            <i class="bi bi-info-square me-2"></i> {{__('manager/index.info_payment_success')}}{{invoiceDiffDate(companyId())}}
                        @endif
                    </div>
                    @if(session('invoice') != true)
                        <div class="col base p-5 mt-3">
                            <a href="{{route('manager.live-lesson.index')}}">
                                <i class="bi bi-camera-video fs-1"></i><br>
                                <span>{{__('manager/menu.live_lesson')}}</span>
                            </a>
                        </div>
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
                        <div class="col base p-5 mb-2">
                            <a href="{{route('manager.user.results')}}">
                                <i class="bi bi-clipboard-data fs-1"></i><br>
                                <span>{{__('manager/menu.trainee_report')}}</span>
                            </a>
                        </div>
                        <div class="col base p-5 mb-2">
                            <a href="{{route('manager.appointment-car')}}">
                                <i class="bi bi-calendar4-range fs-1"></i><br>
                                <span>{{__('manager/menu.car_appointment')}}</span>
                            </a>
                        </div>
                        <div class="col base p-5 mb-5 fast-access-bottom">
                            <a href="{{route('manager.support.index')}}">
                                <i class="bi bi-info-circle fs-1"></i><br>
                                <span>{{__('manager/menu.support')}}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.manager_panel')}}</title>

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
        const actionUrl = '{{route('coupon.code')}}';
    </script>
    <script src="{{asset('js/payment.js')}}"></script>
@endsection

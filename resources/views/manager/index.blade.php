@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.home')}}</h2>
                </blockquote>
            </figure>

            <!-- pay modal -->
            @if(session('invoice'))
                @include('manager.modal-component.pay-method')
            @endif
            <!-- pay modal end -->

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="alert alert-info w-100 text-start" role="alert">
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
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('coupon.code')}}';
    </script>
    <script src="{{asset('js/payment.js')}}"></script>
    @include('partials.script')
@endsection

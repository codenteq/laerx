@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.invoices')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.invoices')}}</li>
                    </ol>
                </nav>
            </figure>

            <!-- pay modal -->
        @if(session('invoice'))
            @include('manager.modal-component.pay-method')
        @endif
        <!-- pay modal end -->

            <div class="row">
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/invoice.number')}}</th>
                            <th scope="col">{{__('manager/invoice.date')}}</th>
                            <th scope="col">{{__('manager/invoice.general_total')}}</th>
                            <th scope="col">{{__('manager/invoice.status')}}</th>
                            <th scope="col">{{__('manager/invoice.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <th scope="row">{{$invoice->id}}</th>
                                <td>{{$invoice->created_at}}</td>
                                <td>{{$invoice->total_amount}}</td>
                                <td class="{{$invoice->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$invoice->status == 1 ? 'Ödendi' : 'Ödenmedi'}}</td>
                                <td>
                                    @if(session('invoice'))
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pay">
                                            <i class="bi bi-credit-card text-dark fs-5"></i>
                                        </button>
                                    @endif
                                    <a href="{{route('manager.invoice.show',$invoice)}}" target="_blank">
                                        <i class="bi bi-eye me-2 text-dark fs-5"></i>
                                    </a>
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

    <title>{{__('manager/menu.invoices')}}</title>

@endsection

@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script>
        const actionUrl = '{{route('coupon.code')}}';
    </script>
    <script src="{{asset('js/payment.js')}}"></script>
@endsection

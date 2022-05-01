@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Faturalar</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Fatura İd</th>
                            <th scope="col">Fatura Tarihi</th>
                            <th scope="col">Genel Toplam</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlemler</th>
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
                                    <a href="{{route('admin.company.invoice.show',$invoice)}}" target="_blank">
                                        <i class="bi bi-eye text-dark fs-5"></i>
                                    </a>
                                    @if($invoice->status == 0)
                                        <button type="button" class="btn mb-2" data-bs-toggle="modal" data-bs-target="#pay{{$invoice->id}}">
                                            <i class="bi bi-credit-card text-dark fs-5"></i>
                                        </button>
                                        @include('admin.company.invoice.pay')
                                    @endif
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

    <title>Faturalar</title>

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
    @include('layouts.script')
    <script>
        const actionUrl = '{{route('coupon.code',$companyId)}}';
    </script>
    <script>
        function confirmPay() {
            axios.post('{{route('admin.company.invoice.confirm.pay')}}',{
                 companyId: {{$companyId}}
            }).then(res => {
                if (res.data.status == true) {
                    toastr.success(res.data.message, res.data.title);
                    setTimeout(() => {
                        location.reload();
                    }, 3500)
                } else {
                    toastr.error(res.data.message, res.data.title);
                }
            });
        }
    </script>
    <script src="{{asset('js/payment.js')}}"></script>
@endsection

<div class="modal fade" id="pay" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Ödeme Seçeneğini Seçiniz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($payment_methods as $payment)
                    <button type="button" class="btn btn-primary col-md-12 mb-3" data-bs-toggle="modal"
                            data-bs-target="#pay{{$payment->code}}">
                        {{$payment->title}}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if($payment_methods->where('code','wire_transfer')->where('status',1)->first())
    <div class="modal fade" id="paywire_transfer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Banka Havalesi ile Ödeme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="fw-bold">Ödenecek Tutar: {{$invoice->price}}</span>
                    <p>Aşağıdaki iban adresine ödenecek tutar'ı göndermeniz halinde sisteminiz açılacaktır.</p>
                    <p>Not: Mesaj kısmına <b>adınızı soyadınızı ve şirket adınızı yazınız</b></p>
                    <span>Iban : {{$payment_methods->where('code','wire_transfer')->pluck('description')->first()}}</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Geri git
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if($payment_methods->where('code','online')->where('status',1)->first())
    <div class="modal fade" id="payonline" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel3">Online Ödeme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="coupon-form">
                    @csrf
                    <div class="modal-body">
                        <span class="fw-normal mb-3">Ödenecek Tutar: {{$invoice->price}}</span><br>
                        <span id="discount" class="fw-normal mb-3"></span><br>
                        <span id="total_amount" class="fw-bold mb-3 test-success"></span>
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" name="coupon_code" placeholder="Kupon kodu" aria-label="Kupon kodu"
                                   aria-describedby="button-addon2">
                            <button class="btn btn-outline-success" type="button" id="button-addon2" onclick="couponCodeBtn()">Uygula</button>
                        </div>
                        <a class="btn btn-success col-md-12" href="{{route('manager.pay.online')}}">Öde</a>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Geri git
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

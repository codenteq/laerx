<div class="modal fade" id="pay{{$invoice->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel3">Ödeme Onaylama</h5>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success col-md-12" onclick="confirmPay()">Onayla</button>
                </div>
            </form>
        </div>
    </div>
</div>

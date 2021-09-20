function couponCodeBtn() {
    const total_amount = document.getElementById('total_amount');
    const discount = document.getElementById('discount');

    total_amount.innerHTML = '';
    discount.innerHTML = '';

    const formData = document.forms.namedItem('coupon-form');
    const form = new FormData(formData);
    axios.post(actionUrl, form).then(res => {
        if (res.data.status == false) {
            toastr.error(res.data.message, res.data.title);
        } else {
            discount.innerHTML += `İndirim Yapılan Tutar : ${res.data.discount}`;
            total_amount.innerHTML += `Toplam Ödenecek Tutar : ${res.data.total_amount}`;
        }

    });
}

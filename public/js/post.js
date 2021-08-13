const btn = document.querySelector(".btn-success");
function createAndUpdateButton() {
    btn.disabled = true;
    btn.innerHTML = 'Kaydediliyor...';
    const formData = document.forms.namedItem('form-data');
    const form = new FormData(formData);
    axios.post(actionUrl, form).then(res => {
        if (res.data.status === true) {
            toastr.success(res.data.message, res.data.title);
            setTimeout(() => {
                window.location.href = backUrl;
            }, 3500)
        } else {
            toastr.error(res.data.message, res.data.title);
            btn.disabled = true;
            btn.innerHTML = 'Kaydet';
        }
    }).catch(err => {
        let error = err.response.data.errors;
        console.log(error);
        for (const [key, value] of Object.entries(error)) {
            toastr.error(value, 'Başarısız');
        }
        btn.disabled = false;
        btn.innerHTML = 'Kaydet';
    })
}
const table = document.querySelector('#example');
function deleteButton(r, actionUrl) {
    const list = r.parentNode.parentNode.rowIndex;
    if (confirm('Silmek İstediğinize eminmisiniz ?') === true) {
        axios.delete(actionUrl.replace('$',''), {
            _method: 'DELETE',
        }).then(res => {
            if (res.data.status === true) {
                toastr.success(res.data.message, res.data.title);
                table.deleteRow(list);
            } else {
                toastr.error(res.data.message, res.data.title);
            }
        })
    }

}



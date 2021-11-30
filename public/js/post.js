const btn = document.querySelector(".btn-success");

function createAndUpdateButton() {
    btn.disabled = true;
    btn.innerHTML = 'Kaydediliyor...';

    const formData = document.forms.namedItem('form-data');
    if (formData.ck_editor) {
        CKEDITOR.instances['ckeditor'].updateElement();
    }
    const form = new FormData(formData);
    axios.post(actionUrl, form).then(res => {
        if (res.data.status === true) {
            toastr.success(res.data.message, res.data.title);
            btn.disabled = false;
            btn.innerHTML = 'Kaydet';
            setTimeout(() => {
                window.location.href = backUrl;
            }, 3500)
        } else {
            toastr.error(res.data.message, res.data.title);
            btn.disabled = false;
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

const table = document.querySelector('#data-table');

function deleteButton(r, actionUrl) {
    const list = r.parentNode.parentNode.rowIndex;
    if (confirm('Silmek istediğinize emin misiniz ?') === true) {
        axios.delete(actionUrl.replace('$', ''), {
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

function multipleDeleteButton(actionUrl) {
    let ArrCheck = [];
    let check_inputs = document.querySelectorAll("input[name='_check']");
    check_inputs.forEach((input) => {
        input.checked === true ? ArrCheck.push(input.value) : null;
    })
    if (confirm('Silmek istediğinize emin misiniz ?') === true) {
        axios.delete(actionUrl.replace('$', ''), {
            data: {
                _token: __token,
                ids: ArrCheck
            }
        }).then(res => {
            if (res.data.status === true) {
                toastr.success(res.data.message, res.data.title);
                setTimeout(() => {
                    location.reload()
                }, 3000)
            } else {
                toastr.error(res.data.message, res.data.title);
            }
        })
    }
}

function modalCreateAndUpdateButton(actionUrl) {
    const formData = document.forms.namedItem('form-data');
    const form = new FormData(formData);
    axios.post(actionUrl.replace('$', ''), form).then(res => {
        if (res.data.status === true) {
            toastr.success(res.data.message, res.data.title);
        } else {
            toastr.error(res.data.message, res.data.title);
        }
    })
}



function checkAll() {
    let inputs = document.querySelectorAll("input[name='_check']");
    inputs.forEach(function (element) {
        element.checked = true;
    })
    this.onclick = uncheckAll;
}

function uncheckAll() {
    let inputs = document.querySelectorAll("input[name='_check']");
    inputs.forEach(function (element) {
        element.checked = false;
    })
    this.onclick = checkAll;
}

let el = document.getElementById("checkAll");
el.onclick = checkAll;

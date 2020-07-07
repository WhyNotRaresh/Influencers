function like(btn, id) {
    if (btn.classList.contains('btn-outline-success')) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var jsonResponse = JSON.parse(this.response);
                btn.classList.replace('btn-outline-success', 'btn-success');
                document.getElementById('total-votes').innerText = jsonResponse.likes;
            }
        }
        xmlhttp.open('GET', '/article/like/' + id.toString(), true);
        xmlhttp.send();
    }
}
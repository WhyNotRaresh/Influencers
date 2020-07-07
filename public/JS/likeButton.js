function like(btn) {
    if (btn.classList.contains('btn-outline-success')) {
        var xmlhttp = new XMLHttpRequest();
        var id = "{{ article.getId() }}";
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var jsonResponse = JSON.parse(this.response);
                btn.classList.replace('btn-outline-success', 'btn-success');
                document.getElementById('total-votes').innerText = jsonResponse.likes;
            }
        }
        xmlhttp.open('GET', '/article_like/' + id, true);
        xmlhttp.send();
    }
}
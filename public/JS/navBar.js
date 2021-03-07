function toggleDarkMode(btn) {
    var state;
    if (btn.classList.contains('fa-toggle-off')) {
        btn.classList.replace('fa-toggle-off', 'fa-toggle-on');
        state = 'on';
    } else {
        btn.classList.replace('fa-toggle-on', 'fa-toggle-off');
        state = 'off';
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var body = document.getElementsByTagName('body')[0];
            if (body.style.backgroundColor.indexOf('rgb(241, 241, 241)') > -1) {
                body.style.backgroundColor = '#2f302e';
            } else {
                body.style.backgroundColor = '#f1f1f1';
            }
            document.getElementsByName('myFrame')[0].contentWindow.location.reload();
        }
    }
    xmlhttp.open('GET', '/settings/darkmode/' + state, true);
    xmlhttp.send();
}


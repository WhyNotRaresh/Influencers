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

    }
    xmlhttp.send('GET', '/settings/darkmode/' + state, true);
    xmlhttp.open();
}
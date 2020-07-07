function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");

    var a = document.getElementById("myDropdown").getElementsByTagName("a");
    for (i = 0 ; i < 3; i++) {
        a[i].style.display = "none";
    }
}

function filterFunction() {
    var input, a, i, txt, tagList;
    input = document.getElementById("myInput");
    txt = input.value.toLowerCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");

    if (txt.localeCompare("") != 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                tagList = JSON.parse(this.responseText);
            }
        }
        xmlhttp.open('GET', '/get/tags/' + txt, false);
        xmlhttp.send();
    } else {
        for (i = 0 ; i < 3; i++) {
            a[i].style.display = "none";
        }
        return;
    }

    for (i = 0; i < tagList.length; i++) {
        a[i].style.display = "";
        a[i].innerText = tagList[i].tagName;
        a[i].href = "#" + tagList[i].id.toString() + "__#" + tagList[i].tagName;
    }
    for ( ; i < 3; i++) {
        a[i].style.display = "none";
    }
}
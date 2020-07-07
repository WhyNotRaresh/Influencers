function splitScreen() {
    var iframeDiv = document.getElementById('iframeContainer');
    var artList = document.getElementById('articleList');

    artList.classList.replace('w-75', 'w-50');
    artList.classList.remove('container-fluid');
    iframeDiv.attributes.removeNamedItem('hidden');
    iframeDiv.getElementsByTagName('iframe')[0].attributes.removeNamedItem('hidden');
}

function stopSplitScreen() {
    var iframeDiv = document.getElementById('iframeContainer');
    var artList = document.getElementById('articleList');

    artList.classList.replace('w-50', 'w-75');
    artList.classList.add('container-fluid');
    iframeDiv.attributes.setNamedItem(document.createAttribute('hidden'));
    iframeDiv.getElementsByTagName('iframe')[0].attributes.setNamedItem(document.createAttribute('hidden'));
}
var btncopy = document.querySelector('.js-copy');
if(btncopy) {
    btncopy.addEventListener('click', docopy);
}

function docopy() {
    var target = this.dataset.target;
    var fromElement = document.querySelector(target);
    if(!fromElement) return;

    var range = document.createRange();
    var selection = window.getSelection();
    range.selectNode(fromElement);
    selection.removeAllRanges();
    selection.addRange(range);

    try {
        var result = document.execCommand('copy');
        if (result) {
            alert('Lien de téléchargement copié dans le presse-papier !');
        }
    }
    catch(err) {
        alert(err);
    }

    selection = window.getSelection();
    if (typeof selection.removeRange === 'function') {
        selection.removeRange(range);
    } else if (typeof selection.removeAllRanges === 'function') {
        selection.removeAllRanges();
    }
}

var btncopy = document.querySelector('.js-copy2');
if(btncopy) {
    btncopy.addEventListener('click', docopy);
}

function docopy() {

    var target = this.dataset.target;
    var fromElement = document.querySelector(target);
    if(!fromElement) return;

    var range = document.createRange();
    var selection = window.getSelection();
    range.selectNode(fromElement);
    selection.removeAllRanges();
    selection.addRange(range);

    try {
        var result = document.execCommand('copy');
        if (result) {
            alert('Lien de suppression copié dans le presse-papier !');
        }
    }
    catch(err) {
        alert(err);
    }

    selection = window.getSelection();
    if (typeof selection.removeRange === 'function') {
        selection.removeRange(range);
    } else if (typeof selection.removeAllRanges === 'function') {
        selection.removeAllRanges();
    }
}
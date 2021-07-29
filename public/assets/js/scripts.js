/*!
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE)
*/


function copyToClipboardById(text) {
    docToCopy = document.getElementById(text);
    docToCopy.select(text);
    document.execCommand("copy");
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl, option)
})
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



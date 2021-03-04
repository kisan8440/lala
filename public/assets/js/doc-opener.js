function openDocument(base64data) {

    var windo = window.open("", "");
    var objbuilder = '';
    objbuilder += '<style>body{margin: 0px; padding: 0px; } iframe{height: 98vh; width: 98%; margin: 0px auto; display: block;}</style>';
    objbuilder += '<iframe src="' + base64data + '" width="100%" ></iframe>';
    windo.document.write(objbuilder);

}
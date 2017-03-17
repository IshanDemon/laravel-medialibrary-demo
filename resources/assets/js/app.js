import jquery from 'jquery';

window.$ = jquery;
window.jquery = jquery;

import 'bootstrap-sass';

import Dropzone from 'dropzone';

import './helpers/httpMethodLinks';

Dropzone.options.mediaDropzone = {
    parallelUploads: 1,
    init: function () {
        this.on("queuecomplete", function (file) {
            location.reload();
        });
    }
};
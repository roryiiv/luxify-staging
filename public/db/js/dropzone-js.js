$(document).ready(function() {
    Dropzone.options.myAwesomeDropzone = !1, Dropzone.autoDiscover = !1,
    $("#single-dz, #cover-image, #profile-image").dropzone({
        url: "/upload",
        paramName: "file",
        maxFilesize: 2,
        maxThumbnailFilesize: .5,
        maxFiles: 1,
        dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
        init: function() {
            this.on("addedfile", function(e) {
                this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e
            })
        }
    }), $("#multiple-dz").dropzone({
        url: "/upload",
        paramName: "file",
        maxFilesize: 2,
        maxThumbnailFilesize: .5,
        dictDefaultMessage: "<i class='icon-dz fa fa-files-o'></i>Drop files here to upload"
    }), $("#type-dz").dropzone({
        url: "/upload",
        paramName: "file",
        acceptedFiles: "image/*",
        maxFilesize: 2,
        maxThumbnailFilesize: .5,
        dictDefaultMessage: "<i class='icon-dz fa fa-file-image-o'></i>Drop files here to upload"
    }), $("#limit-dz").dropzone({
        url: "/upload",
        paramName: "file",
        maxFilesize: 2,
        maxThumbnailFilesize: .5,
        maxFiles: 3,
        dictDefaultMessage: "<i class='icon-dz fa fa-files-o'></i>Drop files here to upload"
    }), $("#message-dz").dropzone({
        url: "/upload",
        paramName: "file",
        acceptedFiles: ".txt",
        maxFilesize: 2,
        maxThumbnailFilesize: .5,
        dictDefaultMessage: "<i class='icon-dz fa fa-file-text-o'></i>Drop text files here to upload"
    })
});

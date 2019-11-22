$('.showthis').on('click', function (e) {
    let src = $(this).attr('data-src');

    $('#img-modal').children().remove();
    $('#img-modal').append("" +
        "<button id='modal-closure' type='button' class='close close_preview' data-dismiss='modal' style=''>&times;</button>" +
        "<img class='modal-image' src='" + src + "' alt=''>");

});

$('.preview').on('click', function (e) {
    let src = $(this).attr('data-src');
    $('#img-preview').children().remove();
    $('#img-preview').append("" +
        "<button id='modal-closure' type='button' class='close close_preview' data-dismiss='modal' style=''><i class='fa fa-close'></i></button>" +
        "<img class='modal-image img-preview' src='" + src + "' alt=''>");

});

function shwimg(){
    // get the image to show selected image
    var i = document.getElementById('imgInp');

    //
    var filetoload = $("#imgInp")[0];

    // initiate the file reader object
    var reader = new FileReader();
    // read the contents of image file
    reader.readAsDataURL(filetoload.files[0]);
    reader.onload = function(e){
        // set the image source
        let srcs = e.target.result;

        jQuery('#imgtoshow').attr('src', srcs);

        // try to add result to another input
        // jQuery('#imgurl').val(e.target.result);
    }
    // another way to get the source of a file
    //=======================================//
    //display selected image into the image tag
    //document.getElementById('thepicture').src = window.URL.createObjectURL(i.files[0]);
}

//auto remove loading screen after 13sec
setTimeout(function () {
    // alert('timeout elapsed');
    $('#preload_scr').remove();
}, 15000);

// console.log('fired');
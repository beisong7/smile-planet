Dropzone.options.myDropzone = {

    paramName: 'file',
    maxFilesize: 35, // MB
    maxFiles: 20,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4,",
    init: function() {

        this.on("sending", function(file, xhr, formData){
            console.log(file);
            met = $(document).find('input[name="_method"]').val();
            tok = $(document).find('input[name="_token"]').val();
            console.log(met, tok);

            formData.append('_method', met);
            formData.append('_token', tok);
            $.each(file.length, function(a,b) {

            });
        });

        this.on("success", function(file, response) {

            let res = JSON.parse(response);
            var a = document.createElement('span');
            a.className = "thumb-url btn btn-primary";
            // a.setAttribute('data-clipboard-text','{{url('/uploads')}}'+'/'+response);
            console.log('reponse = '+ res.success + ', file = ' + file);
            console.log(res.id);
            a.innerHTML = "success";
            file.previewTemplate.appendChild(a);
            cleanup($(a), res.id);
        });
    }
};
let upload = 0;
function cleanup(dom, id) {
    upload++;
    $('.xupload').text(upload);
    setTimeout(function () {
        dom.parent().remove();
        getMedia(id);
    }, 5000);
}

function getMedia(id) {


    // this is all wrong, use post, but try get sha
    $.ajax({
        type: 'post',
        url: '/pushgallery',
        data: {
            '_token': $(document).find('input[name="_token"]').val(),
            'id': id,
        },
        success: function(data) {

            let x = JSON.parse(data);

            if(x.success){

                if(x.type==='mp4'){
                    $('.gallerybox').append("" +
                        "<div class='col-sm-3' data-id='" + x.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                        "<div class='panel-body no-margin no-padding'>" +
                            "<video class='banner-fit'>" +
                            "<source src='/uploads/"+ x.url + "' type='video/mp4'>" +
                            "Your browser does not support the video tag.</video>"+
                        "</div><div class='panel-footer'><small style='font-size: 9px' class='gray'><b>"+x.file_name+"</b></small> <button title='Delete' class='btn btn-xs btn-danger delete'>" +
                        "<i class='fa fa-trash'></i></button> <button title='Download' class='btn btn-xs btn-success download'><i class='fa fa-download'></i>" +
                        "</button></div></div></div>" +
                        "");
                }else{
                    $('.gallerybox').append("" +
                        "<div class='col-sm-3' data-id='" + x.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                        "<div class='panel-body no-margin no-padding'><img class='banner-fit' src='/uploads/"+ x.url + "' alt=''>" +
                        "</div><div class='panel-footer'><small style='font-size: 9px' class='gray'><b>"+x.file_name+"</b></small> <button title='Delete' class='btn btn-xs btn-danger delete'>" +
                        "<i class='fa fa-trash'></i></button> <button title='Download' class='btn btn-xs btn-success download'><i class='fa fa-download'></i>" +
                        "</button></div></div></div>" +
                        "");
                }
            }

            console.log(x);
            console.log(data);
        },
    });
}
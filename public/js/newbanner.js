$(document).ready(function(){
    let loaded = 0;
    $('.scr_load').hide();

    $('.baner_e').on('click', function () {
        $('.save_evtimg').hide();
        $('.save_banner').show();
        $('.save_slider').hide();
        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();
        if(loaded === 0){
            getMedia('entrepreneur', false);
        }else{
            //remove loading screen
            $('.img_loading').fadeOut();

            //set target text
            $('.target').text('entrepreneur');

            //show title field
            $('.field_in').slideDown();
        }

    });

    $('.baner_f').on('click', function () {
        $('.save_evtimg').hide();
        $('.save_banner').show();
        $('.save_slider').hide();
        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();

        if(loaded === 0){
            console.log('this happened 1');
            getMedia('foundation', false);


        }else{

            //remove loading screen
            $('.img_loading').fadeOut();
            console.log('this happened 2');

            //set target text
            $('.target').text('entrepreneur');

            //show title field
            $('.field_in').slideDown();

        }

    });




    $('.slider_e').on('click', function () {
        $('.save_evtimg').hide();
        $('.save_banner').hide();
        $('.save_slider').show();
        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();
        $('.target').text('entrepreneur');
        if(loaded === 0){
            getMedia('entrepreneur', true);
        }else{
            //remove loading screen
            $('.img_loading').fadeOut();

            //set target text
            $('.target').text('entrepreneur');

            //show title field
            // $('.field_in').slideDown();
        }

    });

    $('.slider_f').on('click', function () {
        $('.save_evtimg').hide();
        $('.save_banner').hide();
        $('.save_slider').show();
        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();
        $('.target').text('foundation');
        if(loaded === 0){
            getMedia('foundation', true);
        }else{
            //remove loading screen
            $('.img_loading').fadeOut();

            //set target text
            $('.target').text('foundation');

            //show title field
            // $('.field_in').slideDown();
        }

    });

    var remain, lastID, used, amount = 0;

    function getMedia(target, bool) {



        // this is all wrong, use post, but try get sha
        $.ajax({
            type: 'post',
            url: '/fetchgallery',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'used':0,
                'amount':12,
                'lastID':0

            },
            success: function(data) {

                let x = JSON.parse(data);

                if(x.success){

                    lastID = x.lastID;
                    remain = x.remain;
                    used = x.length;

                        //remove loading screen
                    $('.img_loading').hide();
                    if($('.media_type').length > 0){
                        $('.media_type').remove();
                    }
                    let pval = null;
                    bool?pval='true':pval='false';
                    let pin = "<input type='hidden' class='media_type' value='"+pval+"' />";
                    $('.modal-body').append(pin);

                    $.each(x.result, function (a, b) {
                        if(b.type!=='mp4'){

                            if(bool){
                                $('.scr_load').append("" +
                                    "<div class='col-sm-3 loaded ' data-id='" + b.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                                    "<div class='panel-body no-margin no-padding'><img class='banner-fit' src='/uploads/"+ b.url + "' alt=''>" +
                                    "</div>" +
                                    "<div class='panel-footer'><input class='cb_soft' type='checkbox' name='bannerslider' value='"+ b.id +"'> <span> "+ b.file_name +" </span></div></div></div>" +
                                    "");
                            }else{
                                $('.scr_load').append("" +
                                    "<div class='col-sm-3 loaded' data-id='" + b.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                                    "<div class='panel-body no-margin no-padding'><img class='banner-fit' src='/uploads/"+ b.url + "' alt=''>" +
                                    "</div>" +
                                    "<div class='panel-footer'><input type='radio' name='bannerimage' value='"+ b.id +"'> <span> "+ b.file_name +" </span></div></div></div>" +
                                    "");

                                // //set target text
                                $('.target').text(target);
                                //
                                // //show title field
                                // $('.field_in').slideDown();
                            }
                            // console.log(b);
                        }
                    });


                }else{
                    //remove loading screen
                    $('.img_loading').fadeOut();
                    $('.scr_load').append("<h3 class='text-center'>Unable to Load</h3>");
                }

                // console.log(x);
                // console.log(data);
            },
        });
    }

    $('.getMoreImg').on('click', function () {
        let mediaType = $('.media_type').val();
        console.log(mediaType)
        let hook = null;
        if(mediaType==='false'){
            hook=false;
        }else{
            hook=true;
        }
        moreMedia(1,hook);
    });

    function moreMedia(target, bool) {

        if(remain >= 12){
            amount = 12;
        }else{
            amount = remain;
        };

        console.log('amount = '+amount, 'remain = '+remain, 'lastID = '+lastID, 'used = '+used);
        // this is all wrong, use post, but try get sha
        $.ajax({
            type: 'post',
            url: '/fetchgallery',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'lastID':lastID,
                'amount': amount,
                'used': used,


            },
            success: function(data) {

                let x = JSON.parse(data);

                if(x.success){

                    lastID = x.lastID;
                    remain = x.remain;
                    used += x.length;

                    //remove loading screen
                    $('.img_loading').hide();

                    $.each(x.result, function (a, b) {
                        if(b.type!=='mp4'){

                            if(bool){
                                $('.scr_load').append("" +
                                    "<div class='col-sm-3 loaded ' data-id='" + b.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                                    "<div class='panel-body no-margin no-padding'><img class='banner-fit' src='/uploads/"+ b.url + "' alt=''>" +
                                    "</div>" +
                                    "<div class='panel-footer'><input class='cb_soft' type='checkbox' name='bannerslider' value='"+ b.id +"'> <span> "+ b.file_name +" </span></div></div></div>" +
                                    "");
                            }else{
                                $('.scr_load').append("" +
                                    "<div class='col-sm-3 loaded' data-id='" + b.id +"' style='margin-top:5px; margin-bottom: 5px'><div class='panel panel-default no-padding no-margin shadow-l1'>" +
                                    "<div class='panel-body no-margin no-padding'><img class='banner-fit' src='/uploads/"+ b.url + "' alt=''>" +
                                    "</div>" +
                                    "<div class='panel-footer'><input type='radio' name='bannerimage' value='"+ b.id +"'> <span> "+ b.file_name +" </span></div></div></div>" +
                                    "");

                                // //set target text
                                $('.target').text(target);
                                //
                                // //show title field
                                // $('.field_in').slideDown();
                            }
                            // console.log(b);
                        }
                    });


                }else{
                    //remove loading screen
                    $('.img_loading').fadeOut();
                    $('.scr_load').append("<h3 class='text-center'>Unable to Load</h3>");
                }

                // console.log(x);
                // console.log(data);
            },
        });
    }

    $('.save_banner').on('click', function () {

        let title = $('.btitle').val();
        let target = $('.target').text();
        let chosen = $('input[name=bannerimage]:checked');

        let num = parseInt(title.trim());
        if(chosen.length === 1){

            if(title.trim() ==="" || isNaN(num)){
                title = target;
            }

            // create new banner
            makeBanner(target, title, parseInt(chosen.val()));
        }else{
            $('.emsg').text('one or more required fields are missing');
            setTimeout(function () {
                $('.emsg').text('');
            }, 3000);
            console.log('one or more required fields are missing')
        }

    });

    function makeBanner(target, title, id) {
        console.log(target, title, id);

        $.ajax({
            type: 'post',
            url: '/bannersave',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'target': target,
                'title': title,
                'gallery_id': id
            },

            success: function(data) {

                console.log(data);

                let x = JSON.parse(data);

                if(x.success){

                    //remove loading screen
                    $('.img_loading').hide();

                    let banner = x.result;
                    let page = $(".for_" + target);




                    page.children().remove();

                    page.append("" +
                        "<div class='col-sm-6 "+ banner.id + banner.type + banner.target +"' data-id='"+ banner.id +"'><div class='list-group-item'><div class='row'>" +
                            "<div class='col-sm-8'>" +
                                "<img class='banner-fit' src='/uploads/" + banner.url + "' alt=''></div>" +
                            "<div class='col-sm-4'><h4>Title <small>"+ banner.title +"</small></h4>" +
                        // "<button class='btn btn-info btn-sm'>Edit <i class='fa fa-edit'></i></button>" +
                        "<button class='btn btn-info btn-sm slide_rm' data-id='"+ banner.id +"'>Remove <i class='fa fa-trash'></i></button></div>" +
                        "</div></div></div>");

                    $('.discard').click();
                }else{
                    //remove loading screen
                    $('.img_loading').fadeOut();
                    alert('unable to load. try again.');
                }

                // console.log(x);
                // console.log(data);
            },
        });
    }

    $('.save_slider').on('click', function () {

        let title = $('.btitle').val();
        let target = $('.target').text();
        let chosen = $('input[name=bannerslider]:checked');
        let batch = [];
        if(chosen.length > 0){
            if(chosen.length > 1){

                $.each(chosen, function (a, b) {

                    batch.push($(b).val());
                });

                saveslides(batch, target)
            }else{

                batch.push(chosen.val());
                saveslides(batch, target)
            }
        }
    });

    const saveslides = (arr, target) => {
        console.log(arr);
        $.ajax({
            type: 'post',
            url: '/slidessave',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'arr': arr,
                'target': target
            },

            success: function(data) {

                console.log(data);

                let x = JSON.parse(data);

                if(x.success){

                    //remove loading screen
                    $('.img_loading').hide();

                    let sliders = x.result;
                    let page = $(".slide_" + target);

                    $.each(sliders, function (a, b) {
                        page.append("" +
                            "<div class='col-sm-6 "+ b.id + b.type + b.target +"' data-id='"+ b.id +"' style='margin-bottom: 15px;'><div class='list-group-item'><div class='row'>" +
                            "<div class='col-sm-8'>" +
                            "<img class='banner-fit' src='/uploads/" + b.url + "' alt=''></div>" +
                            "<div class='col-sm-4'><h4>Title <small>"+ b.title +"</small></h4>" +
                            // "<button class='btn btn-info btn-sm'>Edit <i class='fa fa-edit'></i></button>" +
                            "<button class='btn btn-info btn-sm slide_rm' data-id='"+ b.id +"' data-type='" + b.type + "' data-target='" + b.target + "'>Remove <i class='fa fa-trash'></i></button></div>" +
                            "</div></div></div>");
                    });

                    $('.discard').click();
                }else{
                    //remove loading screen
                    $('.img_loading').fadeOut();
                    $('.scr_load').append("<h3 class='text-center'>Unable to Load</h3>");
                }

                // console.log(x);
                // console.log(data);
            },
        });
    }

    $(document).on('click', '.slide_rm', function (e) {
        let port = $(this).attr('data-id');
        let type = $(this).attr('data-type');
        let target = $(this).attr('data-target');
        remover(port, type,target);


    });

    const remover = (port,typ,target) =>{
        let process = true;


        if(process){
            $.ajax({
                type: 'post',
                url: '/removeimage',
                data: {
                    '_token': $(document).find('input[name="_token"]').val(),
                    'target': target,
                    'type': typ,
                    'id': port
                },

                success: function(data) {

                    // console.log(data);

                    let x = JSON.parse(data);

                    if(x.success){
                        //remove the element
                        let p = x.result;
                        $('.'+p.id+p.type+p.target).remove();

                    }

                    // console.log(x);
                    // console.log(data);
                },
            });
        }


    }

    $('.evt_add_img').on('click', function () {

        $('.save_evtimg').show();
        $('.save_banner').hide();
        $('.save_slider').hide();
        $('.save_partner').hide();

        $('.tar_title').hide();
        $('.unseen').hide();

        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();
        if(loaded === 0){
            getMedia('entrepreneur', false);
        }else{
            //remove loading screen
            $('.img_loading').fadeOut();

            //set target text
            $('.target').text('entrepreneur');

            //show title field
            $('.field_in').slideDown();
        }

    });

    $(document).on('click', '.save_evtimg', function () {
        let chosen = $('input[name=bannerimage]:checked');
        getimage(chosen.val());
        // console.log(chosen.val());
    });

    const getimage = (id) =>{
        $.ajax({
            type: 'post',
            url: '/getimage',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'gallery_id': id
            },

            success: function(data) {

                console.log(data);

                let x = JSON.parse(data);

                if(x.success){
                    let x = JSON.parse(data);

                    if(x.success){
                        //remove the element
                        let p = x.result;
                        $('.image_src').attr('src', '/uploads/'+p.url);
                        $('.new_event_img').val(p.id);
                        $('.'+p.id+p.type+p.target).remove();

                    }
                }else{
                    //remove loading screen
                    $('.img_loading').fadeOut();
                    alert('unable to complete. try again.');
                }

                // console.log(x);
                // console.log(data);
                $('.discard').click();
            },
        });
    }

    $('.get_pimg').on('click', function (e) {

        $('.save_partner').show();
        $('.save_evtimg').hide();
        $('.save_banner').hide();
        $('.save_slider').hide();

        $('.tar_title').hide();
        $('.unseen').hide();

        $('.img_loading').show();
        $('.scr_load').children('.loaded').remove();
        $('.scr_load').fadeIn();

        if(loaded === 0){
            getMedia('entrepreneur', false);
        }else{
            //remove loading screen
            $('.img_loading').fadeOut();

            //set target text
            $('.target').text('entrepreneur');

            //show title field
            $('.field_in').slideDown();
        }
    });

    $(document).on('click', '.save_partner', function () {
        let chosen = $('input[name=bannerimage]:checked');
        getimage(chosen.val());
        // console.log(chosen.val());
    });

    $('.gallery_loader').on('click', function () {

        $('.scr_load').children('.loaded').remove();

        $('.scr_load').show();
        $('.img_loading').show();

        getMedia('foundation', true);

    });

    $(document).on('click','.save_imgs',function () {
        let chosen = $('input[name=bannerslider]:checked');
        let batch = [];
        let album_id = $('.albums_id').val();
        if(chosen.length > 0){
            $.each(chosen, function (a, b) {

                batch.push($(b).val());
            });

            savepics(batch, album_id)
        }
    });

    const savepics = (arr, target) => {
        console.log(arr);
        $.ajax({
            type: 'post',
            url: '/saveAlbumPics',
            data: {
                '_token': $(document).find('input[name="_token"]').val(),
                'album_id': target,
                'images': arr
            },

            success: function(data) {

                console.log(data);

                let x = JSON.parse(data);

                if(x.success){
                    location.reload();
                }else{

                }

                // console.log(x);
                // console.log(data);
            },
        });
    }

});






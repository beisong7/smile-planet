$(document).ready(function () {

    // 'use strict';
    const image = $('.preview');


    // for(let i = 0; i < image.length; i++){
    //     console.log(i);
    // }
    let n = 0;
    $.each(image, function (a, img) {

        if(img.addEventListener){ // to support older browsers
            img.addEventListener("load",event=> {
                $(this).siblings('.loading').remove();
                console.log('loaded  -  '+n++);
            });
        }else{
            img.attachEvent("onload", event=> {
                $(this).siblings('.loading').remove();
                console.log('loaded  -  '+n++);
            });
        }

        // image.addEventListener('load', event=> {
        //     //remove loading screen
        //
        //
        // })
    });


});
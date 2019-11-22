$(document).ready(function(){
    $('#printlist').click(function () {
        var contents = $(".paper").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>Event List Print Out</title><style>.noprint{display: none;}.doprint{display: block;}</style>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.


        frameDoc.document.write('<script src="/js/jquery.min.js"></script>');
        frameDoc.document.write("<link rel='stylesheet' href='/css/bootstrap.min.css '>");
        frameDoc.document.write('<link rel="stylesheet" href="/css/main.css">');

        frameDoc.document.write('<script src="/js/bootstrap.min.js"></script>');
        // frameDoc.document.write(' <link rel="stylesheet" href="public/css/font-awesome.css">');




        // {{ asset('css/bootstrap.min.css') }}
        // {{ asset('css/font-awesome.min.css') }}
        // {{ asset('css/main.css') }}


        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });

});

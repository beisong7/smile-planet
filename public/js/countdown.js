$(document).ready(function(){

    let events = $('.sm_event');

    $.each(events, function (a, b) {
        let date = $(b).attr('data-date');
        let id = $(b).attr('data-target');
        startcount(date, id);
    });

    function startcount(date,id) {
        console.log(date, id);
        var countDownDate = new Date(date).getTime();

// Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            $('#'+id).text(days + "days " + hours + "hrs " + minutes + "min " + seconds + "s ");

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(id).innerHTML = "CLOSED";
                // $('.sm_reg_'+id).remove();
                $('.content_'+id).remove();
            }
        }, 1000);
    }
});

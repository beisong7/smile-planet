

const magicText =(cname)=>{
    console.log(cname)

    // Wrap every letter in a span
// var textWrapper = document.querySelector('.ml2');
    var textWrapper = document.querySelector(cname);
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
        .add({
            targets: cname+' .letter',
            scale: [4,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 950,
            delay: (el, i) => 70*i
        }).add({
        targets: cname,
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
    });
}


let aux = 1;
$.each($('.ml2'), function (a, b) {
    // magicText('.ml2'+aux)
    aux++
})
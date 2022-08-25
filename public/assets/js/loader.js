window.addEventListener("load", function(){
    var load_screen = document.getElementById("load_screen");
    document.body.removeChild(load_screen);
});

// ----------------------------------------------
// Preloader
// ----------------------------------------------
// (function () {
//     $(window).load(function () {
//         $('#pre-status').fadeOut();
//         $('#st-preloader').delay(350).fadeOut('slow');
//     });
// }());
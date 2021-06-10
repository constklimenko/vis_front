$(document).ready(function() {

    document.querySelector('.header').classList.add('tp');
    var var_scroll = 0;

    window.addEventListener('scroll', function() {
        var_scroll = (pageYOffset / document.documentElement.clientWidth) * 100;
        if (var_scroll > 40) {
            console.log('removing tp', var_scroll);
            document.querySelector('.header').classList.remove('tp');
        } else {
            console.log('adding tp', var_scroll);
            document.querySelector('.header').classList.add('tp');
        };
    });
})
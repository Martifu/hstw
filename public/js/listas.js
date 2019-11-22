$(document).ready(function () {
    $('.cont2').hide();
    $('.cont3').hide();

    $('.susc').click(function () {
        $('.cont1').hide();
        $('.cont2').show();
        $('.cont3').hide();
        $('.susc').css("box-shadow", "0px 2px 0px #4bb8ff");
        $('.owne').css("box-shadow", "");
        $('.memb').css("box-shadow", "");


    });

    $('.owne').click(function () {
        $('.cont1').show();
        $('.cont2').hide();
        $('.cont3').hide();
        $('.owne').css("box-shadow", "0px 2px 0px #4bb8ff");
        $('.susc').css("box-shadow", "");
        $('.memb').css("box-shadow", "");

    });


    $('.memb').click(function () {
        $('.cont3').show();
        $('.cont2').hide();
        $('.cont1').hide();
        $('.memb').css("box-shadow", "0px 2px 0px #4bb8ff");
        $('.susc').css("box-shadow", "");
        $('.owne').css("box-shadow", "");

    });


});



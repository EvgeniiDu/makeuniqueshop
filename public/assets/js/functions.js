$(document).ready(function(){
    $('#button1').click(function(){
        $('.сheckbox_area1').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('.arrow_block1').addClass('up');
            } else {
                $('.arrow_block1').removeClass('up');
                $('.arrow_block1').addClass('down');
            }
        });
        return false;
    });
});
$(document).ready(function(){
    $('#button2').click(function(){
        $('.сheckbox_area2').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('.arrow_block2').addClass('up');
            } else {
                $('.arrow_block2').removeClass('up');
                $('.arrow_block2').addClass('down');
            }
        });
        return false;
    });
});
$(document).ready(function(){
    $('#button3').click(function(){
        $('.сheckbox_area3').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('.arrow_block3').addClass('up');
            } else {
                $('.arrow_block3').removeClass('up');
                $('.arrow_block3').addClass('down');
            }
        });
        return false;
    });
});
$(document).ready(function(){
    $('#button4').click(function(){
        $('.сheckbox_area4').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('.arrow_block4').addClass('up');
            } else {
                $('.arrow_block4').removeClass('up');
                $('.arrow_block4').addClass('down');
            }
        });
        return false;
    });
});

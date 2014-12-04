$('#navigation').clone().prependTo('body').addClass('mobile-navigation').removeAttr('id');
$('div.mobile-navigation').prepend('<span class="close">Close</span>');
 
$('#toggle-menu').bind('click touch', function(){
    if( $('div.mobile-navigation').hasClass('open') ){
        $('div.mobile-navigation').animate({width: "0px"}, 300).removeClass('open');
        $('#container').animate({left: "0px"}, 300);
    } else {
        $('div.mobile-navigation').animate({width: "210px"}, 300).addClass('open');
        $('#container').animate({left: "-210px"}, 300);
    }
});
 
$('div.mobile-navigation span.close').bind('click touch', function(){
    $('div.mobile-navigation').animate({width: "0px"}, 300).removeClass('open');
    $('#container').animate({left: "0px"}, 300);
});
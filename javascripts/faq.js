/**
 * Created by tenapercy on 4/26/15.
 */
$('li.a').hide();

$('li.q').click(
    function(){
        $('li.a').slideUp();
        $(this).nextUntil('.q').slideDown();
    });

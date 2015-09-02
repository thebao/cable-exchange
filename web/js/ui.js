/**
 * Created by theo on 08/06/15.
 */
$(document).ready(function(){

    $(function(){
        var sideBarNavWidth=$('#leftcolumn').width() - parseInt($('#leftcolumn').css('paddingLeft')) - parseInt($('#leftcolumn').css('paddingRight'));
        $('#leftcolumn').css('width', sideBarNavWidth);
    });

    var mySVGsToInject = document.querySelectorAll('img.svg-inject');
    SVGInjector(mySVGsToInject);



    $('#brand-select').select2({
        placeholder: configuration.placeholder.brand,
        allowClear: true
    });
    $('#sidebar').affix({
        offset: {
            top: 88
        }
    });
    $("#debug").hide();
    $('#dbg-tgl').click(function(){$("#debug").toggle();});
    var $body   = $(document.body);
    var navHeight = $('h1').outerHeight(true) + 10;

    $body.scrollspy({
        target: '.left-side',
        offset: navHeight
    });

    $(".toggle-wrap .toggler").on('click', $(".toggler"), function(){
        $zone = $(this).parents(".toggle-wrap").find(".toggle-zone");
        $(this).find('i').toggleClass("fa-caret-down").toggleClass("fa-caret-up");
        $zone.css("height", $zone.height());
        if ( $zone.is( ":hidden" ) ) {
            $zone.slideDown();
        } else {
            $zone.slideUp();
        }
    });
});


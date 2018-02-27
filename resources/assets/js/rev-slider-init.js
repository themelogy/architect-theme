/*-------------------------------------------------------------------------------
 Sliders
 -------------------------------------------------------------------------------*/

if (typeof $.fn.revolution !== 'undefined') {
    $("#rev_slider").revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        dottedOverlay:"",
        delay: 7000,
        autoHeight: 'on',
        minHeight: 380,
        navigation: {
            arrows: {
              style: "uranus",
              enable: true
            },
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            onHoverStop: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                enable: false,
                hide_onmobile: true,
                direction: "horizontal",
                container: 'layergrid',
                h_align: "right",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 0,
                space: 5
            }
        },
        parallax: {
            type: "scroll",
            origo: "slidercenter",
            speed: 300,
            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 47, 48, 49, 50, 51, 55],
            disable_onmobile: 'on'
        },
        responsiveLevels: [2048, 1600, 1260, 992],
        gridwidth: [1370, 1100, 900, 700],
        gridheight: [800, 800, 500, 300],
        lazyType: "smart",
        shadow: 0,
        spinner: "spinner4",
        stopLoop: "on",
        stopAfterLoops: 0,
        shuffle: "off",
        fullScreenAlignForce: "on",
        fullScreenOffset: "",
        disableProgressBar: "on",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false
        }
    });
}

$('.slider-prev').on('click', function () {
    $(".rev_slider").revprev();
});

$('.slider-next').on('click', function () {
    $(".rev_slider").revnext();
});






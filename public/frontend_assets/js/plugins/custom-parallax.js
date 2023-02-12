(function (window, document, $, undefined) {
    'use strict';

    var customParallax = {
        k: function (e) {
			customParallax.s();
			customParallax.methods();
        },
        s: function (e) {
			this._window = $(window),
			this._document = $(document)
        },
        methods: function (e) {
            customParallax.mouseMOve(); 
            customParallax.mouseParalax();            
        },        
        mouseMOve: function () {
            $.fn.parallax = function (resistance, mouse) {
                var $el;
                $el = $(this);
                TweenLite.to($el, 0.2, {
                    x: -((mouse.clientX - window.innerWidth / 2) / resistance),
                    y: -((mouse.clientY - window.innerHeight / 2) / resistance)
                });
            };
        },
        mouseParalax: function () {
            $('.paralax-area').mousemove(function (e) {
                $('.paralax-1').parallax(10, e);
                $('.paralax-2').parallax(35, e);
                $('.paralax-3').parallax(15, e);
                $('.paralax-4').parallax(5, e);

                $('.paralax-5').parallax(10, e);
                $('.paralax-6').parallax(35, e);
                $('.paralax-7').parallax(15, e);
                $('.paralax-8').parallax(5, e);
            });
        },        
    };

    customParallax.k();

})(window, document, jQuery);
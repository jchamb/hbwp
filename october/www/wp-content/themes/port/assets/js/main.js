var PORT = (function(PORT, $){

    PORT.Grid = {
        position: { x: 0, y: 640 },
        windowHeight: null,

        init: function() {

            this.windowHeight = $(window).height() - 40;

            $('.block').not(':first-child').each(function(i, v){
                var $block = $(this);

                if($block.height()+PORT.Grid.position.y > PORT.Grid.windowHeight)
                {
                    PORT.Grid.position.x += 320;

                    if(PORT.Grid.position.x >= 640) {
                        PORT.Grid.position.y = 0;
                    } else {
                        PORT.Grid.position.y = 640;
                    }
                }

                $block.animate({left: PORT.Grid.position.x, top: PORT.Grid.position.y}, 500);
                PORT.Grid.position.y += $block.height();
            });
        }
    }


    $(function(){
        PORT.Grid.init();
    });


})(PORT || {}, jQuery);
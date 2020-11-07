(function($) {
    var state;
    var slide = function(ele,options) {
        var $ele = $(ele);
     
        var setting = {
        		
            speed: 1000,
            
            interval: 2000,
            
        };
      
        $.extend(true, setting, options);
        
        var states = [
            { $zIndex: 1, width: 220, height: 250, top: 69, left: 34, $opacity: 0.2 },
            { $zIndex: 2, width: 230, height: 270, top: 59, left: -100, $opacity: 0.4 },
            { $zIndex: 3, width: 270, height: 318, top: 35, left: 10, $opacity: 0.7 },
            { $zIndex: 4, width: 324, height: 388, top: 0, left: 263, $opacity: 1 },
            { $zIndex: 3, width: 270, height: 318, top: 35, left: 570, $opacity: 0.7 },
            { $zIndex: 2, width: 230, height: 270, top: 59, left: 720, $opacity: 0.4 },
            { $zIndex: 1, width: 220, height: 250, top: 69, left: 600, $opacity: 0.2 }
        ];

        var $lis = $ele.find('li');
        var timer = null;

 
        $ele.find('.card__button--next').on('click', function() {
            next();
        });
        $ele.find('.card__button--prev').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
        }).on('mouseleave', function() {
            autoPlay();
        });

        move();
        autoPlay();

       
        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);
            });
        }

      
        function next() {
          
            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    }
    
    $.fn.cardSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
     
        return this;
    }
})(jQuery);

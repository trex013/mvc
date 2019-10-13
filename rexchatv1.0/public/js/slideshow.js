(function() {
  app = {
    configSlideshow: function() {
      return {
          active_slide_class: 'active'
        , active_indicator_class: 'current'
        , slideshow_selector: '.slideshow'
        , animation_in_class: 'animation-in'
        , animation_out_class: 'animation-out'
        , slideshow_selector: '.slideshow'
      };
    }
  };

  Revolver.registerTransition('default', function(options, done) {
    $rs(this.slides).removeClass(app.configSlideshow().active_slide_class);
    $rs(this.slides[this.nextSlide]).addClass(app.configSlideshow().active_slide_class);
    var wait = setInterval(function() {
      clearInterval(wait);
      ($rs.isFunction(done)) ? done() : undefined;
    }, 50);
    return this;
  });

  Revolver.registerTransition('fade', function(options, done) {
    var $container, $currentSlide, $nextSlide, $prevSlide, complete, flag;

    $container = $rs(this.container);
    $nextSlide = $rs(this.slides[this.nextSlide]);
    $prevSlide = $rs(this.slides[this.previousSlide]);
    $currentSlide = $rs(this.slides[this.currentSlide]);
    $currentSlide.addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated fadeOut');
      $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $rs(this).delay(25).removeClass('animated fadeIn');
        flag = 1;
      });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('bounce', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated bounceOutDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated bounceOutDown');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated bounceInDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated bounceInDown');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('slide', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated fadeOutLeft');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated fadeInRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).delay(25).removeClass('animated fadeInRight');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('flipx', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated flipOutX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated flipOutX');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated flipInX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated flipInX');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('flipy', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated flipOutY').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated flipOutY');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated flipInY').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated flipInY');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('roll', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated rollOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated rollOut');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated rollIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated rollIn');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('rotate', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated rotateOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated rotateOut');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated rotateIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated rotateIn');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('step', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide]);

    $currentSlide.addClass('animated');
    var temp_elements = $currentSlide.children().add($currentSlide.find('.slider-container, .slider-mastercontainer').children())
      , elements = $rs.unique(temp_elements)
      , speed = (parseFloat($currentSlide.css('animation-duration')) || parseFloat($currentSlide.css('-webkit-animation-duration')) || 1) * 1000
      , interval = Math.floor(speed / elements.length / 3)
      , i = 0
      , flag;
    $currentSlide.removeClass('animated');

    var stepInterval = setInterval(function() {
      if (i === elements.length) {
        clearInterval(stepInterval);
        $currentSlide.addClass('animated fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          elements.removeClass('animated fadeOutLeft');
          $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated fadeOutLeft');
            $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
              $rs(this).delay(25).removeClass('animated fadeInLeft');
              flag = 1;
            });
        });
        return;
      }

      $rs(elements[i]).addClass('animated fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        return false;
      });

      i++;
    }, interval);

    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
  });

  Revolver.registerTransition('smooth', function(options, done) {
    var $container, $currentSlide, $nextSlide, $prevSlide, complete, flag;

    $container = $rs(this.container);
    $nextSlide = $rs(this.slides[this.nextSlide]);
    $prevSlide = $rs(this.slides[this.previousSlide]);
    $currentSlide = $rs(this.slides[this.currentSlide]);
    $container.animate({'height': $nextSlide.outerHeight()}, 500);
    $currentSlide.addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated fadeOut');
    });
    $nextSlide.css({'position': 'absolute', 'top': '0', 'left': '0'}).addClass(app.configSlideshow().active_slide_class + ' animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).delay(25).removeClass('animated fadeIn');
      $rs(this).css({'position': '', 'top': '', 'left': ''});
      $container.css('height', '');
      flag = 1;
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('zoom', function(options, done) {
    var self = this
      , $currentSlide = $rs(this.slides[this.currentSlide])
      , $nextSlide = $rs(this.slides[this.nextSlide])
      , flag;

    $rs(this.container).css("height", $nextSlide.outerHeight());
    $currentSlide.addClass('animated zoomOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $rs(this).removeClass(app.configSlideshow().active_slide_class + ' animated zoomOut');
        $nextSlide.addClass(app.configSlideshow().active_slide_class + ' animated zoomIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $rs(this).removeClass('animated zoomIn');
          $rs(self.container).css("height", "");
          flag = 1;
        });
    });
    var wait = setInterval(function() {
      if (flag === 1) {
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
    return this;
  });

  Revolver.registerTransition('custom', function(options, done, $triggered, isElement) {
    var self = this
      , animation_in_class = app.configSlideshow().animation_in_class
      , animation_out_class = app.configSlideshow().animation_out_class
      , $currentSlide = $triggered || $rs(this.slides[this.currentSlide])
      , $nextSlide = $triggered || $rs(this.slides[this.nextSlide])
      , active_slide_class = $triggered ? '' : app.configSlideshow().active_slide_class
      , $slideshow = $currentSlide.closest(app.configSlideshow().slideshow_selector)
      , animation_element_out = $slideshow.attr('data-animation-element-out') || ''
      , animation_element_in = $slideshow.attr('data-animation-element-in') || ''
      , animation_slide_in = isElement ? animation_element_in : ($slideshow.attr('data-animation-slide-in') || '')
      , animation_slide_out = isElement ? animation_element_out : ($slideshow.attr('data-animation-slide-out') || '')
      , animationEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'
      , doElement = function($element, animation, state) {
          if(!animation || animation === 'none') {
            return;
          }
          var animation_class = state === 'out' ? animation_out_class : animation_in_class;
          $element.addClass(animation_class + ' animated ' + animation).one(animationEvents, function() {
            state === 'in' && $rs(this).removeClass(animation_class + ' animated ' + animation);
            return false;
          });
        }
      , doSlide = function($slide, state, elements, animations) {
          var animation = $slide.attr('data-animation-' + state) || (state === 'out' ? animation_slide_out :  animation_slide_in)
            , animation_class = state === 'out' ? animation_out_class : animation_in_class;
          if(animation && animation !== 'none') {
            $slide.addClass(animation_class + ' ' + active_slide_class + ' animated ' + animation).one(animationEvents, function() {
              $slide.removeClass(animation_class + ' ' + active_slide_class + ' animated ' + animation);
              if(state === 'out') {
                elements.removeClass(animations.join(' ') + ' animated ' + animation_class);
                doElements($nextSlide, 'in');
              } else {
                $nextSlide.addClass(active_slide_class);
                nextSlideSpeed = $nextSlide.attr('data-rotationspeed');
                flag = 1;
              }
              return false;
            });
          } else if(state === 'out') {
            elements.removeClass(animations.join(' ') + ' animated ' + animation_class);
            $slide.removeClass(active_slide_class + ' animated ' + animation_class);
            doElements($nextSlide, 'in');
          } else {
            elements.removeClass(animations.join(' ') + ' animated ' + animation_class);
            $currentSlide.removeClass(active_slide_class + ' animated ' + animation_class);
            $nextSlide.addClass(active_slide_class);
            nextSlideSpeed = $nextSlide.attr('data-rotationspeed');
            flag = 1;
          }
        }
      , doElements = function($slide, state) {
          $slide.addClass('animated');
          var temp_elements = $slide.children('.slide > *').add(($slide.find('.slider-container, .slider-mastercontainer')).add($slide.filter('.slider-container, .slider-mastercontainer')).children())
            , elements = $rs.unique(temp_elements)
            , animations = [];

          for(var i = state === 'in' ? elements.length : 0; ; state === 'out' ? i++ : i--) {
            if (i >= elements.length) {
              $triggered ? setTimeout(function(){ doSlide($slide, state, elements, animations); }, 0) : doSlide($slide, state, elements, animations);
              if(state === 'out') {
                break;
              }
            } else {
              var $element = $rs(elements[i])
                , animation = $element.attr('data-animation-' + state) || (state === 'out' ? animation_element_out :  animation_element_in);

              animations.push(animation);
              doElement($element, animation, state);
            }
            if(i < 0) {
              break;
            }
          }
        }
      , nextSlideSpeed
      , flag;

    doElements($currentSlide, 'out');

    var wait = setInterval(function() {
      if (flag === 1) {
        !$triggered && self.status.playing && self._clearInterval();
        !$triggered && self.status.playing && (self.intervalId = setInterval(_.bind(self.transition, self), parseFloat(nextSlideSpeed || self.options.rotationSpeed)));
        clearInterval(wait);
        ($rs.isFunction(done)) ? done() : this;
      }
    }, 100);
  });

  $rs = jQuery.noConflict();
  $rs(document).ready(function($rs) {
    var mySlider, options, regex
      , slide_link = document.location.href.match(/#(?:(?!\?).)*/g)
      , arr_of_id = $rs(" .slides_container > [id]").map(function(){
          return $rs(this).attr('id') || undefined;
        });

    var goToFromIndicator = function(event) {
      var index;
      event.preventDefault();
      index = $rs(event.currentTarget).index();
      if (index <= mySlider.lastSlide) {
        return mySlider.goTo(index);
      }
    };

    $rs(" .slide." + app.configSlideshow().active_slide_class).css('opacity', 1);
    options = {
      container: $rs(' .slides_container').get(0),
      slides: $rs(' .slide').get(),
      autoPlay: $rs(" .slideshow").data('autoplay') || false,
      rotationSpeed: $rs(" .slideshow").data('rotationspeed') || "3500",
      loop: false,
      iterations: $rs(" .slideshow").data('iterations') || Infinity,
      endslide: $rs(" .slideshow").data('endslide'),
      transition: {
        name: $rs(" .slideshow").data('transition') || "default"
      }
    };

    Revolver.setSelectorEngine($rs.find);
    mySlider = new Revolver(options);

    if ($rs(" .slideshow").data('initial-transition') === true) {
      mySlider.currentSlide = 1;

      mySlider.goTo(0, {name: $rs(" .slideshow").data('transition')});
      mySlider.one('transitionComplete', function() {
        $rs(this.slides[1]).removeClass('no-show');
      });
    }

    if (!mySlider.status.playing) {
      $rs(" .icon-pause").attr("class", "icon-play-3");
    }

    $rs(" .pause,  .play").click(function(e) {
      var $icon;
      e.preventDefault();
      $icon = $rs(this).find('i');
      if ($icon.hasClass('icon-pause')) {
        $icon.attr('class', 'icon-play-3');
        return mySlider.pause();
      } else {
        $icon.attr('class', 'icon-pause');
        return mySlider.play();
      }
    });

    regex = new RegExp("(first|previous|stop|play|next|last|restart)", "i");
    $rs(' [class*="coffee-slider-"]').click(function(e) {
      var command;
      e.preventDefault();
      command = $rs(this).attr('class').match(regex)[0];
      return mySlider[command]();
    });

    mySlider.on("transitionComplete", function() {
      var slides_indicator = $rs(' .slides_indicator')
        , index =$rs(' .slide.' + app.configSlideshow().active_slide_class).index();

      slides_indicator.children().removeClass(app.configSlideshow().active_indicator_class);
      slides_indicator.each(function() {
        $rs($rs(this).children().get(index)).addClass(app.configSlideshow().active_indicator_class)
      });
    });

    $rs("a").click(function(e) {
      var id = this.href.match(/#(?:(?!\?).)*/g)
        , index;
      if ($rs(this).is(' .slide_node')) { return goToFromIndicator(e); }
      if (id.length > 0) { id = id[0].replace('#', ''); }

      if (!!~$rs.inArray(id, arr_of_id)) {
        index = $rs("#" + id).index();
        mySlider.goTo(index);
        e.preventDefault();
        return false;
      }
    });

    swipedetect($rs(" .slides_container")[0], function(direction) {
      switch(direction) {
        case "right":
          var index = (mySlider.currentSlide === 0) ? mySlider.lastSlide : mySlider.previousSlide;
          mySlider.goTo(index);
          break;
        case "left":
          var index = (mySlider.currentSlide === mySlider.lastSlide) ? 0 : mySlider.nextSlide;
          mySlider.goTo(index);
          break;
        default:
          break;
      }
    });

    // Goto slide by link
    if (slide_link) {
      var index = $rs(slide_link[0]).index();
      if (!!~$rs.inArray(slide_link[0].replace('#', ''), arr_of_id)) {
        mySlider.goTo(index, {name: "default"});
      }
    }
  });
}).call(this);

/**
 * Detect swipe direction (left or right)
 * Based on: http://www.javascriptkit.com/javatutors/touchevents2.shtml
 *
 * @param {HTMLDomELement} el  A dom element
 * @param {function} callback  A callback function (optional)
 *
 * @return void
 */
function swipedetect(el, callback){
  //Events
  var leftEvent = document.createEvent("Event")
  , rightEvent = document.createEvent("Event");
  // Events setup
  leftEvent.initEvent("swipeleft", true, true);
  rightEvent.initEvent("swiperight", true, true);

  var touchsurface = el,
  swipedir, startX, startY, distX,  distY, elapsedTime, startTime,
  threshold = 150, //required min distance traveled to be considered swipe
  restraint = 100, // maximum distance allowed at the same time in perpendicular direction
  allowedTime = 300, // maximum time allowed to travel that distance
  // Default function that simply emits events
  handleswipe = callback || function(swipedir){ if (swipedir === "right") { touchsurface.dispatchEvent(rightEvent); } else if (swipedir === "left") { touchsurface.dispatchEvent(leftEvent); }}

  touchsurface.addEventListener('touchstart', function(e){
    var touchobj = e.changedTouches[0]
    swipedir = 'none'
    dist = 0
    startX = touchobj.pageX
    startY = touchobj.pageY
    startTime = new Date().getTime() // record time when finger first makes contact with surface
  }, false)

  touchsurface.addEventListener('touchend', function(e){
    var touchobj = e.changedTouches[0]
    distX = touchobj.pageX - startX // get horizontal dist traveled by finger while in contact with surface
    distY = touchobj.pageY - startY // get vertical dist traveled by finger while in contact with surface
    elapsedTime = new Date().getTime() - startTime // get time elapsed
    if (elapsedTime <= allowedTime){ // first condition for awipe met
      if (Math.abs(distX) >= threshold && Math.abs(distY) <= restraint){ // 2nd condition for horizontal swipe met
        swipedir = (distX < 0)? 'left' : 'right' // if dist traveled is negative, it indicates left swipe
      }
      else if (Math.abs(distY) >= threshold && Math.abs(distX) <= restraint){ // 2nd condition for vertical swipe met
        swipedir = (distY < 0)? 'up' : 'down' // if dist traveled is negative, it indicates up swipe
      }
    }
    handleswipe(swipedir)
  }, false)
}

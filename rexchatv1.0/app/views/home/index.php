<?php 

   // require "../app/views/partials/sessiondelete.php"; 

    require "../app/views/partials/accessinfo.php";

    require "../app/views/partials/home/header.php";

    require "../app/views/partials/home/nav.php";

?>

<header id="afternav">
        <!--Slide show-->
        <div class="slideshow_container">
        <div class="slideshow show-in-container" data-autoplay="true" 
            data-rotationspeed="4500" data-transition="slide" data-endslide="0">
            <div class="slides_container">
            <div class="slide slide-1 active" id="cc-slide-38127910">
                <div class="responsive-slider-picture center-vh"><div>
                <picture >
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="img/wonder_woman_cosplay-2560x1440.jpg" media="(max-width: 600px)">
                    <!--[if IE 9]></video><![endif]-->
                    <img alt="Placeholder Picture" srcset="img/wonder_woman_cosplay-2560x1440.jpg">
                </picture></div>
                </div>
                <h4 class="pic-heading slider-heading-4">
                    <div class="center-vh" style="height:45rem; width: 100%;">
                        <div class="">Cold Light</div>
                    </div></h4>
            </div>
            <div class="slide" id="cc-slide-5a0b52ea">
                <div class="responsive-slider-picture center-vh">
                    <div class = "adjustpicture-size">
                <picture>
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="img/wonder_woman_diana_prince-2560x1440.jpg" media="(max-width: 600px)">
                    <!--[if IE 9]></video><![endif]-->
                    <img alt="Placeholder Picture" srcset="img/wonder_woman_diana_prince-2560x1440.jpg">
                </picture></div>
                </div>
                <h4 class="pic-heading slider-heading-4" id="slide2-heading">
                    <div class="center-vh" style="height:45rem; width: 100%;">
                        <div class="">Lime Light</div>
                    </div>
                </h4>
            </div>
            <div class="slide" id="cc-slide-8df0c7cd">
                <div class="responsive-slider-picture center-vh">
                    <div class = "adjustpicture-size">
                <picture>
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="img/wonder_woman_gal_gadot_4k_5k-5120x2880.jpg" media="(max-width: 600px)">
                    <!--[if IE 9]></video><![endif]-->
                    <img alt="Placeholder Picture" srcset="img/wonder_woman_gal_gadot_4k_5k-5120x2880.jpg">
                </picture>
                    </div>
                </div>
                <h4 class="heading-1 slider-heading-4" id="slide3-heading">
                    <div class="center-vh" style="height:45rem; width: 100%;">
                        <div class="">Cold Light</div>
                    </div>
                </h4>
            </div>
            </div>
            <div class="slides_indicator indicators-1 icon-pairs">
                <a href="#cc-slide-38127910" class="slide_node slide-indictor" id="red"><i class="icon icon-circle"></i></a>
                <a href="#cc-slide-5a0b52ea" class="slide_node slide-indictor " id="green"><i class="icon icon-circle"></i></a>
                <a href="#cc-slide-8df0c7cd" class="slide_node circle slide-indictor icon-pair" id="yellow"><i class="icon icon-circle"></i></a>
            </div>
                
            </div>
        </div>
    </header>

    <section id="features" class=" center-v">
        <div>
        <div class = "row" >
            <div class = "col-3">
                <div class = "content">
                    <div class="img-container center-vh">
                        <i class="icon icon-home"></i>
                    </div>
                    <div class="text-container">
                        This is a home for magic, experimentation and fun.<br>
                        to know more, <a> Click here. </a>      
                    </div>
                    
                </div>
            </div>
            <div class = "col-3">
                <div class = "content">
                    <div class="img-container center-vh">
                        <i class="icon icon-chart-bar"></i>
                    </div>
                    <div class="text-container">
                        We have the biggest winners published. <a> Click here</a> to find out more
                    </div>
                    
                </div>
            </div>
              <div class = "col-3">
                <div class = "content">
                    <div class="img-container center-vh">
                        <i class="icon icon-comment-dots"></i>
                    </div>
                    <div class="text-container">
                        Chat with your friends<br> and share amazing things. <a>Click</a> to know more.
                    </div>
                    
                </div>
            </div>
            <div class = "col-3">
                <div class = "content">
                    <div class="img-container center-vh">
                        <i class="icon icon-gamepad"></i>
                    </div>
                    <div class="text-container">
                        Some local games are available for you to play. <a>Click here</a>  to discover.
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="login" class="center-vh"></div>
    <div id="login-cont" class="login-cont">
        <h2> Login </h2><hr />
        <form action="home/login" method="post">
            <label class="inp inp-logo-l inp-icon-focus" for="i-1">
                <input type="text" class="input" name="user" id="i-1" placeholder="Username"><span
                class="center-vh"><i class = "icon icon-user"></i></span>
            </label>
            <label class="inp inp-logo-l inp-icon-focus" for="i-2">
                <input type="password" class="input" name="pass" id="i-2" placeholder="Password"><span
                class="center-vh"><i class = "icon icon-user-lock"></i></span>
            </label>
            
            <input type="submit" class="btn btn-large btn-green" value="Login">
        </form>
        <p><a href = "forgetpass" >Click here</a> if you have forgotten your password</p>
        <div id="err-msg">
            <?php var_dump($accessinfo) ?>
        </div>
    </div>
    </section>

<?php

    require "../app/views/partials/home/footer.php";

?>


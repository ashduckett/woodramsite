<?php
    function getFooter() { ?>
        </div>
        <footer class="footer">
            <div class="footer__top">
                <div class="footer__top__inner-container">
                    <div class="footer__top__inner-container__registration">
                        Registered in England & Wales <span class="reg">07841060</span>
                    </div>
                    <div class="footer__top__inner-container__tel">
                            <a href="tel:+44 01460 258 802"><i class="fas fa-rotate-90 fa-phone"></i> +44 01460 258 802</a>
                    </div>
                </div>
                
            </div>
            <div class="footer__bottom">
                <div class="footer__bottom__inner-container">
                    <div class="footer__bottom__inner-container__trademark">
                        &copy; 2019 Woodram Construction Ltd. All rights reserved.
                    </div>
                    <div class="footer__bottom__inner-container__created-by">
                        <span>Website created by</span><a href="https://conceptai.co.uk/" target="_blank"><img class="conceptai" src="img/conceptai.svg"></a>
                    </div>
                </div>
            </div>
        </footer> 
    </body>
</html>
    <?php }

    function getHeader($primaryHeading, $subheading = null, $addUnderheaderButtons = false, $includeArrow = false, $fullWhiteLogo = false, $isHome = false, $isContact = false) { ?>
        <header class="header">
            <div class="header__imageContainer">
                <div class="header__unblurred-image header__unblurred-image"></div>
            </div>
            <nav class="nav">
                <div class="cookiesBar">
                    <p class="cookiesBarText">By using our website, you agree to the use of cookies. <a class="cookieLink" target="_blank" href="https://ico.org.uk/your-data-matters/online/cookies/">Learn about Cookies.</a></p>
                    <div class="closeContainer">
                        <a href="" class="close scroller"></a>
                    </div>
                </div>
                <div class="nav__top-bar">
                    <div class="header__logo-box <?php echo $isHome ? "home-box" : ""; ?>">
                        <div class="header__logo <?php echo $fullWhiteLogo ? "fullWhite" : "" ?>">
                            <img src="img/logoBlack.svg" style="visibility: hidden;">
                        </div>
                    </div>
                    <div class="nav__enquireButtonAndHamburger">
                        <div class="nav__tel">
                            <a href="tel:+44 01460 258 802"><i class="fas fa-rotate-90 fa-phone"></i> +44 01460 258 802</a>
                        </div>
                        <a class="menuTransition hvr-shutter-out-horizontal nav__enquire <?php echo $isContact ? "scroller" : ""; ?> btn btn--enquire btn--enquire--desktop" href="contact">Enquire Now</a>
                        <div class="hamburger">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="desktopMenu__grey"></div>
                    <div class="desktopMenu">
                        <!-- <div class="desktopMenu__top"></div> -->
                        
                        <h1 class="desktopMenu__header">Quality homes, built to last.</h1>
                        <ul class="nav__list">
                            <li><a class="menuTransition" href="index">Home</a></li>
                            <li><a class="menuTransition" href="about">About</a></li>
                            <li><a class="menuTransition" href="services">Services</a></li>
                            <li><a class="menuTransition" href="work">Work</a></li>
                            <li><a class="menuTransition" href="contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="desktopMenu">
                    <div class="desktopMenu__top"></div>
                    <h1 class="desktopMenu__header">Quality homes, built to last.</h1>
                    <ul class="nav__list">
                        <li><a class="menuTransition" href="index">Home</a></li>
                        <li><a class="menuTransition" href="about">About</a></li>
                        <li><a class="menuTransition" href="services">Services</a></li>
                        <li><a class="menuTransition" href="work">Work</a></li>
                        <li><a class="menuTransition" href="contact">Contact</a></li>
                    </ul>
                </div> -->
            </nav>
            <div class="header__text-box">
                <h1 class="initialState header__heading-primary"><?php echo $primaryHeading; ?></h1>
                <?php if ($subheading !== null) { ?>
                    <h2 class="initialState header__heading-sub"><?php echo $subheading; ?></h2>
                <?php } ?>
                <?php if ($addUnderheaderButtons === true) { ?>
                    <a href="about" class="initialState menuTransition hvr-shutter-out-horizontal btn btn--about btn--transparent btn--headerButton">About us</a>
                    <a class="initialState menuTransition hvr-shutter-out-horizontal nav__enquire btn btn--enquire btn--contact-us btn--enquire--desktop" href="contact">Contact us</a>
                <?php } ?>
            </div>
            <?php if ($includeArrow === true) { ?>
                <div class="animated bounce header__arrow"><i class="arrow down"></i></div>
            <?php } ?>
        </header> <?php 
    } 

    function getImageAndTextSection($header = null, $isRight = false, Array $paragraphs, $imageURL, $textCentred = false, $firstParagraphBordered = false, $includeLearnMoreBtn = false, $btnText = "Put something Useful here", $btnUrl = "#", $iconName = null, $extraClass = null) { ?>
        <section class="textAndImage" id="<?php echo $extraClass ? $extraClass : ''; ?>">
            <div class="textAndImage__text <?php echo $isRight ? 'textAndImage__text--right' : ''; ?>">
                <div class="textAndImage__textContainer">
                    <?php if ($iconName !== null) { ?>
                    <img class="icon initialState" src="<?php echo './img/' . $iconName; ?>">
                    <?php } ?>
                    <?php if ($header !== null) { ?>
                        <h2 class="textAndImage__heading  initialState directHeading <?php echo $textCentred ? 'centered centerMargins' : ''; ?>"><?php echo $header; ?></h2>
                    <?php } ?>
                    <?php foreach ($paragraphs as $key => $paragraph) { 
                        if ($firstParagraphBordered == true && $key == 0) { ?>
                            <p class="textAndImage__borderedText  initialState <?php echo $textCentred ? ' centered' : ''; ?>">
                            <?php } else { ?>
                        <p class="textAndImage__paragrah initialState <?php echo $textCentred ? 'centered' : ''; ?>">
                       <?php } ?>
                    <?php echo $paragraph; ?>
                    </p> <?php } 
                    if ($includeLearnMoreBtn) { ?>
                        <a href="<?php echo $btnUrl; ?>" class="initialState menuTransition btn btn--transparent textAndImage__btn"><?php echo $btnText ?><img class="btn__arrow" src="img/right_arrow_black.png"></a>
                    <?php  } ?>
                </div>
            </div>
            <div class="textAndImage__image" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(' <?php echo $imageURL; ?>')"></div>
        </section>
    <?php } 

    function getImageSection($header, $text, $imageURL, $buttonText = null, $buttonUrl = null) { ?>
        <section class="imageSection divImg lazy" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(' <?php echo $imageURL; ?>')">
            <div class="imageSection__textSection">
                <h2 class="initialState"><?php echo $header; ?></h2>
                <p class="initialState">
                    <?php echo $text; ?>
                </p>
                <?php if ($buttonText !== null) { ?>
                    <a href="<?php echo $buttonUrl; ?>" class="menuTransition initialState btn btn--transparent textAndImage__btn"><?php echo $buttonText ?><img class="btn__arrow" src="img/getInTouch.png"></a>
                <?php } ?>
            </div>
        </section>
    <?php }

    function getHTMLHeader($browserTitle, $sectionClass) { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/all.min.css">
            <script src="js/utils.js"></script>
            <script src="js/main.js"></script>
            <script src="js/Transition.js"></script>
            <link rel="shortcut icon" type="image/x-icon" href="img/favicon-32x32.png">
            <meta name="format-detection" content="telephone=no">
            <link rel="stylesheet" href="css/hover.css">
            <title><?php echo $browserTitle; ?></title>
        </head>
        <body>
            <div class="<?php echo $sectionClass; ?>">
    <?php }

    function getTextStrip($header, $text) { ?>
        <section class="textStrip">
            <div class="textStrip__container">
                <h2 class="initialState"><?php echo $header; ?></h2>
                <p class="initialState textStrip__text">
                    <?php echo $text; ?>
                </p>
            </div>
        </section>
    <?php } 
                
    function getIconBanner() { ?> 
        <section class="iconBanner">
            <div class="iconBanner__all-icon-container">
                <!-- <a href="services#design"> -->
                    <a href="services#design" class="iconBanner__container" id="designAndPlanningIcon">
                        <img src="img/design planning.svg">
                        <span class="iconBanner__text">Design & Planning</span>
                    </a>
                <!-- </a> -->
                <!-- <a href="services#construction"> -->
                    <a href="services#construction" class="iconBanner__container">
                        <img src="img/construction.svg">
                        <span class="iconBanner__text">Construction</span>
                    </a>
                <!-- </a> -->
                <!-- <a href="services#projectManagement"> -->
                    <a href="services#projectManagement" class="iconBanner__container">
                        <img src="img/projectmanagement.svg">
                        <span class="iconBanner__text">Project Management</span>
                    </a>
                <!-- </a> -->
            </div>
        </section>
    <?php } 
        
    function getTripleImageBox(Array $images) { ?>
        <section class="tripleImageBox">
            <?php foreach ($images as $image) { ?>
                <div class="tripleImageBox__image">    
                    <img class="zoomImg lazy" src="<?php echo $image; ?>">
                </div>
            <?php } ?>
        </section>
    <?php } ?>
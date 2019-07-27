<?php

include 'partials/footer.php';
include 'partials/strings.php';

?>
    <?php getHTMLHeader('Woodram', 'contact'); ?>

    
    <?php getHeader('<span class="italic">Call us today</span> to discuss your project', null, false, false, false, false, true); ?>




        <section class="textAndImage">
            <div class="textAndImage__text">
                <div class="textAndImage__textContainer">
                    <h2 class="initialState textAndImage__heading">Get in touch with our friendly team.</h2>
                    <p class="initialState textAndImage__borderedText">
                        Our fantastic team are ready and waiting to help you create your dream space. To get started ﬁll out the contact form below and we’ll make sure your enquiry is answered promptly.
                    </p>
                    <p class="initialState textAndImage__paragrah">
                        Whether you're wanting information about a particular service, a quote, or making a consultation appointment, you've come to the right place.  We are ready with answers to your questions.
                    </p>
                    <!-- <p class="initialState textAndImage__paragrah">
                        We are ready with answers to your questions, and we look forward to showing you how much we appreciate your business.

                    </p> -->
                    <!-- <p class="animIn textAndImage__paragrah">
                        Strategies that transform brands, exceed expectations and deliver.
                    </p>
                    <a href="#" class="animIn btn btn--transparent">View more<img class="btn__arrow" src="img/right_arrow_black.png"></a> -->
                </div>
            </div>
            <!-- <div class="textAndImage__image divImg lazy" data-imgSrc="./img/woodram-7.jpg"></div> -->
            <div class="textAndImage__image divImg lazy" data-imgSrc="./img/stokefire.jpg"></div>
                <!-- <img src="img/stokefire.jpg"> -->
            <!-- </div> -->
        </section>
        <section class="textAndImage">
            <div class="textAndImage__text textAndImage__text--right">
                <div class="textAndImage__textContainer">
                    <h2 class="textAndImage__heading">Based in the heart of rural Somerset.</h2>
                    <p class="initialState textAndImage__borderedText">
                        Our company was founded on high workmanship, skill, and ideas. We are located in the heart of Somerset and our base of operations is surrounded by stunning architecture and picturesque landscapes that we use to inspire us in everything we do.
                    </p>
                    <p class="initialState textAndImage__paragrah">
                        For any project; domestic, community, listed or commercial, our friendly team are always happy to help with any enquiries you may have. Please feel free to get in touch to start the building process of your dream house today.
                    </p>
                    <p class="initialState textAndImage__paragrah">
                        Yours sincerely,
                    </p>
                    <p class="initialState textAndImage__paragrah">
                        Chris, Paul, Nathaniel & the Woodram team.
                    </p>
                </div>
            </div>
            <div class="textAndImage__image divImg lazy" data-imgSrc="./img/IMG_1412.jpg"></div>

        </section>


        <form class="contact__contactForm" id="contact-form">
            
            <h2 class="contact__contactForm__heading animIn">Get in Touch</h2>
            
            <div class="formFieldContainer">
                <input class="formField formFieldName" type="text" placeholder="Name">
                <div class="error nameError">* Please enter your name</div>
            </div>
            
            <div class="formFieldContainer">
                <input class="formField formFieldEmail" type="text" placeholder="Email">
                <div class="error emailError">* Please enter your name</div>
            </div>
            <div class="formFieldContainer">
                <input class="formField formFieldContactNo" type="text" placeholder="Contact Number">
                <div class="error contactNoError">* Please enter your telephone no.</div>
            </div>

            <div class="formFieldContainer">
                <input class="formField formFieldContractType" type="text" placeholder="Type of contract">
                <div class="error contractTypeError">* Please enter the type of contract you're interested in.</div>
            </div>
            <div class="formFieldContainer">
                <input class="formField formFieldMore" type="text" placeholder="Tell us more">
                <div class="error moreError">* Please enter your name</div>
            </div>
            <div class="submitButtonContainer">
                <a class="hvr-shutter-out-horizontal nav__enquire btn btn--enquire submit btn--submit" href="#">Submit</a>
            </div>
        </form>
        <!-- </section> -->
    <!-- </div> -->

    <footer class="footer">
            <div class="footer__top">
                <div class="footer__top__inner-container">
                    <div class="footer__top__inner-container__registration">
                        Registered in England & Wales 07841060
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
    </div>

</body>
</html>
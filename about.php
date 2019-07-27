<?php

include 'partials/footer.php';
include 'partials/strings.php';

getHTMLHeader('Woodram', 'about'); 
getHeader('Creating <span class="italic">beautiful</span> properties, built to be lived in', null, false, false);
getImageAndTextSection(ABOUT_IT_1_HEADER, false, [ABOUT_IT_1_P1, ABOUT_IT_1_P2, ABOUT_IT_1_P3], ABOUT_IT_1_IMG);
getImageAndTextSection("Constructing dream properties - with 40 years of building experience.", true, [ABOUT_IT_2_P1, ABOUT_IT_2_P2], ABOUT_IT_2_IMG);
getTripleImageBox(['./img/tap.jpg', './img/woodram-61.jpg', './img/woodram-65.jpg']);
getImageSection('Homes built with love.', 'We are passionate about what we do and truly believe our homes are there to be enjoyed. We pour our heart, soul and skill into every project and we believe this shows in our work.', './img/stokeovenshot.jpg', "Contact Us", "contact");
getFooter();
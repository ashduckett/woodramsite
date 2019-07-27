<?php

include 'partials/footer.php';
include 'partials/strings.php';

getHTMLHeader('Woodram', 'home');
getHeader(HOME_HEADER_PRIMARY, HOME_HEADER_SUB, true, true, false, true);
getIconBanner();
getImageAndTextSection(HOME_IT_1_HEADER, false, [HOME_IT_1_P1, HOME_IT_1_P2, HOME_IT_1_P3], HOME_IT_1_IMG, false, true, true, "About Us", "about"); 
getImageAndTextSection(HOME_IT_2_HEADER, false, [HOME_IT_2_P1, HOME_IT_2_P2, HOME_IT_2_P3, HOME_IT_2_P4], HOME_IT_2_IMG, false, false, true, "Services", "services");
getTextStrip(HOME_TS_1_HEADER, HOME_TS_1_SUB);
getImageSection(HOME_IMG_1_HEADER, HOME_IMG_1_TEXT, HOME_IMG_1_IMG);
getFooter();
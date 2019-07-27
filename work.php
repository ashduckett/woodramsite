<?php

include 'partials/footer.php';
include 'partials/strings.php';

getHTMLHeader('Woodram', 'work');
getHeader('<span class="italic">Quality</span>, throughout');
getImageAndTextSection(WORK_IT_1_HEADER, false, [WORK_IT_1_P1, WORK_IT_1_P2, WORK_IT_1_P3], WORK_IT_1_IMG);
getImageSection(WORK_IMG_1_HEADER, WORK_IMG_1_TEXT, WORK_IMG_1_IMG);
getTripleImageBox(["./img/Woodram-68.jpg", "./img/Woodram-60.jpg", "./img/Woodram-67.jpg"]);
getImageAndTextSection(WORK_IT_2_HEADER, false, [WORK_IT_2_P1, WORK_IT_2_P2], WORK_IT_2_IMG);
getImageAndTextSection(WORK_IT_3_HEADER, false, [WORK_IT_3_P1], WORK_IT_3_IMG);
getFooter();

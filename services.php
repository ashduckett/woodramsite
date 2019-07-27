<?php 

include 'partials/footer.php';
include 'partials/strings.php';

getHTMLHeader('Woodram', 'services');
getHeader('From concept to completion, we\'ll be <span class="italic">by your side</span>', null, false, false, true); 

// function getImageAndTextSection($header = null, $isRight = false, Array $paragraphs, $imageURL, $textCentred = false, $firstParagraphBordered = false, $includeLearnMoreBtn = false, $btnText = "Put something Useful here", $btnUrl = "#", $iconName = null, $extraClass = null) {
getImageAndTextSection(SERVICES_IT_1_HEADER, false, [SERVICES_IT_1_P1, SERVICES_IT_1_P2], SERVICES_IT_1_IMG, false, false, false, false, null, "design planning.svg", 'design');
getImageAndTextSection("Interior and exterior construction specialists.", true, [SERVICES_IT_2_P1, SERVICES_IT_2_P2], SERVICES_IT_2_IMG, false, false, false, null, null, "construction.svg", 'construction');
getImageAndTextSection(SERVICES_IT_3_HEADER, false, [SERVICES_IT_3_P1], SERVICES_IT_3_IMG, false, false, false, false, null, "drill.svg", null);
getImageAndTextSection("Project managed by experienced professionals.", true, [SERVICES_IT_4_P1], SERVICES_IT_4_IMG, false, false, false, null, null, "projectmanagement.svg", 'projectManagement');
getFooter();

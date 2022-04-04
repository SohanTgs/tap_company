<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here
$secondColor = "#ff8"; // Change your Color Here

function checkhexcolor($color)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) and $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color or !checkhexcolor($color)) {
    $color = "#336699";
}


function checkhexcolor2($secondColor)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $secondColor);
}

if (isset($_GET['secondColor']) and $_GET['secondColor'] != '') {
    $secondColor = "#" . $_GET['secondColor'];
}

if (!$secondColor or !checkhexcolor2($secondColor)) {
    $secondColor = "#336699";
}
?>


.index2_header_wrapper {
background: <?php echo $color; ?>;
}

.index3_header_btn li:last-child a,.index3_about_btn a, .slider-area .carousel-inner .carousel-item .carousel-captions .content .index3_sliderbtn li:last-child a {
background: <?php echo $secondColor; ?>;
}

.index3_header_btn li:first-child a {
background: <?php echo $secondColor; ?>;
}

.index3_welcome_checkbox .purple_inovate a i, .index3_welcome_checkbox .blue_inovate a i, .index3_welcome_checkbox .green_inovate a i {
background: <?php echo $secondColor; ?>;
}

.index3_investment_box_Wraper .plans_btn a:hover{
background: <?php echo $secondColor; ?>;
}

.index3_offer_tabs .nav-tabs .nav-item.show .nav-link, .index3_offer_tabs .nav-tabs .nav-link.active {
background: <?php echo $secondColor; ?>;
}

.index3_table_race table tr th:first-child, .index3_question_modal button.close, .table_next_race table tr th {
background: <?php echo $secondColor; ?>;
}

.index3_banner_wrapper, .index3_global_community, .index3_global_community .index2_global_comm_wrapper {
background: <?php echo $secondColor; ?>;
}

.index3_newsletter, .index3_newsletter .save_newsletter_field button:hover {
background: <?php echo $secondColor; ?>;
}

.index3_footer_wrapper {
background: <?php echo $secondColor; ?>;
}

.contact_section .tb_es_btn_wrapper button{
background: <?php echo $secondColor; ?>;
border:0px;
}

.faqq_btn li a {
background: <?php echo $secondColor; ?>;
}
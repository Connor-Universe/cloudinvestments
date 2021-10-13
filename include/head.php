<?php
include("config.php");
$get_setting ="select * from settings";
$run_setting = mysqli_query($connect,$get_setting);
$row_setting = mysqli_fetch_array($run_setting);
$phone = $row_setting['phone'];
$location = $row_setting['location2'];
$email4 = $row_setting['email'];
?>

<header class="header">
<div class="container">
<div class="row">
<div class="col-lg-8" data-aos="fade-down">
<div class="header-contacts">
<div class="header-contacts__item line-top-bg">
<svg>
<use xlink:href="assets/img/sprite.html#contract"></use>
</svg><span>Company Number</span><a href="" >#12451015</a></div>
<div class="header-contacts__item header-contacts__item_address line-top-bg">
<svg>
<use xlink:href="assets/img/sprite.html#pin"></use>
</svg><span>Address </span><a href="javascript:void(0)"><?php echo"$location";?></a></div>
<div class="header-contacts__item line-top-bg">
<svg>
<use xlink:href="assets/img/sprite.html#phone"></use>
</svg><span>Phone</span><a href="javascript:void(0)"><?php echo"$phone";?></a></div>
</div>
</div>
<div class="col-lg-4 d-flex align-items-center justify-content-center">
<div class="language" data-aos="fade-down" data-aos-delay="100">
<div class="language-main"><span class="flag-icon flag-icon-us"></span><span>Eng</span>
<svg>
<use xlink:href="assets/img/sprite.html#arrow-down"></use>
</svg>
</div>
<div class="language-hide"><a class="language__item" href="#"><span>Japan</span><span class="flag-icon flag-icon-jp"></span></a><a class="language__item active" href="#"><span>English</span><span class="flag-icon flag-icon-us"></span></a><a class="language__item" href="#"><span>Poland</span><span class="flag-icon flag-icon-pl"></span></a><a class="language__item" href="#"><span>Русский</span><span class="flag-icon flag-icon-ru"></span></a><a class="language__item" href="#"><span>Sweden</span><span class="flag-icon flag-icon-se"></span></a><a class="language__item" href="#"><span>China</span><span class="flag-icon flag-icon-cn"></span></a><a class="language__item" href="#"><span>Vietnam</span><span class="flag-icon flag-icon-vn"></span></a><a class="language__item" href="#"><span>Brazil</span><span class="flag-icon flag-icon-br"></span></a><a class="language__item" href="#"><span>Ukraine</span><span class="flag-icon flag-icon-ua"></span></a><a class="language__item" href="#"><span>France</span><span class="flag-icon flag-icon-fr"></span></a></div>
</div>
<div class="header-btns" data-aos="fade-up" data-aos-delay="100">
<a class="main-btn main-btn_blue login-btn" href="indexc30b.php?a=login">SIGN IN</a>
<a class="main-btn login-btn" href="indexcca3.php?a=signup">OPEN ACCOUNT</a></div>
</div>
</div>
</div>
</header>
<div class="telegram">
               <a href="t.me/luxequity_agency" >
                <div class="circlephone" style="transform-origin:center;"></div>
                <div class="circle-fill" style="transform-origin:center;"></div>
                <div class="img-circle" style="transform-origin:center;">
                    <div class="img-circlephone" style="transform-origin:center;"><i class="fa fa-whatsapp"></i></div>
                </div>
            </a>
           </div>
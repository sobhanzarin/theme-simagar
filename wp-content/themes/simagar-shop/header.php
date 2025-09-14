<?php 
    $header_type = simagar_setting('header-type');
    $logo = simagar_setting('logo-website');
    $logo_width = simagar_setting('logo-width');
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> > 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simagar shop</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?> >

    <div>
    <?php if($header_type == 'elementor') : ?>
    <?php else: ?>
         <div class="top-header py-3">
            <div class="container d-flex align-items-center justify-content-between">
                <p>به وب سایت سیماگر شاپ خوش آمدید.</p>
                <div class="d-flex content-top-header">
                    <div class="content-item ms-4">
                        <i class="icon-header fa-regular fa-location-dot"></i>
                        <span>به شماره ۴۲۳۶۵۱ ارسال کنید</span>
                    </div>
                    <div class="content-item ms-4">
                        <i class="icon-header fa-light fa-truck"></i>
                        <span>سفارش خود را پیگیری کنید</span>
                    </div>
                    <div class="content-item">
                        <i class="icon-header fa-regular fa-badge-percent"></i>
                        <span>تخفیفات</span>
                    </div>
                </div>
            </div>
            </div>
        <div class="container d-flex align-items-center justify-content-between py-3">
           <div class="d-flex align-items-center">
                <a class="ms-4 logo-header" href="<?php echo esc_url(home_url())?>">
                    <img width="<?php echo esc_attr($logo_width)?>px" src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>">
                </a>
                <div class="search-holder">
                        <form action="" id="form-search">
                            <input class="form-control header-search-box" type="text" placeholder="دنبال چی میگردید؟">
                            <button class="btn-search-header" type="submit"><i class="icon-header fa-solid fa-magnifying-glass"></i></button>
                        </form>
                </div> 
           </div>
            <div class="d-flex align-items-center justify-content-center"> 
                  <div>
                      <a class="auth-holder" id="btn-auth" href="">
                        <i class="icon-header fa-regular fa-user"></i>
                        ورود | ثبت نام
                    </a>
                    <a class="cart-holder" href="">
                        <i class="icon-header fa-regular fa-cart-shopping"></i>
                        سبد خرید
                    </a>
                  </div>
            </div>
            
        </div>
    <?php endif; ?>

    </div>


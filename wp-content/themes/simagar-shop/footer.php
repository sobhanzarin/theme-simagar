    <?php $logo = simagar_setting("logo-website");?>
    <div class="login-modal">
        <div class="body p-4">
            <i class="close-modal d-flex align-items-center justify-content-center p-3 fa-solid fa-xmark" id="close-modal"></i>
            <div>
                <img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>">
            </div>
            <p class="title-login-modal mt-3">ورود به سایت</p>
            <form action="" class="mt-3">
                <div class="mt-3">
                    <input class="form-control" type="text" placeholder="نام کاربری یا ایمیل" name="userName" >
                </div>
                <div class="mt-3">
                    <input class="form-control" type="password" placeholder="رمز عبور">
                </div>
                <div class="mt-3">
                    <a href="" class="d-flex lost-password">رمز عبور خود را فراموش کردید؟</a>
                </div>
                <div class="mt-3" >
                    <input class="btn-submit form-control" type="submit" value="ورود به سایت"></button>
                </div>
                <div class="mt-3" >
                    <a href="" class="signup">ثبت نام در سایت</a>
                </div>
            </form>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
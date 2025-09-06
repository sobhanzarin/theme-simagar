<?php
 $formData = get_option('_lb_setting') ?? null; 
 ?>
<h2>تنظیمات افزونه لاگین باش</h2>
<div style="width: 100px; padding:30px;" >
<form action="" method="post">
    <label for="عنوان فرم"></label>
    <input value="<?php echo $formData; ?>" id="form-title" style="margin-bottom: 8px;" type="text" name="formTitle" placeholder= "عنوان را وارد کنید">
    <label for="">توضیحات</label>
    <textarea name="descrption" id="descrption" style="margin-bootom: 8px;"></textarea>
    <input type="submit" name="submit" value="دخیره">
</form>
</div>
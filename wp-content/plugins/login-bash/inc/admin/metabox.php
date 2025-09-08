<?php 
add_action('add_meta_boxes', 'lb_video_url_metabox');
add_action('add_meta_boxes', 'lb_video_download_metabox');

function lb_video_url_metabox(){
    add_meta_box(
    'lb_video_url_metabox', 
    ' آدرس ویدئو',
    'video_url_handler',
    'post',
    'normal'
);
}
function lb_video_download_metabox(){
     add_meta_box(
    'lb_video_download_metabox', 
    ' باکس ویدئو',
    'video_box_handler',
    'post',
    'normal'
);
}

function video_url_handler(){
    include LB_PLUGIN_VIEW . "admin/box-video.php";
} 
function video_box_handler($post){
    var_dump($_POST);
    ?>
            <label for="titleLink">عنوان لینک</label>
            <input value='<?php echo get_post_meta($post->ID, '_lb_title_link', true) ?>' style='width: 100%;' type="text" name="titleLink" id="titleLink" placeholder="عنوان لینک">
              <label for="urlLink">آدرس لینک</label>
            <input value='<?php echo get_post_meta($post->ID, '_lb_url_link', true) ?>' style='width: 100%;' type="text" name="urlLink" id="urlLink" placeholder="آدرس لینک">
<?php }

function lb_save_video_handler($post_id){
    if(isset($_POST['videoUrl']) && !empty($_POST['videoUrl'])){
        update_post_meta($post_id, '_lb_video_url', $_POST['videoUrl'] );
    }
    if(isset($_POST['titleLink'])){
        update_post_meta($post_id, '_lb_title_link', $_POST['titleLink'] );
    }
    if(isset($_POST['urlLink'])){
        update_post_meta($post_id, '_lb_url_link', $_POST['urlLink'] );
    }
}
add_action('save_post', 'lb_save_video_handler');
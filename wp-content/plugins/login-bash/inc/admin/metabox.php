<?php 

function lb_video_url_metabox(){
    add_meta_box(
    'lb_video_url_metaboc', 
    ' آدرس ویدئو',
    'video_url_handler',
    'post',
    'normal'
);
}

add_action('add_meta_boxes', 'lb_video_url_metabox');

function video_url_handler(){
    include LB_PLUGIN_VIEW . "admin/box-video.php";
} 

function lb_save_video_handler($post_id){
    if(isset($_POST['videoUrl'])){
        update_post_meta($post_id, '_lb_video_url', $_POST['videoUrl'] );
    }
}
add_action('save_post', 'lb_save_video_handler');
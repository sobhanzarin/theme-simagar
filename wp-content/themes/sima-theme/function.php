<?php
global $wpdb;

$result = $wpdb->get_results("SELECT * FROM {$wpdb->users}");

var_dump($result);

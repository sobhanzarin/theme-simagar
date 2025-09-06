<?php
global $wpdb;

$ticketTable = $wpdb->prefix . "ticket";

$result = $wpdb->get_results("SELECT * FROM {$ticketTable}", ARRAY_A);
$getTicket = $wpdb->get_results("SELECT * FROM {$ticketTable}");
// $wpdb->query($wpdb->prepare("INSERT INTO {$ticketTable} (name, title, content) VALUES (%s, %s,%s)",  ['name' => 'ali', 'title3' => 'new title sobhan 3', 'content' => 'new contetn sobhan 3']));
// $wpdb->insert($ticketTable,  ['name' => 'sobhan', 'title' => 'new title sobhan', 'content' => 'new contetn sobhan'], ['%s', '%s', '%s']);
// $data =  ['name' => 'sobhan', 'title' => 'new title sobhan', 'content' => 'new contetn sobhan'];
// $format = ['%s', '%s', '%s'];
// $data = ['name' => 'mohamad', 'status' => 1];
// $format3 = ['%s', '%d'];
$id = 7; 
$where = ['ID' => $id];
$whereFormat = ['%d'];
// $wpdb->query($wpdb->prepare("UPDATE {$ticketTable} SET status = %d WHERE id = %d", $status, $id));
// $wpdb->update($ticketTable, $data, $where, $format3 ,$whereFormat );
// $wpdb->query($wpdb->prepare("DELETE FROM {$ticketTable} where id = %d", $id));
// $wpdb->delete($ticketTable, $where, $whereFormat );
echo "<pre>";
var_dump($getTicket);
echo "</pre>";
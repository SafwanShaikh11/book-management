<?php
session_start();
header('Content-Type: application/json');

$file = 'wishlist.json';
$wishlist = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    echo json_encode($wishlist);
    exit;
}

if ($_GET['action'] == 'add') {
    $id = $_GET['id'];
    if (!in_array($id, $wishlist)) {
        $wishlist[] = $id;
        file_put_contents($file, json_encode($wishlist));
    }
    echo json_encode(['success' => true]);
} elseif ($_GET['action'] == 'list') {
    echo json_encode($wishlist);

}




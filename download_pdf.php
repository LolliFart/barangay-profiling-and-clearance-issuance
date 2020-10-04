<?php
if(!isset($_SESSION)){
    session_start();
}
if (isset($_GET['download']) && $_GET['download'] == "true") {
    include 'utilities/generate_pdf.util.php';
    require_once realpath("vendor/autoload.php");

    $data = $_SESSION['data'];
    $data['is_download'] = true;

    if(!isset($_SESSION['pdf_filename'])){
        $_SESSION['pdf_filename'] = $data['lastname'] . '_' . rand(2000, 1200000) . '.pdf';
    }
    $data['pdf_filename'] = $_SESSION['pdf_filename'];
    $data['fullname'] = $data['firstname'] . ' ' . substr($data['middlename'], 0, 1) . '.' . ' ' . $data['lastname'];
    generate_pdf($data);
}

?>
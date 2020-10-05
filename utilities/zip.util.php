
<?php


if(!file_exists(realpath("upload_zip_image"))){
    mkdir("upload_zip_image");
}


function zip_upload_img($img){

    $zip = new ZipArchive();

    
    $zip_name = "upload_zip_image/upload_" . time() . ".zip";
    
    // Create a zip target
    if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
        return false;
    }
    
    $imageCount = count($img['file']['name']);
    for($i=0; $i<$imageCount; $i++) {
    
        if ($img['file']['tmp_name'][$i] == '') {
            continue;
        }
        
        // Moving files to zip.
        $zip->addFromString($img['file']['name'][$i], file_get_contents($img['file']['tmp_name'][$i]));
        
    }
    $zip->close();
    
    return $zip_name; 
}



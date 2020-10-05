<?php
use Mpdf\Mpdf;


if(!file_exists(realpath("pdf"))){
    mkdir("pdf");
}

function generate_pdf($data){
    include 'includes/clearance_template/' . $data['clearance_path_name'];
    $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => [215.9, 356]]);
    $mpdf->WriteHTML($html);

    if($data['is_download']){
        $mpdf->Output($data['pdf_filename'], 'D');
    } else{
        $mpdf->Output('pdf/' . $data['pdf_filename'], 'F');
    }


    return $data['pdf_filename'];
}

?>
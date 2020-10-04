<?php

$year = date("Y");
$dateObj   = DateTime::createFromFormat('!m', date("m"));
$month = $dateObj->format('F'); 
$day = date('d');
$fullname = strtoupper($data['fullname']);
$age = $data['age'];
$status = $data['civil_status'];
$address = ucwords($data['address']);
$purpose = strtoupper($data['purpose']);


$html = '

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin:0; background-image: url(image/bg.jpg); background-image-resize:6;">

    <div style="color:white; text-align:center; font-size:11px; display:float; float:left; width:26%;">
        <img src="image/logo1.png" width="150">
    </div>

    <div style="padding-left:30px; display:float; float:right;">
        <div style="text-align:center; font-size:15px;">
            <p>
                Republic of the Philippines
                <br>
                City of Cagayan de Oro
                <br>
                <b>BARANGAY LAPASAN</b>
                <br>
                <b>OFFICE OF THE BARANGAY CHAIRMAN</b>
                <br>
                Tel. No. (08822) 881-9850
                <br>
                E-mail : GodblessLapasan2018@gmail.com
            </p>
            <br> 
            <h1>CERTIFICATION</h1>
        </div>


        <div style="text-align: justify; text-justify: inter-word; font-size:14px;">

            <br> 

            <p>To whom it may concern: </p>

            <br> 
            
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b style="font-size:16px;"> ' . $fullname . ',</b>'
                 . $age . ' years old,  ' . $status . ' and a resident of a resident of ' . ucwords($address) . ',
                is requesting for  <b style="font-size:16px;">  ' . $purpose . '</b>.
            </p>

            <br> 
            
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Further, certify that the above named person is
                erecting his/her dwelling in a public land.
            </p>

            <br> 

            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the request of the
                above named person for <b style="font-size:16px;">  ' . $purpose . '</b>
                purposes only.
            </p>

            <br> 

            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this day <b>' . $day . '</b> of <b>' . $month . '</b>, <b>' . $year . '</b> at
                Lapasan, Cagayan de Oro City.
            </p>



            <br> 
            <br> 

            <h4 style="text-align:center;">Recommending approval:</h4>
            <div style="text-align:right;">
                <p> 
                    <b>HON. JULITO D. OGSIMER</b> 
                    <br>
                    Punong Barangay
                </p>
            </div>
            <br> 
            <p>By the Authority of the Punong Barangay; </p>
            <br> 
            <div style="text-align:right;">
                <p> 
                    <b>JEOFFREY E. BACCONGA</b> 
                    <br>
                    Barangay Administrator
                </p>
            </div>

            <br>    
            <br> 

            <p>*Not valid without Official dry Seal.</p>
        </div>

    </div>

</body>

</html>


    ';



    
?>


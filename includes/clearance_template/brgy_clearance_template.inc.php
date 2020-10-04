<?php


$year = date("Y");
$dateObj   = DateTime::createFromFormat('!m', date("m"));
$month = $dateObj->format('F'); 
$day = date('d');
$fullname = strtoupper($data['fullname']);
$age = $data['age'];
$status = $data['civil_status'];
$address = ucwords($data['address']);
$purpose = $data['purpose'];



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
    <div style="text-align:center; font-size:13px;">
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
        <h1 style="text-decoration:underline;">BARANGAY CLEARANCE</h1>
    </div>


    <br>

    <div style="text-align: justify; text-justify: inter-word; font-size:14px;">

        <p>To whom it may concern: </p>

        <br>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b
                        style="font-size:18px; text-decoration:underline;"> ' . $fullname . ',</b> ' . $age .
                    ' years old,
                    ' . $status . ' and presently residing at ' . ucfirst($address) . ', and as shown in the
                    Sitio Clearance,
                    he/she is a person of good moral character.
                </p>


        
                <br>

                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the
                    request of the above named person as a requirement for <b
                        style="font-size:18px; text-decoration:underline;"> ' . strtoupper($purpose) . '</b> and
                    whatever legal intent it may serve him/her best.
                </p>

                <br>
                <br>

                <p>Issued this day <b>' . $day . '</b> of <b>' . $month . '</b>, <b>' . $year . '</b> at
                    Lapasan, Cagayan de Oro City.</p>

            </div>

            <br>
            <br>

            <div style="text-align:right;">
                <b>HON. JULITO D. OGSIMER</b>
                <p>Punong Barangay</p>
            </div>


            <p>By the Authority of the Punong Barangay; </p>

            <br>

            <div style="text-align:right;">
                <b>JEOFFREY E. BACCONGA</b>
                <p>Barangay Administrator</p>
            </div>

            <br>

            <p>*Not valid without Official dry Seal.</p>
        </div>

    </div>

</body>



</html>


    ';


?>


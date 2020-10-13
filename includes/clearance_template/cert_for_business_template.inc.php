<?php


$year = date("Y");
$dateObj   = DateTime::createFromFormat('!m', date("m"));
$month = $dateObj->format('F'); 
$day = date('d');
$fullname = $data['fullname'];
$address = $data['address'];

$business = $data['kindofbiz'];
$located_at = $data['located'];
$trade_name = $data['tradename'];
$year_validity =  $data['year_validity'];
$or_number = $data['or_number'];
$amount_paid = substr($data['amount_paid'], strlen($data['amount_paid'])-3, strlen($data['amount_paid'])) == '.00'? $data['amount_paid'] : $data['amount_paid'] . '.00';
$garbage_fee = substr($data['garbage_fee'], strlen($data['garbage_fee'])-3, strlen($data['garbage_fee'])) == '.00'? $data['garbage_fee'] : $data['garbage_fee'] . '.00';
 
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
            <h1 style="text-decoration:underline; letter-spacing:13px;">CERTIFICATION</h1>
        </div>


        <div style="text-align: justify; text-justify: inter-word; font-size:14px;">

            <br> 

            <p>To whom it may concern: </p>

            <br> 
            
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b style="font-size:16px; text-decoration:underline;"> ' . strtoupper($fullname) . ',</b>
                a resident of <b style="font-size:16px; text-decoration:underline;"> ' . strtoupper($address) . ',</b> 
                has engaged a business of 
                <b style="font-size:16px; text-decoration:underline;"> ' . strtoupper($business) . '</b> located at 
                <b style="font-size:16px; text-decoration:underline;"> ' . strtoupper($located_at) . '</b> in this City with the Trade Name of  
                <b style="font-size:16px; text-decoration:underline;"> ' . strtoupper($trade_name) . '</b>.
            </p>

            <br> 
            
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Furthermore, the Barangay Council of Lapasan has no objection to the
                operation of the establishment provided that the following are complied, to with:
            </p>

            <ol>
                <li>
                    Pay all Barangay Permit and clearances fees as may be required by the Lapasan
                    Barangay Council;
                </li>
                <li>
                    Exercise due care and diligence in maintaining hygience and sanitation in the
                    business establishment;
                </li>
                <li>
                    Provided the necessary facility/equipment in the establishment so as not to
                    disturb the tranquility in the neighborhood especially during the night time;
                </li>
                <li>
                    Display in conspicuous place in the establishment visible to the public view the
                    City Business Permit and this Barangay Certificate; and
                </li>
                <li>
                    Comply all requirements imposed by the City and National Government.
                </li>
            </ol>
 
            <br> 

            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certification is issued upon the
                request of the above named person in connection with his/her desire to <b>RENEW/APPLY</b> for Business Permit for the
                year ' . strtoupper($year_validity) . '.
            </p>

            <br> 

            <p>
                Done this day <b>' . $day . '</b> of <b>' . $month . '</b>, <b>' . $year . '</b> at
                Lapasan, Cagayan de Oro City.
            </p>

            </div>

            <br> 

            <div style="text-align:right;">
                <p> 
                    <b>HON. JULITO D. OGSIMER</b> 
                    <br>
                    Punong Barangay
                </p>
            </div>

            <p>By the Authority of the Punong Barangay; </p>

            <div style="text-align:right;">
                <p> 
                    <b>JEOFFREY E. BACCONGA</b> 
                    <br>
                    Barangay Administrator
                </p>
            </div>


            <p>
                <b>O.R #: ' . $or_number . '</b> 
                <br>
                <b>Amount Paid:Php: ' .$amount_paid . '</b> 
                <br> 
                <b>Garbage Fee: ' . $garbage_fee . '</b>
            </p>


            <p>*Not valid without Official dry Seal.</p>
        </div>

    </div>

</body>



</html>


    ';


?>


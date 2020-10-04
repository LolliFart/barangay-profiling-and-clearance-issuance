<?php

include_once 'sessions/login.php';

include("includes/templates/header.inc.php");

require_once realpath("vendor/autoload.php");

include("includes/templates/nav.inc.php");

?>
<div style="height:100vh; display:flex; align-items:center;">
    <div style="height: 100%;">
        <img src="image/flag.jpg" alt="" style="opacity:0.8; height:100%; width:100%; position:relative;">
    </div>
    <div class="home-text" style="position:absolute; display:flex; align-items:center;">
        <div class="">

            <img src="image/logo1.png" alt="logo" width="200">
        </div>
        <div>

            <h3 style="border-bottom:3px solid black;"><b>Republic of the Philippines</b></h3>

            <h1><b>BARANGAY OF LAPASAN, Cagayan de Oro City</b></h1>
        </div>
    </div>
</div>


<div class="text-text" style="padding:100px; background-color: #f4f4f2;">
    <div class="text-center" style="color:#495464; margin-bottom: 100px;">
        <h1><b>Barangay Profiling and Clearance Issuance</b></h1>
        <p class="lead">Barangay residents record and online clearance issuance.</p>

    </div>

    <div>
        <h2 class="" style="color:#495464;"><b>COVID19 Initiative</b></h2><br><br>

        <p class="text-secondary lead paragraph-format">
            The Barangay Profiling System contains the profile information such as full name, date of birth,
            place
            of
            birth, gender, civil status, religion, occupation and etc. of all the barangay residents.
            The residents profile information is stored safely and can be prepared and accessed easily by an
            admin
            (barangay employee/s) without going to the traditional way.
        </p>
        <p class="text-secondary lead paragraph-format">
            Aside form the barangay profiling system, Clearance issuance can also be done online which is less
            hassle
            for the resident. The resident may refrain to go to the barangay office just to have the clearance.
            They just have to go the website, fill out the request form and if the profile information matches
            the
            data
            to our database the resident can download a PDF file that contains the clearance requested.
        </p>
        <p class="text-secondary lead paragraph-format">
            The Barangay Profiling System and clearance issuance thru online is a good example of computer
            generated
            process that can lessen workload and as a result, it will not only benefit barangay employees but
            the
            administration as a whole.
        </p>

        <div>
            <h3></h3>
        </div>


    </div>
</div>





<?php
include("includes/templates/footer.inc.php");
?>
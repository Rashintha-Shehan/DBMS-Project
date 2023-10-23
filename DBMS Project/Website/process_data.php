<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voter_regestration";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$full_name = $_POST['firstname'];
$nic_number = $_POST['NIC'];
$date_of_birth = $_POST['birthday'];
$gender = $_POST['gender'];
$civil_status = $_POST['Civil'];
$electoral_district = $_POST['Districts'];
$polling_division = $_POST['PollingDiv'];
$polling_district_number = $_POST['dnumber'];
$grama_niladhari_division = $_POST['GSDD'];
$village_street_estate = $_POST['villagee'];
$house_number = $_POST['Housenumber'];
$chief_occupant_name = $_POST['Cfirstname'];
$chief_occupant_nic = $_POST['C_NIC'];
$relationship_to_chief_occupant = $_POST['Relationship1'];
$mobile_number = $_POST['phnn'];




$sql1 = "INSERT INTO personal_details (Full_Name, NICNumber, Date_Of_Birth, Gender, Civil_Status)
        VALUES ('$full_name', '$nic_number', '$date_of_birth', '$gender', '$civil_status')";


$sql2 = "INSERT INTO informationelecarea (Electoral_District, Polling_Division, Polling_District_no, GramaNiladhari_Division, Village_Street_Estate, House_Number)
        VALUES ('$electoral_district', '$polling_division', '$polling_district_number', '$grama_niladhari_division', '$village_street_estate', '$house_number')";


$sql3 = "INSERT INTO informationchiefoccu (Name_Chief_Occu, NIC_Chief_Occu, Relationship_Chief_Occ, Mobile_Chief_Occu)
        VALUES ('$chief_occupant_name', '$chief_occupant_nic', '$relationship_to_chief_occupant', '$mobile_number')";


if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}


$conn->close();
$previewURL = "preview.html?firstname=$full_name&NIC=$nic_number&birthday=$date_of_birth&gender=$gender&Civil=$civil_status&Districts=$electoral_district&PollingDiv=$polling_division&dnumber=$polling_district_number&GSDD=$grama_niladhari_division&villagee=$village_street_estate&Housenumber=$house_number&Cfirstname=$chief_occupant_name&C_NIC=$chief_occupant_nic&Relationship1=$relationship_to_chief_occupant&phnn=$mobile_number";


echo "<a href='$previewURL'>View Preview</a>";


?>

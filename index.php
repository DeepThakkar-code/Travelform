<?php
$insert = false;
if (isset($_POST["name"])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("database is not connected due to " . mysqli_connect_error());
    }

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $otherinfo = $_POST["desc"];

    $sql = "INSERT INTO `travel`.`travel` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `desc`, `DT`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$otherinfo', current_timestamp())";
        // echo $sql;

    if($con->query($sql) == true) {
        // echo "Successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br> " . $con->error;
    }

    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Welcome to Travel From</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <h1>Welcome to our tavel Agency</h1>
        <p>Enter your details and sumbit the form to confirm your participation in the trip </p>
        <?php
        if( $insert == true){
       echo "<p class='submittingMess'>Thanks for submitting your form. We are happy to see you joining us </p>";}
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter you Name ">
            <input type="text" name="age" id="age" placeholder="Enter you Age ">
            <input type="text" name="gender" id="gender" placeholder="Enter you Gender ">
            <input type="email" name="email" id="email" placeholder="Enter you Email ">
            <input type="phone" name="phone" id="phone" placeholder="Enter you Phone Number">
            <textarea name="desc" id="desc" cold="30" rows="10"
                placeholder="Enter any other Information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <p>This website is created for educational and learning purposes only</p>
    <script src="index.js"></script>

</body>

</html>

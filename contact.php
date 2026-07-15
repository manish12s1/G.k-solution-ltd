<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "gk"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$NAME = $_POST['NAME'];
$EMAIL = $_POST['EMAIL'];
$SUJECT = $_POST['SUBJECT'];
$MESSAGE = $_POST['MESSAGE'];

$sql = "INSERT INTO USER_DETIAL
        (NAME,EMAIL,SUBJECT,MESSAGE)
        VALUES
        ('$NAME','$EMAIL','$SUBJECT','$MESSAGE')";

if(mysqli_query($conn,$sql)){

    $to = "gkspacesolutionllp@gmail.com";
    $mail_subject = "New Contact Form Message";

    $mail_body = "
Name: $name
Email: $email
Subject: $subject

Message:
$message
";

    mail($to,$mail_subject,$mail_body);

    echo "
    <script>
        alert('Message Sent Successfully');
        window.location='contact.html';
    </script>
    ";

}
else{
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

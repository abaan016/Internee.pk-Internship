<?php

require("config.php");

if (isset($_GET["Email"]) && isset($_GET["v_code"])) {
    $getEmail = $_GET["Email"];
    $getVcode = $_GET["v_code"];

    $query = "SELECT * FROM `users` WHERE `Email`='$getEmail' AND `v_code`='$getVcode'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row["is_verified"] == 0) {
                $update = "UPDATE `users` SET `is_verified`='1' WHERE `Email` = '" . $row["Email"] . "'";
                if (mysqli_query($conn, $update)) {
                    echo '<script>alert("Email Verified Successfull"); window.location.href="index.php";</script>';
                } else {
                    echo '<script>alert("Email verification failed"); window.location.href="index.php";</script>';
                }
            } else {
                echo '<script>alert("User Already Verified"); window.location.href="index.php";</script>';
            }
        }
    } else {
        echo '<script>alert("Cannot run query"); window.location.href="index.php";</script>';
    }
} else {
    echo '<script>alert("something went wrong"); window.location.href="index.php";</script>';
}
?>
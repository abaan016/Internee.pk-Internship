<?php

$conn = new mysqli("localhost", "root", "", "db_auth");

if ($conn->connect_error) {
    echo "Server Error";
}

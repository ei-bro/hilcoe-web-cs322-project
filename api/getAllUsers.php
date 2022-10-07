<?php
session_start();

include("../connection.php");
include("../functions/functions.php");

if (isset($_SESSION['user_id'])) {
    $user_data = check_login($con);
    if ($user_data["role"] == "admin") {
        $data = [];
        $query = "select id,user_id,username,email,role from users ";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        }
    }
} else {
    header('Content-Type: application/json; charset=utf-8;status:404');

    echo json_encode([]);
}

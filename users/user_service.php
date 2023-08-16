<?php
include_once("../connect.php");

$function = $_GET['function'];

if ($function == "insert") {

    $username = $_POST['userName'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $sql_insert = "INSERT INTO users_tb (
                                            username,
                                            email, 
                                            password
                                        ) VALUES (
                                            '" . $username . "',
                                            '" . $email . "',
                                            '" . $password . "'
                                        )";

    if ($result = mysqli_query($conn, $sql_insert)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
    $conn->close();
    return;
} else if ($function == "readData") {

    $sql_read = "SELECT * FROM users_tb";
    $result = mysqli_query($conn, $sql_read);

    $arr = [];

    while ($row = mysqli_fetch_array($result)) {
        $arr[] = $row;
    }
    print(json_encode($arr));
    $conn->close();
    return;
} elseif ($function == "delete") {

    $id = $_POST['idUser'];

    $sql_delete = "DELETE FROM users_tb WHERE id = $id ";
    $result = mysqli_query($conn, $sql_delete);

    if ($result = mysqli_query($conn, $sql_delete)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
    $conn->close();
    return;
} else if ($function == "update") {

    $id = $_POST['idUser'];
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $sql_update = "UPDATE 
                                users_tb
                        SET
                                username = '" . $username . "', 
                                email = '" . $email . "',
                                password = '" . $password . "' 
                        WHERE
                                id = $id ";

    if ($result = mysqli_query($conn, $sql_update)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
    $conn->close();
    return;
}

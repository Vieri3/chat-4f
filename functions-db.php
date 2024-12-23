<?php

    include 'versus.php';

    // функция подключения к базе данных
    function getDBconn(){
        $db_name = DB_NAME;
        $db_user = DB_USER;
        $db_pass = DB_PASS;
        $db_host = DB_HOST;
        // Create connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            // Check connection
            if ($conn->connect_error) {
                die("Ошибка подключения базы данных: " . $conn->connect_error);
            }
            return $conn;
        }


    function insertDBdata($sql){
        $conn = getDBconn();
        if ( mysqli_query( $conn, $sql ) ) {
            $result = 1;
        } else {
            $result = 0;
        }
        mysqli_close($conn);
        return $result;
    }

    function selectDBdata($sql){

        $conn = getDBConn();
        $rows = $conn->query($sql);
        $result = [];
        if ( $rows->num_rows > 0 ) {
            while( $row = $rows->fetch_assoc() ) {
                $result[] = $row;
            }
        }
        $conn->close();
        return $result;
    }


?>
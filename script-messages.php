<?php

    include 'functions-db.php';

    if (isset($_POST["message"]))
    {
        $name = $_COOKIE['name'];
        $message = $_POST["message"];
        $date = date('d.m.Y H:i:s');
        insertDBdata("INSERT INTO `data_chat` (`id`, `name`, `message`, `date`) VALUES (NULL, '$name', '$message', '$date')");

    }
    elseif (isset($_POST["update"]))
    {
        $mass = selectDBdata("SELECT `name`, `message`, `date` FROM `data_chat`");
        echo json_encode($mass);
    }

?> 
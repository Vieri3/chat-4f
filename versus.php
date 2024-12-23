<?php
// в данном файл произвожу замену версии чтобы обновлялось на сервере
// так же для удобства меняю подключения чтобы можно было дебажить на локалке
    $versus = "?v1.3.8";

    // подключение на BEGET
/*
    const DB_NAME = 'd94955f9_chat';
    const DB_USER = 'd94955f9_chat';
    const DB_PASS = 'd94955f9_pass';
    const DB_HOST = 'localhost';
*/
    // ПОДКЛЮЧЕНИЕ НА LOCALHOST


    const DB_NAME = 'homechat_db';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

  
?>
<?php

    $server = $_SERVER['HTTP_HOST'];

    if ($_POST['capcha'] != 56) {
        header("location: http://$server/chat.php");
        exit;
    }

    if (isset($_POST['subject'])) {
        if ($_POST['subject'] == 1) {
            $subject = 'Вопрос по чату';
        } elseif ($_POST['subject'] == 2) {
            $subject = 'Личный вопрос';
        } elseif ($_POST['subject'] == 3) {
            $subject = 'Благодарность';
        }
    } else {
        $subject = 'Вопрос по чату';
    }

    $to = "gelezyaka32@yandex.ru";
    $from = trim($_POST["email"]);

    $messageEmail = htmlspecialchars($_POST['message-email']);
    $messageEmail = urldecode($messageEmail);
    $messageEmail = trim($messageEmail);

    $headers = "From: $from" . "\r\n" .
        "Reply-To: $from" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $messageEmail, $headers)) {
        echo "Письмо отправлено";
        echo "<br><br>";
    } else {
        echo "Письмо не отправлено";
        echo "<br><br>";
    }

?>

    <a href=<?php echo "http://$server/chat.php"; ?>>вернуться в чат</a>
    <br><br>
    <a href=<?php echo "http://$server/review.php"; ?>>А давайка еще отправим сообщение</a>
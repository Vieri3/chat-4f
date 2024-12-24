<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rewiew</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <div class="container">
      
            <a class="btn btn-info my-3 d-grid" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/". "chat.php" ?>">Вернуться назад</a>

            <form action="script-sandmail.php" method="POST" class="d-flex flex-column align-items-center row">
                <select name="subject" id="" class="my-2">
                    <option disabled selected>Тема письма</option>
                    <option value="1">Вопрос по чату</option>
                    <option value="2">Личный вопрос</option>
                    <option value="3">Благодарность</option>
                </select>
                <input type="email" name="email" class="my-2" placeholder="Введите ваш Email" maxlength="50" required>
                <textarea name="message-email" id="" class="my-2" placeholder="Введите сообщение" maxlength="150" required></textarea>
                <img src="img/capcha.png" alt="7*8" style="width: 100px">
                <input type="number" name="capcha" class="my-2" placeholder="Введите ответ" maxlength="3" required>
                <input class="btn btn-success my-2" type="submit" value="Отправить письмо">
            </form>
    
    </div>
</body>
</html>
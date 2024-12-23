<?php
if(isset($_COOKIE['name'])){
    $server = $_SERVER['HTTP_HOST'];
    header("Location: http://$server/chat.php");
}
?>
<?php include 'versus.php'; ?>

<!DOCTYPE html>
 <html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-type" content="text/html">
        <title>HOME CHAT</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css<?php echo $versus; ?>">
        <link rel="shortcut icon" href="#">
        <link rel="icon" href="img/icon.png">
    </head>
    <body class="bg-secondary">
        
     <div class="container">
         <h1 class="h3 fw-bold text-warning text-center m-3">HOME CHAT</h1>
         <form action="script-cookie.php" method="POST">
             <div class="mb-3">
                 <label for="example-input-name-user" class="form-label mb-3 text-light">Введите ваше имя (max 15 символов)</label>
                 <input type="text" maxlength="15" class="form-control" aria-describedby="input-name-user" id="example-input-name-user" name="name">
                 <div id="input-name-user" class="form-text text-light">В дальнейшем ваше имя будет использовано в чате</div>
             </div>
             <button type="submit" class="btn btn-outline-warning w-100 py-2">Принять</button>
         </form>
    </div>
    </body>
 </html> 
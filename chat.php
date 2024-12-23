<?php
if(!isset($_COOKIE['name'])){
    $server = $_SERVER['HTTP_HOST'];
    header("Location: http://$server/index.php");
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
        <link rel="stylesheet" href="css/style-chat-light.css<?php echo $versus; ?>" id="theme">
        <link rel="icon" href="img/icon.png">
    </head>
 
    <body>

        <div class="container"> 

            <div class="m-3 d-flex align-items-center justify-content-around">
                <h1 class="h3 fw-bold text-center mb-0">HOME CHAT</h1>
                <div id="container-btn-option">
                    <a type="button" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/". "review.php" ?>" class="btn btn-info btn-sm btn-header">&#128296;</a>
                    <button type="button" id="btn-option" class="btn btn-danger btn-sm ms-3 btn-header" data-bs-toggle="modal" data-bs-target="#exampleModal">&#9881;</button> 
                </div>
            </div>

            <div class="container" id="container-chat">
                <!-- поле для вывода сообщений -->
                <div id="chat"></div>

                <div id="forma">
                    
                    <!-- поле вывода имени и предупредительных сообщений -->
                    <div class="my-3">
                        <span id="container-name-out" class="fw-bold"><?php echo $_COOKIE['name']; ?> : </span>
                        <span id="container-name-out-danger-message"></span>
                    </div>

                    <!-- Поле для сообщение и кнопка для отправки -->
                    <div class="my-3 input-group">

                        <!-- отправка звукового сообщения -->
                        <button type="button" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5"></path>
                                <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3"></path>
                            </svg>
                            <span class="visually-hidden">Button</span>
                        </button>
     
                        <!-- поле для ввода текстовых сообщений -->
                        <input type="text" class="form-control" id="message" placeholder="текст сообщения"/>

                        <!-- кнопка для отправки сообщений -->
                        <button type="button" id="btn-sending-message" class="btn btn-success rounded-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                            </svg>
                        </button>

                        <!-- форма для отправки файлов -->
                        <form enctype="multipart/form-data" id="upload-button">
                            <label class="input-file">
                                <input type="hidden" id="link-file-upload" value="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/". "temp/" ?>">
                                <input type="file" class="input-file" id="inp-add-file-server">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                                    </svg>
                                </span>
                            </label>
                        </form>

                    </div>
                   
                </div>
            </div>

        </div>


        <!-- Модальное окно НАСТРОЕК-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Натройки</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-check">
                            <label class="form-check-label" for="check-theme">
                                Включить темную тему?
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="check-theme">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <!--
                        <button type="button" class="btn btn-primary">Сохранить изменения</button>
                        -->
                    </div>

                </div>
            </div>
        </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js<?php echo $versus; ?>"></script>
   
    <audio src="" autoplay="autoplay"></audio>
    
 </body>
 </html> 
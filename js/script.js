
const userName = document.cookie.match(/name=(.+?)(;|$)/)[1];


$(document).ready(function () { // Start work jQuery--------------------->>>>>>>>>>>>>>>>>>>>

// ------------------------- работа кнопок в строке отправка сообщения -------------------------------  //

    $('#btn-sending-message').hide()

    $('#message').on('focus', () => {
        $('#upload-button').hide();
        $('#btn-sending-message').show();
    })

    $('#message').on('blur', () => {
        if ($('#message').val().length > 0) {
            $('#upload-button').hide();
            $('#btn-sending-message').show();
        } else {
            $('#btn-sending-message').hide();
            $('#upload-button').show();
        }
    })


// --------------------------------- вывод на экран сообщений чата -------------------------- //

    let MASS = new Array();

    setInterval(function () {
        $.ajax({
            url: "script-messages.php",
            method: "POST",
            dataType: "json",
            data: { update: 1 },
            success: function (data) {
                if (MASS.length == data.length) return;
                let start = MASS.length;
                MASS = data;
                let messages = $('#chat').html();
                for (i = start; i < MASS.length; i++) {
                    if(MASS[i].name == userName){
                        messages += `
                                <div class="row row-cols-auto ms-4 me-1 my-2 justify-content-end">
                                    <div class="col py-2 mes-my">
                                        <strong>${MASS[i].name}:</strong>
                                        ${MASS[i].message}
                                        <span class="container-one-message-out-date">${MASS[i].date}</span>
                                    </div>
                                </div>`;
                    }else{
                        messages += `
                                <div class="row row-cols-auto ms-1 me-4 my-2">
                                    <div class="col py-2 mes">
                                        <strong>${MASS[i].name}:</strong>
                                        ${MASS[i].message}
                                        <span class="container-one-message-out-date">${MASS[i].date}</span>
                                    </div>
                                </div>`;
                    }
                }
                $('#chat').html(messages);
                $('#chat').scrollTop(1000000);
                soundClick('ringtone')
            }
        })
    }, 1000);


// ---------------------------------------------- функция ввода сообщений ------------------------------------ // 
    
    $("#btn-sending-message").on("click", function () {
        let message = $('#message').val();
        if (message.match(/^[ ]+$/)) {
            $('#message').val('');
            $("#container-name-out-danger-message").html("сообщение пустое!");
            soundClick('error');
        } else {
            $.ajax({
                url: "script-messages.php",
                method: "POST",
                dataType: "json",
                data: { message: message },
            })
            $('#message').val('');
            $("#container-name-out-danger-message").html("");
            $('#btn-sending-message').hide();
            $('#upload-button').show();
        }
    })

    // Функция для загрузки файла на сервер
    $('#inp-add-file-server').change(function () {
        if (window.FormData === undefined) {
            alert("В вашем браузере FormData не поддерживается")
        } else {
            let formData = new FormData();
            $("#container-name-out-danger-message").html("");
            if($('#inp-add-file-server')[0].files[0].size > 5 * 1024* 1024){
                $("#container-name-out-danger-message").html("file > 5Mb");
                soundClick("error");
            }else{
                formData.append('file', $('#inp-add-file-server')[0].files[0]);
                $.ajax({
                    url: 'script-file-upload.php',
                    method: 'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: 'json',
                })
                let file = this.files[0].name;
                let messageLink = $('#link-file-upload').val()
                let messageLinkOut = `<a class="btn btn-sm btn-success" href="${messageLink + file}" download>${file}</a>`;
                $.ajax({
                    url: "script-messages.php",
                    method: "POST",
                    dataType: "json",
                    data: { message: messageLinkOut },
                })
                $("#container-name-out-danger-message").html("Файл успешно загружен!");
            }
        }
    })

// ---------------------------------------------- разное но полезное --------------------------------------------- //    

    // функция по нажатию Enter отправляется сообщение
    $('#message').on('keypress', function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) { 
            $("#btn-sending-message").click();
        }
    });


    // сохранение в локалхост браузера настроек темы  
    let checkboxTheme = document.getElementById("check-theme");

    if (localStorage.getItem('theme') == "true"){
        theme.setAttribute('href', 'css/style-chat-dark.css');
        checkboxTheme.checked = true;
    }

    checkboxTheme.onchange = function(){
        if(this.checked){
            localStorage.setItem('theme', true);
            theme.setAttribute('href', 'css/style-chat-dark.css');
        }else{
            localStorage.setItem('theme', false);
            theme.setAttribute('href', 'css/style-chat-light.css');
        }   
    }


    //Функция оповещения
    const soundClick = function (melodi) {
        var audio = new Audio(); // Создаём новый элемент Audio
        audio.src = `audio/${melodi}.mp3`; // Указываем путь к звуку "клика"
        audio.autoplay = true; // Автоматически запускаем
    }

}); // END work jQuery------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>






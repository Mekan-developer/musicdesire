$(document).ready(function () {

    $(document).on("contextmenu", function (e) {
        e.preventDefault();
    });
    // Получаем общее время песни в секундах из текста .total-time
    var totalTimeSeconds = timeStringToSeconds($('.total-time').text());

    // Устанавливаем значение ползунка равным общей длительности песни
    $('#customRange1').attr('max', totalTimeSeconds).val(0).trigger('input');

    // Устанавливаем обработчик события input для отслеживания изменений в ползунке
    $('#customRange1').on('input', function () {
        // Получаем текущее значение ползунка
        var currentValue = parseInt($(this).val());
        // Вычисляем количество минут и секунд
        var minutes = Math.floor(currentValue / 60);
        var seconds = currentValue % 60;
        // Форматируем значение
        var formattedTime = pad(minutes) + ':' + pad(seconds);
        // Устанавливаем текущее время
        $('.cur-time').text(formattedTime);
    });

    // Вызываем обработчик события input вручную для обновления .cur-time при загрузке страницы
    $('#customRange1').trigger('input');


    $('.burger-menu').click(function () {
        $('.menu').toggleClass('active');
        console.log('хоп нанайнай');
    });

    $('#cartModal').on('show.bs.modal', function (e) {
        // Закрываем модальное окно 1, если оно открыто
        $('#menuModal').modal('hide');
    });

    $('#fileInput').on('change', function () {
        var fileList = $('#fileList');
        fileList.empty(); // Очищаем список файлов перед добавлением новых

        // Добавляем каждый выбранный файл в список
        $.each(this.files, function (index, file) {
            var listItem = $('<li>').text(file.name);
            fileList.append(listItem);
        });

        // Получаем путь к выбранному файлу
        var filePath = $(this).val();

        // Сохраняем значение пути в переменной
        var inputValue = $(this).val();

        // Отображаем путь к файлу на странице
        $('#filePath').text(filePath);

        // Показываем значение атрибута value в консоли
        console.log(inputValue);
    });

    $('#trigger').hover(function () {

        $('#target').stop().fadeIn(function () {
        });
    }, function () {
        $('#target').stop().fadeOut(); // Плавное скрытие элемента, когда курсор мыши уходит
    });
    $('#regionTrigger').hover(function () {

        $('#region').stop().fadeIn(function () {
        });
    }, function () {
        $('#region').stop().fadeOut(); // Плавное скрытие элемента, когда курсор мыши уходит
    });
    $('#trigPerf').hover(function () {

        $('#dropdPerf').stop().fadeIn(function () {
        });
    }, function () {
        $('#dropdPerf').stop().fadeOut(); // Плавное скрытие элемента, когда курсор мыши уходит
    });

    $('.input-group input').focus(function () {
        $('.input-group').removeClass('input-active'); // Удаляем класс со всех input-group
        $(this).closest('.input-group').addClass('input-active'); // Добавляем класс только к текущему input-group
    });

    // $('#locationModal').modal({ backdrop: 'static', keyboard: false });
    $(".fav-button").hover(function () {

        $(this).css("background-image", "url('assets/images/hoverheart.png')").fadeIn(100);

    }, function () {

        $(this).css("background-image", "url('assets/images/heart.png')").fadeIn(100);

    });
    $(".cart-button").hover(function () {

        $(this).css("background-image", "url('assets/images/hovercart.png')").fadeIn(100);

    }, function () {

        $(this).css("background-image", "url('assets/images/cart.png')").fadeIn(100);

    });

});


// Функция для добавления ведущего нуля к числам меньше 10
function pad(val) {
    return val < 10 ? '0' + val : val;
}

// Функция для преобразования строки времени в секунды
function timeStringToSeconds(timeString) {
    var timeParts = timeString.split(':');
    var minutes = parseInt(timeParts[0]);
    var seconds = parseInt(timeParts[1]);
    return minutes * 60 + seconds;
}
$(document).ready(function () {
    // Инициализация слайдера reviews-slider
    $('.reviews-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: "<div class='left'><i class='fa-regular fa-chevron-left'></i></div>",
        nextArrow: "<div class='right'><i class='fa-regular fa-chevron-right'></i></div>",
        responsive: [
            {
                breakpoint: 1024, // Максимальная ширина экрана
                settings: {
                    // centerMode: true,
                    // centerPadding: '1px',
                    slidesToShow: 1, // Количество слайдов, отображаемых одновременно
                    slidesToScroll: 1, // Количество слайдов, прокручиваемых за один раз
                }
            },]
    });
    $('.nav-dots .dot').first().addClass('active');
    // Добавляем класс active к текущему слайду при инициализации
    $('.reviews-slider').on('init', function (event, slick) {
        var currentSlide = slick.currentSlide;
        $('.nav-dots .dot').removeClass('active'); // Удаляем класс active у всех точек
        $('.nav-dots .dot').eq(currentSlide).addClass('active'); // Добавляем класс active к текущей точке
    });

    // Обновляем класс active при смене слайда
    $('.reviews-slider').on('afterChange', function (event, slick, currentSlide) {
        $('.nav-dots .dot').removeClass('active'); // Удаляем класс active у всех точек
        $('.nav-dots .dot').eq(currentSlide).addClass('active'); // Добавляем класс active к текущей точке
    });
    // Обработчик клика по точкам навигации
    $('.nav-dots .dot').on('click', function (event) {
        event.preventDefault(); // Предотвращаем выполнение события по умолчанию
        var slideIndex = $(this).data('slick-index'); // Получаем индекс кликнутой точки
        $('.reviews-slider').slick('slickGoTo', slideIndex); // Переключаем слайдер
    });



    // Инициализация слайдера nav-dots
    $('.nav-dots').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.reviews-slider', // Указываем связанный слайдер
    });



    $('.performance-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<div></div>',
        nextArrow: '<i class="perf-arrow fa-thin fa-arrow-right-long"></i>',
        responsive: [
            {
                breakpoint: 1024, // Максимальная ширина экрана
                settings: {
                    // centerMode: true,
                    // centerPadding: '1px',
                    slidesToShow: 1, // Количество слайдов, отображаемых одновременно
                    slidesToScroll: 1, // Количество слайдов, прокручиваемых за один раз
                }
            },]
    });
});

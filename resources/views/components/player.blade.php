<style>
    #animatedDiv {
        overflow: hidden;
        transition: max-height 0.5s ease-out;
    }
</style>

<div class="custom-audio-player">
    <audio id="audioElement" hidden></audio>
    {{-- <button id="playPauseBtn">Воспроизвести</button> --}}
    {{-- <div class="progress">
        <div class="progress-bar" id="progressBar" style="width: 0%;"></div>
    </div> --}}
</div>
<div id="animatedDiv" style="overflow: hidden; max-height: 0; transition: max-height 0.5s ease-out;">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between song-menu">
            <div class="col-lg-3 col-sm-12">
                <p class="song-title" id="song-title">Название песни</p>
                <p style="opacity: 0" id="song-title-id"></p>
                {{-- <p class="author-title">Исполнитель</p> --}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/images/previous.png') }}" alt="" width="24" height="24">
                    <img src="{{ asset('assets/images/play-inlist.png') }}" alt="" width="36" height="36"
                        id="playPauseBtn">
                    <img src="{{ asset('assets/images/next.png') }}" alt="" width="24" height="24">
                </div>
                <div class="d-flex align-items-start">
                    <p class="cur-time" id="curtime">0:00</p>
                    <input type="range" class="duration-range" id="progressRange" min="0" max="100"
                        value="0">
                    <p class="total-time" id="totaltime">0:00</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="d-flex align-items-center justify-content-center actions">
                    {{-- <img src="{{ asset('assets/images/heart.png') }}" alt="" width="24" height="24" class="favorite"> --}}
                    <img src="{{ asset('assets/images/volume-high.png') }}" alt="" width="24" height="24"
                        class="volume">
                    <input type="range" class="volume-range" id="volumerange" min="0" max="1"
                        step="0.01" value="0.5">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trackSelector = document.getElementById('trackSelector');
        const audioElement = document.getElementById('audioElement');
        const playPauseBtn = document.getElementById('playPauseBtn');
        // const progressBar = document.getElementById('progressBar');
        const progressRange = document.getElementById('progressRange');
        const curtime = document.getElementById('curtime');
        const totaltime = document.getElementById('totaltime');
        const volumeRange = document.getElementById('volumerange');
        const songTitle = document.getElementById('song-title');
        const songTitleId = document.getElementById('song-title-id');
        let isPlaying = false;

        // Воспроизведение и пауза
        playPauseBtn.addEventListener('click', function() {
            var play_image = document.getElementById('play_image' + songTitleId.innerText);
            if (isPlaying) {
                audioElement.pause();
                playPauseBtn.src = "{{ asset('assets/images/play-inlist.png') }}";
                play_image.style.backgroundImage =
                            "url('{{ asset('assets/images/play.png') }}')";
            } else {
                audioElement.play();
                play_image.style.backgroundImage =
                            "url('{{ asset('assets/images/pause-outlined.png') }}')";
                playPauseBtn.src = "{{ asset('assets/images/pause.png') }}"
            }
        });

        audioElement.addEventListener('play', function() {
            isPlaying = true;
            playPauseBtn.textContent = 'Пауза';
            playPauseBtn.src = "{{ asset('assets/images/pause.png') }}"

        });

        audioElement.addEventListener('pause', function() {
            isPlaying = false;
            playPauseBtn.textContent = 'Воспроизвести';
            playPauseBtn.src = "{{ asset('assets/images/play-inlist.png') }}"

        });

        // Обновление индикатора прогресса
        audioElement.addEventListener('timeupdate', function() {
            const percentage = (audioElement.currentTime / audioElement.duration) * 100;
            // progressBar.style.width = percentage + '%';
            progressRange.value = percentage;
            curtime.innerText = secondsToHms(audioElement.currentTime);
            totaltime.innerText = secondsToHms(audioElement.duration);
        });

        // Установка источника аудио и воспроизведение выбранного трека
        document.querySelectorAll('.play-button').forEach(button => {
            button.addEventListener('click', function() {
                if (event.target.matches('.cart-button') || event.target.matches(
                    '.fav-button') || event.target.matches(
                    '.download')) {
                    return;
                }
                var div = document.getElementById("animatedDiv");
                if (div.style.maxHeight === "0px") {
                    div.style.maxHeight = "200px";
                }
                if (songTitleId.innerText == this.getAttribute('data-track-id')) {
                    var play_image = document.getElementById('play_image' + songTitleId
                        .innerText);
                    if (isPlaying) {
                        audioElement.pause();
                        playPauseBtn.src = "{{ asset('assets/images/play-inlist.png') }}";
                        play_image.style.backgroundImage =
                            "url('{{ asset('assets/images/play.png') }}')";
                    } else {
                        audioElement.play();
                        playPauseBtn.src = "{{ asset('assets/images/pause.png') }}";
                        play_image.style.backgroundImage =
                            "url('{{ asset('assets/images/pause-outlined.png') }}')";
                    }
                } else {
                    progressRange.value = 0;
                    audioElement.src = this.getAttribute('data-url');
                    document.querySelectorAll('[id^="play_image"]').forEach(function(i) {
                        i.style.backgroundImage =
                            "url('{{ asset('assets/images/play.png') }}')";
                    });
                    var play_image = document.getElementById('play_image' + this.getAttribute(
                        'data-track-id'));
                    play_image.style.backgroundImage = "url('" + this.getAttribute(
                        'data-track-pause-image') + "')";
                    songTitle.innerText = this.getAttribute('data-title');
                    songTitleId.innerText = this.getAttribute('data-track-id');
                    audioElement.play();
                }
            });
        });

        // Добавляем обработчики событий для наведения мыши на кнопки плея
        document.querySelectorAll('[id^="play_image"]').forEach(function(play_image) {
            play_image.addEventListener('mouseenter', handleMouseEnter);
            play_image.addEventListener('mouseleave', handleMouseLeave);
        });

        function handleMouseEnter(event) {
            var play_image = event.target;
            // Проверяем, выбран ли трек, если нет, меняем фоновое изображение на playiccust-hover.png
            if (play_image.style.backgroundImage.includes('play.png')) {
                play_image.style.backgroundImage = "url('{{ asset('assets/images/playiccust-hover.png') }}')";
            }
        }

        function handleMouseLeave(event) {
            var play_image = event.target;
            // Проверяем, выбран ли трек, если нет, возвращаем фоновое изображение к исходному
            if (play_image.style.backgroundImage.includes('playiccust-hover.png')) {
                play_image.style.backgroundImage = "url('{{ asset('assets/images/play.png') }}')";
            }
        }




        progressRange.addEventListener('input', function() {
            const value = this.value;
            const duration = audioElement.duration;
            audioElement.currentTime = (value * duration) / 100;
        });

        volumeRange.addEventListener('input', function() {
            audioElement.volume = this.value;
        });

        // trackSelector.addEventListener('change', function() {
        //     const selectedTrackUrl = this.value;
        //     audioElement.src = selectedTrackUrl;
        //     audioElement.play();
        //     // Обновите название трека в плеере, если необходимо
        //     // document.querySelector('.song-title').textContent = this.options[this.selectedIndex].text;
        // });
    });

    function secondsToHms(d) {
        d = Number(d);
        var h = Math.floor(d / 3600);
        var m = Math.floor(d % 3600 / 60);
        var s = Math.floor(d % 3600 % 60);

        return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s);
    }
</script>

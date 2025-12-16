import '@fancyapps/fancybox';

export class Video{
    init(){
        this.Video();
        this.Vimeo();
        this.Youtube();
    }

    Video() {
        $(document).ready(function () {
            // Play video and update UI when clicking anywhere inside .banner-block-img
            $(document).on('click', '.banner-block-img', function (e) {
                // Prevent triggering if pause button is clicked inside (so pause handler can work)
                if ($(e.target).closest('.pause-button').length) return;
                const $container = $(this);
                const video = $container.find('video').get(0);
                if (!video) return;
                // Pause all other videos on page (optional)
                $('video').each(function () {
                    if (this !== video) {
                        this.pause();
                        const $otherContainer = $(this).closest('.banner-block-img');
                        $otherContainer.find('.play-button').removeClass('d-none');
                        $otherContainer.find('.pause-button').addClass('d-none');
                        $otherContainer.find('.video-preview').removeClass('d-none');
                    }
                });
                video.play();
                // Update UI inside clicked container
                $container.find('.play-button').addClass('d-none');
                $container.find('.pause-button').removeClass('d-none');
                $container.find('.video-preview').addClass('d-none');
            });
            // Pause video when pause button clicked inside .banner-block-img
            $(document).on('click', '.pause-button', function (e) {
                e.stopPropagation(); // prevent triggering container click event
                const $container = $(this).closest('.banner-block-img');
                const video = $container.find('video').get(0);
                if (!video) return;
                video.pause();
                // Update UI
                $container.find('.play-button').removeClass('d-none');
                $container.find('.pause-button').addClass('d-none');
                $container.find('.video-preview').removeClass('d-none');
            });
            // Sync UI with manual video events (play/pause)
            $('video').on('play', function () {
                const $container = $(this).closest('.banner-block-img');
                $container.find('.play-button').addClass('d-none');
                $container.find('.pause-button').removeClass('d-none');
                $container.find('.video-preview').addClass('d-none');
            });
            $('video').on('pause', function () {
                const $container = $(this).closest('.banner-block-img');
                $container.find('.play-button').removeClass('d-none');
                $container.find('.pause-button').addClass('d-none');
                $container.find('.video-preview').removeClass('d-none');
            });
        });
        $(document).ready(function () {
            $(document).on('click', '.banner-block-img', function (e) {
                if ($(e.target).closest('.pause-button').length) return;
                const $container = $(this);
                const video = $container.find('video').get(0);
                if (!video) return;
                // Pause other videos
                $('video').each(function () {
                    if (this !== video) {
                        this.pause();
                        const $other = $(this).closest('.banner-block-img');
                        $other.removeClass('video-playing');
                        $other.find('.play-button').removeClass('d-none');
                        $other.find('.pause-button').addClass('d-none');
                        $other.find('.video-preview').removeClass('d-none');
                    }
                });
                video.play();
                $container.addClass('video-playing');
                $container.find('.play-button').addClass('d-none');
                $container.find('.video-preview').addClass('d-none');
                $container.find('.pause-button').removeClass('d-none').css('opacity', 0); // hidden by default, shown by CSS hover
            });
            $(document).on('click', '.pause-button', function (e) {
                e.stopPropagation();
                const $container = $(this).closest('.banner-block-img');
                const video = $container.find('video').get(0);
                if (!video) return;
                video.pause();
                $container.removeClass('video-playing');
                $container.find('.play-button').removeClass('d-none');
                $container.find('.pause-button').addClass('d-none').css('opacity', 1);
                $container.find('.video-preview').removeClass('d-none');
            });
            $('video').on('play', function () {
                const $container = $(this).closest('.banner-block-img');
                $container.addClass('video-playing');
                $container.find('.play-button').addClass('d-none');
                $container.find('.video-preview').addClass('d-none');
                $container.find('.pause-button').removeClass('d-none').css('opacity', 0);
            });
            $('video').on('pause', function () {
                const $container = $(this).closest('.banner-block-img');
                $container.removeClass('video-playing');
                $container.find('.play-button').removeClass('d-none');
                $container.find('.pause-button').addClass('d-none').css('opacity', 1);
                $container.find('.video-preview').removeClass('d-none');
            });
        });
    }
    Vimeo() {
        document.querySelectorAll('.vimeo-video-iframe').forEach(container => {
            const playButton = container.querySelector('.play-vimeo-btn');
            const pauseButton = container.querySelector('.pause-vimeo-btn');
            const vimeoFrame = container.querySelector('.vimeo-frame');
            const coverImages = container.querySelector('.cover-images');
            const videoId = container.getAttribute('data-video-id');
            let iframe = null;
            const stopOtherVideos = () => {
                document.querySelectorAll('.vimeo-video-iframe').forEach(other => {
                    if (other !== container && other.querySelector('iframe')) {
                        const otherIframe = other.querySelector('iframe');
                        otherIframe.remove();
                        other.querySelector('.play-vimeo-btn').classList.remove('d-none');
                        other.querySelector('.pause-vimeo-btn').classList.add('d-none');
                        other.querySelector('.cover-images').classList.remove('d-none');
                    }
                });
            };
            playButton.addEventListener('click', () => {
                stopOtherVideos();
                if (!iframe) {
                    iframe = document.createElement('iframe');
                    iframe.src = `https://player.vimeo.com/video/${videoId}?autoplay=1&controls=0`;
                    iframe.frameBorder = 0;
                    iframe.allow = 'autoplay;';
                    iframe.allowFullscreen = true;
                    vimeoFrame.appendChild(iframe);
                    playButton.classList.add('d-none');
                    coverImages.classList.add('d-none');
                    pauseButton.classList.remove('d-none');
                }
            });
            pauseButton.addEventListener('click', () => {
                if (iframe) {
                    iframe.remove();
                    iframe = null;
                    playButton.classList.remove('d-none');
                    pauseButton.classList.add('d-none');
                    coverImages.classList.remove('d-none');
                }
            });
            container.addEventListener('mouseleave', () => {
                if (iframe) {
                    iframe.remove();
                    iframe = null;
                    playButton.classList.remove('d-none');
                    pauseButton.classList.add('d-none');
                    coverImages.classList.remove('d-none');
                }
            });
        });
    }
    Youtube() {
        let currentPlayer = null;
        let currentModule = null;
        function initYouTubeAPI() {
            if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
                const tag = document.createElement('script');
                tag.src = 'https://www.youtube.com/iframe_api';
                document.body.appendChild(tag);
                window.onYouTubeIframeAPIReady = setupPlayers;
            } else {
                setupPlayers();
            }
        }
        function setupPlayers() {
            document.querySelectorAll('.video').forEach(module => {
                if (!module.classList.contains('initialized')) {
                    createPlayer(module);
                    module.classList.add('initialized');
                }
            });
        }
        function createPlayer(module) {
            const placeholder = module.querySelector('.video-placeholder');
            const playBtn = module.querySelector('.play-iframe-btn');
            const pauseBtn = document.getElementById('modal-youtube-pause');
            const player = new YT.Player(placeholder, {
                videoId: module.dataset.videoId,
                playerVars: { controls: 0, rel: 0, modestbranding: 1, iv_load_policy: 3 },
                events: {
                    onStateChange(event) {
                        if (event.data === YT.PlayerState.ENDED) {
                            module.classList.remove('playing');
                            player.destroy();
                            placeholder.innerHTML = '';
                            createPlayer(module);
                        } else if (event.data === YT.PlayerState.PLAYING) {
                            if (currentPlayer && currentPlayer !== player) {
                                currentPlayer.pauseVideo();
                                if (currentModule) currentModule.classList.remove('playing');
                            }
                            currentPlayer = player;
                            currentModule = module;
                            module.classList.add('playing');
                        }
                    }
                }
            });
            playBtn?.addEventListener('click', () => {
                player.playVideo();
                playBtn.classList.add('d-none');
            });
            module.addEventListener('mouseleave', () => {
                if (player.getPlayerState() === YT.PlayerState.PLAYING) {
                    player.pauseVideo();
                    module.classList.remove('playing');
                    playBtn?.classList.remove('d-none');
                    if (currentPlayer === player) {
                        currentPlayer = null;
                        currentModule = null;
                    }
                }
            });
            pauseBtn?.addEventListener('click', () => {
                player.pauseVideo();
                module.classList.remove('playing');
                if (currentPlayer === player) {
                    currentPlayer = null;
                    currentModule = null;
                }
            });
        }
        initYouTubeAPI();
    }
}
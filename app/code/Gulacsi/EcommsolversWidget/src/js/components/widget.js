export const videoWidget = {
    // Get elems
    videoEl: null,
    playButton: null,
    muteButton: null,

    init() {
        this.videoEl = document.getElementById('ecommsolvers-video-widget-test');
        this.playButton = document.getElementById('play-pause-video');
        this.muteButton = document.getElementById('mute-unmute-video');

        if (this.videoEl) {
            // Autoplay on page load
            this.videoEl.play();

            // Events to control the video
            this.videoEl.addEventListener('click', () => {
                this.togglePlayVideo();
            });
        }

        if (this.playButton) {
            this.playButton.addEventListener('click', () => {
                this.togglePlayVideo();
            });
        }


        if (this.muteButton) {
            this.muteButton.addEventListener('click', () => {
                this.toggleMute();
            });
        }

    },


    /* (UN)MUTE */
    toggleMute() {
        if (this.videoEl.muted) {
            // Unmute icon
            this.muteButton.style.setProperty("--content-mute", "'\\ea27'");
            this.muteButton.title = 'Mute';
        } else {
            // Mute icon
            this.muteButton.style.setProperty("--content-mute", "'\\ea2a'");
            this.muteButton.title = 'Unmute';
        }

        this.videoEl.muted = !this.videoEl.muted;
    },


    /* PLAY/PAUSE */
    togglePlayVideo() {
        if (this.videoEl.paused) {
            this.videoEl.play();

            // Show pause icon (on hover/focus)
            this.playButton.style.setProperty("--content-play", "'\\ea16'");
            this.playButton.title = 'Pause';
            this.playButton.style.visibility = 'hidden';

        } else {
            this.videoEl.pause();

            // Show play icon
            this.playButton.style.setProperty("--content-play", "'\\ea15'");
            this.playButton.title = 'Play';
            this.playButton.style.visibility = 'visible';
        }

    }

};

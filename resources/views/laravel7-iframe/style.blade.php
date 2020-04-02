<style>
    /**
 * Audio controls
 */
 
.audio-player {
    height: 50px;
    min-width: 300px;
    max-width: 500px;
    margin: 0 auto;
    background-color: #2b1e47;
    border-radius: 8px;
    position: relative;
}
 
.audio-player * {
    height: 100%;
    color: #ffffff;
    position: absolute;
}
 
.audio-player .controls.button {
    background: transparent;
    left: 10px;
    top: -2px;
}
 
.audio-player .play {
    color: #ffffff;
    background-color: #2b1e47;
    border: none;
    font-size: 20px;
}
 
.audio-player .play {
    left: 0;
    background:transparent;
}
 
.audio-player .play:after {
    content: '▶';
}
 
.audio-player .progress {
    left: 55px;
    width: 55%;
}
 
.audio-player .volume {
    right: 10px;
    width: 19%;
}
 
 
/**
 * Progress bar customisation
 */
 
.custom-progress {
    -webkit-appearance: none;
    -moz-appearance: none;
     appearance: none;
 
    /* Outer bar */
    border: none;
    border-radius: 5px;
    height: 10px;
    margin: 20px 0px 30px;
}
 
/**
 * Progress bar - Webkit
 */
 
/* Outer bar */
.custom-progress::-webkit-progress-bar {
    border-radius: 5px;
}
 
/* Inner bar */
.custom-progress::-webkit-progress-value {
    border-radius: 5px;
    background-color: #6f2591;
}
 
/**
 * Progress bar - Mozilla
 */
 
/* Inner bar */
.custom-progress::-moz-progress-bar {
    border-radius: 5px;
    background-color: #6f2591;
}
 
/**
 * Progress bar - IE/Edge
 */
 
 /* Inner bar */
.custom-progress::-ms-fill {
    border-radius: 5px;
    background-color: #6f2591;
}
</style>
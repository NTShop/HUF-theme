//this is where we run all the scripts in the site.
$(document).ready(function() {
    $(".fancybox").fancybox({
        'padding'         : 10,
        'fitToView'       : true,
        'openEffect'      : 'fade',
        'openSpeed'       : 'slow',
        helpers: {
            overlay: {
                speedIn: 0,
                speedOut: 300,
                opacity: 0.95,
                css: {
                    background:'#292725'
                }
            }
        }
    }); //end fancybox
}); //end document ready

$('video,audio').mediaelementplayer({
    // if the <video width> is not specified, this is the default
    defaultVideoWidth: 638,
    // if the <video height> is not specified, this is the default
    defaultVideoHeight: 359,
    // if set, overrides <video width>
    videoWidth: -1,
    // if set, overrides <video height>
    videoHeight: -1,
    // width of audio player
    audioWidth: 638,
    // height of audio player
    audioHeight: 50,
    // initial volume when the player starts
    startVolume: 0.7,
    // useful for <audio> player loops
    loop: false,
    // enables Flash and Silverlight to resize to content size
    enableAutosize: true,
    // the order of controls you want on the control bar (and other plugins below)
    features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
    // Hide controls when playing and mouse is not over the video
    alwaysShowControls: false,
    // force iPad's native controls
    iPadUseNativeControls: true,
    // force iPhone's native controls
    iPhoneUseNativeControls: true,
    // force Android's native controls
    AndroidUseNativeControls: false,
    // forces the hour marker (##:00:00)
    alwaysShowHours: false,
    // show framecount in timecode (##:00:00:00)
    showTimecodeFrameCount: false,
    // used when showTimecodeFrameCount is set to true
    framesPerSecond: 25,
    // turns keyboard support on and off for this instance
    enableKeyboard: true,
    // when this player starts, it will pause other players
    pauseOtherPlayers: true,
    // array of keyboard commands
    keyActions: []
});//end the mediaelementplayer
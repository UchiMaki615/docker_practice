<html>

<head>
    <meta charset="UTF-8">
    <title>ScreenCapture Test</title>
</head>

<body>
    <p>This example shows you the contents of the selected part of your display.
        Click the Start Capture button to begin.
    </p>
    <p>
        <button id="start">Start Capture</button>&nbsp;<button id="stop">Stop Capture</button>
    </p>
    <video id="video" autoplay width="100%" style="object-fit: contain;"></video>
    <br>
</body>

<script>
    const videoElem = document.getElementById("video");
    const startElem = document.getElementById("start");
    const stopElem = document.getElementById("stop");

    // Options for getDisplayMedia()
    const displayMediaOptions = {
        video: {
            cursor: "always"
        },
        audio: false
    };

    // Set event listeners for the start and stop buttons
    startElem.addEventListener("click", function (evt) {
        startCapture();
    }, false);

    stopElem.addEventListener("click", function (evt) {
        stopCapture();
    }, false);

    async function startCapture() {
        try {
            videoElem.srcObject = await navigator.mediaDevices.getDisplayMedia(displayMediaOptions);
        } catch (err) {
            console.error("Error: " + err);
        }
    }

    function stopCapture(evt) {
        let tracks = videoElem.srcObject.getTracks();

        tracks.forEach(track => track.stop());
        videoElem.srcObject = null;
    }
</script>

</html>

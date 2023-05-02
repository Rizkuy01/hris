const video = document.getElementById('video');
const startButton = document.getElementById('startButton');

// Add a click event listener to the "Start Camera" button
startButton.addEventListener('click', () => {
  // Request access to the user's camera
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      // Stream is the user's camera stream
      video.srcObject = stream;
    })
    .catch(err => {
      console.error('Error accessing camera: ', err);
    });
});

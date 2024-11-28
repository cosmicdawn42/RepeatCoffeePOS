// Live time function
function updateLiveTime() {
    const timeElement = document.getElementById('currentTime');
    const now = new Date();
    timeElement.textContent = now.toLocaleTimeString();
}

// Update every second
setInterval(updateLiveTime, 1000);

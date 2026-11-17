
<div class="announcement-bar">
    <div class="announcement-text">
        🎉 Promotion! Get 20% OFF on All Skincare Products
    </div>

    <div class="countdown">
        <span>Offer Ends In:</span>
        <div id="timer">00:00:00</div>
    </div>
</div>

<style>
.announcement-bar {
    background: #706a48;
    color: white;
    padding: 12px 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    font-weight: 500;
}

.announcement-text {
    flex: 1;
}

.countdown {
    display: flex;
    align-items: center;
    gap: 12px;
}

#timer {
    font-size: 17px;
    font-weight: bold;
    letter-spacing: 2px;
}

@media (max-width: 600px) {
    .announcement-bar {
        flex-direction: column;
        gap: 8px;
        text-align: center;
    }
}
</style>

<script>
let endTime = Date.now() + (24 * 60 * 60 * 1000);

function updateTimer() {
    let remaining = Math.max(0, endTime - Date.now());

    let hours = Math.floor(remaining / 3600000);
    let minutes = Math.floor((remaining % 3600000) / 60000);
    let seconds = Math.floor((remaining % 60000) / 1000);

    document.getElementById("timer").textContent =
        String(hours).padStart(2, '0') + ":" +
        String(minutes).padStart(2, '0') + ":" +
        String(seconds).padStart(2, '0');
}

updateTimer();
setInterval(updateTimer, 1000);
</script>

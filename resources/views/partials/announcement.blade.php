<div class="announcement-bar">
    <div class="announcement-inner container">
        <div class="announcement-text" data-i18n="announcementText">
            🎉 Promotion! Get 20% OFF on All Skincare Products
        </div>

        <div class="countdown">
            <span data-i18n="offerEndsIn">Offer Ends In:</span>
            <div id="timer">00:00:00</div>
        </div>
    </div>
</div>

<style>
.announcement-bar {
    background: #706a48;
    color: #ffffff;
    width: 100%;
    box-sizing: border-box;
    font-size: 13.5px;
    font-weight: 500;
}

.announcement-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    gap: 16px;
    box-sizing: border-box;
}

.announcement-text {
    flex: 1;
    min-width: 0;
}

.countdown {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

#timer {
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 2px;
    font-variant-numeric: tabular-nums;
}

@media (max-width: 768px) {
    .announcement-inner {
        flex-direction: column;
        gap: 6px;
        text-align: center;
        padding: 8px 0;
    }
    .announcement-text {
        font-size: 12px;
    }
    #timer {
        font-size: 14px;
        letter-spacing: 1.5px;
    }
}
</style>

<script>
if (!window.__announcementTimerInit) {
    window.__announcementTimerInit = true;
    (function() {
        var timerEl = document.getElementById("timer");
        if (!timerEl) return;
        var key = 'liva_announcement_end';
        var end;
        try {
            end = parseInt(localStorage.getItem(key), 10);
            if (!end || isNaN(end) || end <= Date.now()) {
                end = Date.now() + (24 * 60 * 60 * 1000);
                localStorage.setItem(key, end);
            }
        } catch(e) {
            end = Date.now() + (24 * 60 * 60 * 1000);
        }
        function tick() {
            var remaining = Math.max(0, end - Date.now());
            var hours = Math.floor(remaining / 3600000);
            var minutes = Math.floor((remaining % 3600000) / 60000);
            var seconds = Math.floor((remaining % 60000) / 1000);
            timerEl.textContent =
                String(hours).padStart(2, '0') + ":" +
                String(minutes).padStart(2, '0') + ":" +
                String(seconds).padStart(2, '0');
        }
        tick();
        setInterval(tick, 1000);
    })();
}
</script>

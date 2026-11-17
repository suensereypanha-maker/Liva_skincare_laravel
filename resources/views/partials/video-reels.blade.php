<!-- Product Video Reels -->
<section class="cat-product-videos container" aria-label="Product video reels">
    <div class="cat-video-grid">
        @php
            $productVideos = [
                [
                    'src' => 'media/videos/video-1.mp4',
                    'thumb' => 'media/videos/thumb1.jpg',
                ],
                [
                    'src' => 'media/videos/video-2.mp4',
                    'thumb' => 'media/videos/thumb2.jpg',
                ],
                [
                    'src' => 'media/videos/video-3.mp4',
                    'thumb' => 'media/videos/thumb3.jpg',
                ],
                [
                    'src' => 'media/videos/video-4.mp4',
                    'thumb' => 'media/videos/thumb4.jpg',
                ],
            ];
        @endphp
        @foreach ($productVideos as $vid)
            <div class="cat-video-card">
                <video src="{{ asset($vid['src']) }}" poster="{{ asset($vid['thumb']) }}"
                    playsinline webkit-playsinline loop muted autoplay preload="metadata"></video>
                <button type="button" class="cat-video-sound-toggle" aria-label="Toggle sound">
                    <svg class="sound-off-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                        <line x1="23" y1="9" x2="17" y2="15"></line>
                        <line x1="17" y1="9" x2="23" y2="15"></line>
                    </svg>
                    <svg class="sound-on-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                    </svg>
                </button>
                <div class="cat-video-play-indicator" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor">
                        <polygon points="6 4 20 12 6 20 6 4"></polygon>
                    </svg>
                </div>
            </div>
        @endforeach
    </div>
</section>


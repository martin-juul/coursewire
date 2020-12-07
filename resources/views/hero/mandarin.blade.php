<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <style>
        .hero-text {
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            font-size: 2.4rem;
            font-weight: bold;
            fill: white;
            overflow: visible;
        }
    </style>
    <defs>
        <linearGradient gradientUnits="objectBoundingBox" id="gradient" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="rgba(225, 77, 206, 1)"/>
            <stop offset="6.25%" stop-color="rgba(226.3125, 80.375, 195, 1)"/>
            <stop offset="12.5%" stop-color="rgba(227.625, 83.75, 184, 1)"/>
            <stop offset="18.75%" stop-color="rgba(228.9375, 87.125, 173, 1)"/>
            <stop offset="25%" stop-color="rgba(230.25, 90.5, 162, 1)"/>
            <stop offset="31.25%" stop-color="rgba(231.5625, 93.875, 151, 1)"/>
            <stop offset="37.5%" stop-color="rgba(232.875, 97.25, 140, 1)"/>
            <stop offset="43.75%" stop-color="rgba(234.1875, 100.625, 129, 1)"/>
            <stop offset="50%" stop-color="rgba(235.5, 104, 118, 1)"/>
            <stop offset="56.25%" stop-color="rgba(236.8125, 107.375, 107, 1)"/>
            <stop offset="62.5%" stop-color="rgba(238.125, 110.75, 96, 1)"/>
            <stop offset="68.75%" stop-color="rgba(239.4375, 114.125, 85, 1)"/>
            <stop offset="75%" stop-color="rgba(240.75, 117.5, 74, 1)"/>
            <stop offset="81.25%" stop-color="rgba(242.0625, 120.875, 63, 1)"/>
            <stop offset="87.5%" stop-color="rgba(243.375, 124.25, 52, 1)"/>
            <stop offset="93.75%" stop-color="rgba(244.6875, 127.625, 41, 1)"/>
        </linearGradient>
        <filter id="blendMode">
            <feBlend in="sourceGraphic" in2="FillPaint" mode="screen"/>
        </filter>
        <filter id="filter">
            <feBlend in="FillPaint" mode="hue"/>
        </filter>
    </defs>
    <g filter="url(#blendMode)">
        <rect x="0" y="0" width="100%" height="100%" fill="url(#gradient)"
              filter="url(#filter)"/>
    </g>
    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" class="hero-text">{{ $text }}</text>
</svg>

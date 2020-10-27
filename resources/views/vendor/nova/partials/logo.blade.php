<svg
    class="fill-current"
    width="{{ $width ?? '126' }}"
    height="{{ $height ?? '24' }}"
    viewBox="{{ $viewBox ?? '0 0 126 24' }}"
    xmlns="http://www.w3.org/2000/svg"
>
    <defs>
        <rect id="path-1" x="0" y="0" width="512" height="512"></rect>
        <path d="M146.141456,-5.90428975e-15 L365.858544,5.90428975e-15 C416.675112,-3.43056238e-15 435.102427,5.29105984 453.680205,15.2265641 C472.257983,25.1620684 486.837932,39.7420171 496.773436,58.3197949 C506.70894,76.8975727 512,95.3248882 512,146.141456 L512,365.858544 C512,416.675112 506.70894,435.102427 496.773436,453.680205 C486.837932,472.257983 472.257983,486.837932 453.680205,496.773436 C435.102427,506.70894 416.675112,512 365.858544,512 L146.141456,512 C95.3248882,512 76.8975727,506.70894 58.3197949,496.773436 C39.7420171,486.837932 25.1620684,472.257983 15.2265641,453.680205 C5.29105984,435.102427 2.28704159e-15,416.675112 -3.93619317e-15,365.858544 L3.93619317e-15,146.141456 C-2.28704159e-15,95.3248882 5.29105984,76.8975727 15.2265641,58.3197949 C25.1620684,39.7420171 39.7420171,25.1620684 58.3197949,15.2265641 C76.8975727,5.29105984 95.3248882,3.43056238e-15 146.141456,-5.90428975e-15 Z" id="path-3"></path>
        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-5">
            <stop stop-color="#FAD961" offset="0%"></stop>
            <stop stop-color="#F76B1C" offset="100%"></stop>
        </linearGradient>
        <path d="M255.5,403 C174.037999,403 108,336.962001 108,255.5 C108,174.037999 174.037999,108 255.5,108 C336.962001,108 403,174.037999 403,255.5 C403,336.962001 336.962001,403 255.5,403 Z M256,353 C309.571621,353 353,309.571621 353,256 C353,202.428379 309.571621,159 256,159 C202.428379,159 159,202.428379 159,256 C159,309.571621 202.428379,353 256,353 Z" id="path-6"></path>
        <filter x="-1.2%" y="-1.2%" width="102.4%" height="102.4%" filterUnits="objectBoundingBox" id="filter-7">
            <feGaussianBlur stdDeviation="3" in="SourceAlpha" result="shadowBlurInner1"></feGaussianBlur>
            <feOffset dx="0" dy="1" in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
            <feComposite in="shadowOffsetInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.3 0" type="matrix" in="shadowInnerInner1"></feColorMatrix>
        </filter>
    </defs>
    <g id="change-anything-in-this-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="icon">
            <mask id="mask-2" fill="white">
                <use xlink:href="#path-1"></use>
            </mask>
            <g id="Mask"></g>
            <g id="Rectangle" mask="url(#mask-2)">
                <mask id="mask-4" fill="white">
                    <use xlink:href="#path-3"></use>
                </mask>
                <use id="Mask" fill="#FAFAFA" xlink:href="#path-3"></use>
                <g id="Oval" fill-rule="nonzero" mask="url(#mask-4)">
                    <use fill="url(#linearGradient-5)" xlink:href="#path-6"></use>
                    <use fill="black" fill-opacity="1" filter="url(#filter-7)" xlink:href="#path-6"></use>
                </g>
            </g>
        </g>
        <text id="C-\\-W" font-family="BitstreamVeraSans-Roman, Bitstream Vera Sans" font-size="54" font-weight="normal">
            <tspan x="175" y="274" fill="#CCF37F">C </tspan>
            <tspan x="229.870117" y="274" fill="#3E4928">\\</tspan>
            <tspan x="266.256836" y="274" fill="#CCF37F"> W</tspan>
        </text>
    </g>
</svg>

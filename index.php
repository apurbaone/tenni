<?php
$launchDate = date('Y-m-d\TH:i:s', strtotime('+14 days'));
$brandName = 'Tenni';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?> | Coming Soon</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=DM+Serif+Display:ital@0;1&display=swap');

    :root {
      --bg: #f4f4ed;
      --ink: #12291f;
      --ink-soft: #627268;
      --accent: #d6fa61;
      --card: #fffef9;
      --card-border: rgba(18, 41, 31, 0.1);
      --shadow: 0 30px 90px rgba(28, 48, 35, 0.13);
    }

    * {
      box-sizing: border-box;
    }

    html,
    body {
      width: 100%;
      min-height: 100%;
      margin: 0;
      color: var(--ink);
      font-family: 'Space Grotesk', sans-serif;
    }

    body {
      min-height: 100vh;
      background:
        radial-gradient(ellipse at 12% 12%, rgba(255, 255, 255, 0.9), transparent 34%),
        radial-gradient(ellipse at 90% 90%, rgba(196, 218, 173, 0.4), transparent 35%),
        var(--bg);
      display: grid;
      place-items: center;
      overflow-x: hidden;
      position: relative;
      padding: clamp(18px, 5vw, 64px);
    }

    .shape {
      position: absolute;
      border-radius: 999px;
      filter: blur(1px);
      opacity: 0.55;
      animation: drift 8s ease-in-out infinite alternate;
      pointer-events: none;
    }

    .shape.one {
      width: 300px;
      height: 300px;
      background: rgba(214, 250, 97, 0.5);
      top: -120px;
      left: -70px;
    }

    .shape.two {
      width: 220px;
      height: 220px;
      background: rgba(111, 144, 115, 0.16);
      right: -70px;
      bottom: 8%;
      animation-delay: 1.2s;
    }

    .shape.three {
      width: 170px;
      height: 170px;
      background: rgba(214, 250, 97, 0.35);
      left: 14%;
      bottom: -65px;
      animation-delay: 2.2s;
    }

    .panel {
      width: min(1120px, 100%);
      background: var(--card);
      border: 1px solid var(--card-border);
      border-radius: 32px;
      box-shadow: var(--shadow);
      padding: clamp(28px, 5vw, 66px);
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
      align-items: center;
      gap: clamp(24px, 5vw, 70px);
      animation: rise 700ms ease-out both;
    }

    .content {
      min-width: 0;
    }

    .brand-row {
      display: flex;
      align-items: center;
      gap: 11px;
      margin-bottom: clamp(38px, 6vw, 72px);
      color: var(--ink);
      font-weight: 700;
      letter-spacing: 0.15em;
      font-size: 0.82rem;
    }

    .brand-mark {
      display: grid;
      width: 34px;
      height: 34px;
      place-items: center;
      border-radius: 50%;
      background: var(--ink);
      color: var(--accent);
      font-size: 0.9rem;
      letter-spacing: 0;
    }

    .eyebrow {
      display: flex;
      align-items: center;
      gap: 9px;
      letter-spacing: 0.13em;
      text-transform: uppercase;
      font-weight: 700;
      font-size: 12px;
      color: var(--ink-soft);
      margin: 0 0 20px;
      opacity: 0;
      animation: reveal 600ms ease-out 160ms forwards;
    }

    .eyebrow::before {
      content: '';
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #75a64b;
      box-shadow: 0 0 0 4px rgba(117, 166, 75, 0.14);
    }

    h1 {
      margin: 0;
      font-family: 'DM Serif Display', serif;
      font-size: clamp(3rem, 6.2vw, 5.5rem);
      line-height: 0.96;
      letter-spacing: -0.035em;
      max-width: 11ch;
      opacity: 0;
      animation: reveal 700ms ease-out 240ms forwards;
    }

    .highlight {
      color: #729345;
      font-style: italic;
    }

    .sub {
      margin: 22px 0 30px;
      max-width: 62ch;
      line-height: 1.6;
      font-size: clamp(1rem, 2.2vw, 1.12rem);
      color: var(--ink-soft);
      opacity: 0;
      animation: reveal 700ms ease-out 360ms forwards;
    }

    .countdown {
      display: grid;
      grid-template-columns: repeat(4, minmax(70px, 1fr));
      gap: 10px;
      margin-bottom: 26px;
      opacity: 0;
      animation: reveal 700ms ease-out 460ms forwards;
    }

    .time-box {
      border: 1px solid var(--card-border);
      border-radius: 14px;
      padding: 15px 10px 13px;
      background: #f6f7f1;
      transition: transform 180ms ease, background 180ms ease;
      text-align: center;
    }

    .time-box:hover {
      transform: translateY(-3px);
      background: #eff3e7;
    }

    .value {
      display: block;
      font-size: clamp(1.2rem, 3.6vw, 1.9rem);
      font-weight: 700;
      line-height: 1;
    }

    .label {
      display: block;
      margin-top: 8px;
      font-size: 0.76rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--ink-soft);
    }

    .notify {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      opacity: 0;
      animation: reveal 700ms ease-out 560ms forwards;
    }

    .notify input {
      flex: 1 1 250px;
      border: 1px solid rgba(18, 41, 31, 0.18);
      border-radius: 11px;
      padding: 13px 14px;
      font-size: 1rem;
      background: #fff;
      color: var(--ink);
      outline: 2px solid transparent;
      outline-offset: 2px;
      transition: border-color 180ms ease, outline-color 180ms ease;
    }

    .notify input:focus {
      border-color: #729345;
      outline-color: rgba(114, 147, 69, 0.22);
    }

    .notify button {
      border: none;
      background: var(--ink);
      color: var(--accent);
      border-radius: 11px;
      padding: 13px 20px;
      font-weight: 700;
      font-size: 0.98rem;
      cursor: pointer;
      transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease, color 180ms ease;
    }

    .notify button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(18, 41, 31, 0.2);
      background: #294938;
      color: #fff;
    }

    .notify button:focus-visible {
      outline: 3px solid #729345;
      outline-offset: 3px;
    }

    .foot {
      margin: 16px 0 0;
      font-size: 0.9rem;
      color: var(--ink-soft);
      opacity: 0;
      animation: reveal 700ms ease-out 640ms forwards;
    }

    .artwork {
      min-height: 440px;
      position: relative;
      display: grid;
      place-items: center;
      overflow: hidden;
      border-radius: 24px;
      isolation: isolate;
      background:
        linear-gradient(145deg, rgba(255, 255, 255, 0.1), transparent 48%),
        #173c2d;
      box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.12);
      animation: reveal 850ms ease-out 300ms both;
    }

    .court-line {
      position: absolute;
      border: 1px solid rgba(245, 249, 235, 0.28);
      border-radius: 50%;
      width: 125%;
      aspect-ratio: 1;
      transform: rotate(-24deg) scaleY(0.68);
    }

    .court-line::before,
    .court-line::after {
      content: '';
      position: absolute;
      inset: 17%;
      border: inherit;
      border-radius: inherit;
    }

    .court-line::after {
      inset: 37%;
    }

    .court-line.second {
      width: 155%;
      transform: rotate(32deg) scaleY(0.68);
      opacity: 0.6;
    }

    .ball {
      position: relative;
      z-index: 1;
      width: clamp(150px, 20vw, 230px);
      aspect-ratio: 1;
      border-radius: 50%;
      background:
        radial-gradient(circle at 32% 25%, rgba(255, 255, 255, 0.8), transparent 8%),
        radial-gradient(circle at 35% 30%, #f3ff9a, #c7f33e 52%, #9bc628 100%);
      box-shadow:
        inset -17px -22px 32px rgba(72, 105, 18, 0.22),
        inset 8px 9px 20px rgba(255, 255, 255, 0.56),
        0 34px 48px rgba(5, 23, 15, 0.38);
      transform: rotate(-20deg);
      animation: float 5s ease-in-out infinite;
    }

    .ball::before,
    .ball::after {
      content: '';
      position: absolute;
      top: -10%;
      left: 36%;
      width: 28%;
      height: 120%;
      border: 5px solid rgba(255, 255, 255, 0.88);
      border-top-color: transparent;
      border-bottom-color: transparent;
      border-radius: 50%;
      transform: rotate(24deg);
    }

    .ball::after {
      left: 36%;
      transform: rotate(156deg);
    }

    .artwork-note {
      position: absolute;
      right: 24px;
      bottom: 24px;
      z-index: 2;
      margin: 0;
      color: rgba(255, 255, 255, 0.78);
      font-size: 0.72rem;
      font-weight: 500;
      letter-spacing: 0.14em;
      text-transform: uppercase;
    }

    @keyframes rise {
      from {
        transform: translateY(24px) scale(0.99);
        opacity: 0;
      }
      to {
        transform: translateY(0) scale(1);
        opacity: 1;
      }
    }

    @keyframes reveal {
      from {
        transform: translateY(12px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes drift {
      from {
        transform: translateY(0px) translateX(0px);
      }
      to {
        transform: translateY(16px) translateX(9px);
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(-20deg);
      }
      50% {
        transform: translateY(-12px) rotate(-16deg);
      }
    }

    @media (max-width: 820px) {
      .panel {
        grid-template-columns: 1fr;
        max-width: 650px;
      }

      .brand-row {
        margin-bottom: 42px;
      }

      .artwork {
        min-height: 300px;
        grid-row: 1;
      }

      .ball {
        width: clamp(135px, 32vw, 190px);
      }
    }

    @media (max-width: 520px) {
      .panel {
        border-radius: 24px;
        padding: 25px 20px;
      }

      .artwork {
        min-height: 230px;
        border-radius: 18px;
      }

      .brand-row {
        margin-bottom: 36px;
      }

      .countdown {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px;
      }

      .notify {
        display: grid;
        grid-template-columns: 1fr;
      }

      .notify input,
      .notify button {
        width: 100%;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      *,
      *::before,
      *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>
  <span class="shape one"></span>
  <span class="shape two"></span>
  <span class="shape three"></span>

  <main class="panel">
    <div class="content">
      <div class="brand-row" aria-label="<?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?> brand">
        <span class="brand-mark" aria-hidden="true">T</span>
        <span><?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <p class="eyebrow">A new game is taking shape</p>
      <h1>
        Your next favorite <span class="highlight">court</span> is almost here.
      </h1>
      <p class="sub">
        We are building a fresh home for the game. Get ready for a better way to play, connect, and find your next match.
      </p>

      <section class="countdown" aria-label="Countdown to launch">
        <article class="time-box">
          <span class="value" id="days">00</span>
          <span class="label">Days</span>
        </article>
        <article class="time-box">
          <span class="value" id="hours">00</span>
          <span class="label">Hours</span>
        </article>
        <article class="time-box">
          <span class="value" id="minutes">00</span>
          <span class="label">Minutes</span>
        </article>
        <article class="time-box">
          <span class="value" id="seconds">00</span>
          <span class="label">Seconds</span>
        </article>
      </section>

      <form class="notify" method="post" action="#" onsubmit="return false;">
        <input type="email" placeholder="Enter your email for updates" aria-label="Email address" />
        <button type="submit">Notify Me <span aria-hidden="true">↗</span></button>
      </form>

      <p class="foot">Launching on <?php echo date('F j, Y', strtotime($launchDate)); ?></p>
    </div>
    <div class="artwork" aria-hidden="true">
      <span class="court-line"></span>
      <span class="court-line second"></span>
      <span class="ball"></span>
      <p class="artwork-note">Made for the love of the game</p>
    </div>
  </main>

  <script>
    const launchDate = new Date('<?php echo $launchDate; ?>').getTime();

    function pad(value) {
      return String(value).padStart(2, '0');
    }

    function tick() {
      const now = Date.now();
      const distance = Math.max(0, launchDate - now);

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('days').textContent = pad(days);
      document.getElementById('hours').textContent = pad(hours);
      document.getElementById('minutes').textContent = pad(minutes);
      document.getElementById('seconds').textContent = pad(seconds);
    }

    tick();
    setInterval(tick, 1000);
  </script>
</body>
</html>

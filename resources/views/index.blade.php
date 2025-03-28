<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HuLang - Developer Ecosystem</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: #fff;
            overflow-x: hidden;
            background: #181621;
            line-height: 1.6;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(135deg, #0d1b2a, #1b263b);
        }

        header {
            position: fixed;
            width: 100%;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        header h1 {
            font-size: 1.8em;
            font-weight: 600;
            color: #00ddeb;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        nav a {
            color: #e0e1dd;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #00ddeb;
        }

        /* Search Bar Styles */
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 70px;
            width: 314px;
        }

        .search-input {
            background-color: #010201;
            border: none;
            width: 301px;
            height: 56px;
            border-radius: 10px;
            color: white;
            padding-inline: 59px 20px;
            font-size: 18px;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: #c0b9c0;
        }

        .search-input:focus {
            outline: none;
            background: #1a1a1a;
        }

        /* Glowing Layers with Running Animation */
        .white, .border, .darkBorderBg, .glow {
            position: absolute;
            overflow: hidden;
            z-index: -1;
            border-radius: 12px;
            filter: blur(3px);
        }

        .white {
            max-height: 63px;
            max-width: 307px;
            border-radius: 10px;
            filter: blur(2px);
        }

        .white::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background-repeat: no-repeat;
            background-position: 0 0;
            filter: brightness(1.4);
            background-image: conic-gradient(
                rgba(0, 0, 0, 0) 0%,
                #00ddeb,
                rgba(0, 0, 0, 0) 8%,
                rgba(0, 0, 0, 0) 50%,
                #ff006e,
                rgba(0, 0, 0, 0) 58%
            );
            animation: rotate 4s linear infinite;
        }

        .border {
            max-height: 59px;
            max-width: 303px;
            border-radius: 11px;
            filter: blur(0.5px);
        }

        .border::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            filter: brightness(1.3);
            background-repeat: no-repeat;
            background-position: 0 0;
            background-image: conic-gradient(
                #1c191c,
                #00ddeb 5%,
                #1c191c 14%,
                #1c191c 50%,
                #ff006e 60%,
                #1c191c 64%
            );
            animation: rotate 4s linear infinite reverse;
        }

        .darkBorderBg {
            max-height: 65px;
            max-width: 312px;
        }

        .darkBorderBg::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background-repeat: no-repeat;
            background-position: 0 0;
            background-image: conic-gradient(
                rgba(0, 0, 0, 0),
                #0d1b2a,
                rgba(0, 0, 0, 0) 10%,
                rgba(0, 0, 0, 0) 50%,
                #1b263b,
                rgba(0, 0, 0, 0) 60%
            );
            animation: rotate 4s linear infinite;
        }

        .glow {
            max-height: 130px;
            max-width: 354px;
            filter: blur(30px);
            opacity: 0.4;
        }

        .glow:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 999px;
            height: 999px;
            background-repeat: no-repeat;
            background-position: 0 0;
            background-image: conic-gradient(
                #000,
                #00ddeb 5%,
                #000 38%,
                #000 50%,
                #ff006e 60%,
                #000 87%
            );
            animation: rotate 4s linear infinite reverse;
        }

        /* Animation Keyframe */
        @keyframes rotate {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Search Icon */
        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff; /* White color */
            /* color: #cf30aa; */ /* Uncomment for purple */
            font-size: 1.2em;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .search-input:focus + .search-icon {
            color: #ff006e; /* Pink on focus */
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        .hero h2 {
            font-size: 4em;
            font-weight: 700;
            background: linear-gradient(90deg, #00ddeb, #ff006e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.4em;
            max-width: 700px;
            color: #e0e1dd;
            margin-bottom: 40px;
        }

        .cta-button {
            padding: 15px 50px;
            background: rgb(200, 3, 75);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.4s ease;
        }

        .cta-button:hover {
            background: #00ddeb;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 221, 235, 0.5);
        }

        /* Features Section */
        .features {
            padding: 80px 50px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
        }

        .features h2 {
            font-size: 3em;
            text-align: center;
            color: #00ddeb;
            margin-bottom: 60px;
            animation: fadeIn 1s ease-out;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: fadeInUp 1s ease-out;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 221, 235, 0.3);
        }

        .feature-card h3 {
            font-size: 1.5em;
            color: #00ddeb;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #e0e1dd;
        }

        /* Footer */
        footer {
            padding: 30px;
            text-align: center;
            background: rgba(0, 0, 0, 0.9);
        }

        footer p {
            font-size: 1em;
            color: #e0e1dd;
        }

        footer a {
            color: #00ddeb;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color: rgb(0, 166, 255);
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Particle Background -->
    <div id="particles-js"></div>

    <!-- Header -->
    <header>
        <h1>HuLang</h1>
        <nav>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search...">
                <span class="search-icon">🔍</span>
                <div class="white"></div>
                <div class="border"></div>
                <div class="darkBorderBg"></div>
                <div class="glow"></div>
            </div>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Features</a>
            <a href="#">Join Us</a>
            <a href="{{ route('userLogin') }}">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to HuLang</h2>
            <p>Unleash your coding potential in a cutting-edge ecosystem built for developers.</p>
            <a href="{{ route('userLogin') }}" class="cta-button">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>What HuLang Brings</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <h3>Share Code</h3>
                <p>Showcase your work, collaborate, and inspire with seamless code sharing.</p>
            </div>
            <div class="feature-card">
                <h3>Solve Bugs</h3>
                <p>Tap into a global network to debug faster and smarter.</p>
            </div>
            <div class="feature-card">
                <h3>Explore Projects</h3>
                <p>Dive into a world of innovation—fork, build, and contribute.</p>
            </div>
            <div class="feature-card">
                <h3>Job Hub</h3>
                <p>Connect with startups or land freelance gigs effortlessly.</p>
            </div>
            <div class="feature-card">
                <h3>Networking</h3>
                <p>Grow your circle with devs who code, create, and conquer.</p>
            </div>
            <div class="feature-card">
                <h3>AI Resumes</h3>
                <p>Stand out with AI-crafted resumes tailored for success.</p>
            </div>
            <div class="feature-card">
                <h3>Roadmaps</h3>
                <p>Master skills with personalized learning paths.</p>
            </div>
            <div class="feature-card">
                <h3>Interview Prep</h3>
                <p>Ace your next gig with pro-level practice tools.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} HuLang. All rights reserved. | <a href="#">Privacy</a> | <a href="#">Terms</a></p>
    </footer>

    <!-- Particles.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#00ddeb' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ff006e', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 3, direction: 'none', random: false, straight: false, out_mode: 'out' }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    </script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HuLang - Developer Ecosystem</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: #fff;
            overflow-x: hidden;
            background: #181621;
            line-height: 1.6;
        }

        /* Particle Background Container */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(135deg, #0d1b2a, #1b263b);
        }

        /* Header */
        header {
            position: fixed;
            width: 100%;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        header h1 {
            font-size: 1.8em;
            font-weight: 600;
            color: #00ddeb;
        }

        nav a {
            color: #e0e1dd;
            margin-left: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #00ddeb;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        .hero h2 {
            font-size: 4em;
            font-weight: 700;
            background: linear-gradient(90deg, #00ddeb, #ff006e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.4em;
            max-width: 700px;
            color: #e0e1dd;
            margin-bottom: 40px;
        }

        .cta-button {
            padding: 15px 50px;
            background:rgb(200, 3, 75);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.4s ease;
        }

        .cta-button:hover {
            background: #00ddeb;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 221, 235, 0.5);
        }

        /* Features Section */
        .features {
            padding: 80px 50px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
        }

        .features h2 {
            font-size: 3em;
            text-align: center;
            color: #00ddeb;
            margin-bottom: 60px;
            animation: fadeIn 1s ease-out;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: fadeInUp 1s ease-out;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 221, 235, 0.3);
        }

        .feature-card h3 {
            font-size: 1.5em;
            color:#00ddeb;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #e0e1dd;
        }

        /* Footer */
        footer {
            padding: 30px;
            text-align: center;
            background: rgba(0, 0, 0, 0.9);
        }

        footer p {
            font-size: 1em;
            color: #e0e1dd;
        }

        footer a {
            color: #00ddeb;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color:rgb(0, 166, 255);
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    
    <div id="particles-js"></div>

   
    <header>
        <h1>HuLang</h1>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Features</a>
            <a href="#">Join Us</a>
            <a href="{{ route('userLogin') }}">Login</a>
        </nav>
    </header>

   
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to HuLang</h2>
            <p>Unleash your coding potential in a cutting-edge ecosystem built for developers.</p>
            <a href="{{ route('userLogin') }}" class="cta-button">Get Started</a>
        </div>
    </section>

    
    <section class="features">
        <h2>What HuLang Brings</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <h3>Share Code</h3>
                <p>Showcase your work, collaborate, and inspire with seamless code sharing.</p>
            </div>
            <div class="feature-card">
                <h3>Solve Bugs</h3>
                <p>Tap into a global network to debug faster and smarter.</p>
            </div>
            <div class="feature-card">
                <h3>Explore Projects</h3>
                <p>Dive into a world of innovation—fork, build, and contribute.</p>
            </div>
            <div class="feature-card">
                <h3>Job Hub</h3>
                <p>Connect with startups or land freelance gigs effortlessly.</p>
            </div>
            <div class="feature-card">
                <h3>Networking</h3>
                <p>Grow your circle with devs who code, create, and conquer.</p>
            </div>
            <div class="feature-card">
                <h3>AI Resumes</h3>
                <p>Stand out with AI-crafted resumes tailored for success.</p>
            </div>
            <div class="feature-card">
                <h3>Roadmaps</h3>
                <p>Master skills with personalized learning paths.</p>
            </div>
            <div class="feature-card">
                <h3>Interview Prep</h3>
                <p>Ace your next gig with pro-level practice tools.</p>
            </div>
        </div>
    </section>

   
    <footer>
        <p>© {{ date('Y') }} HuLang. All rights reserved. | <a href="#">Privacy</a> | <a href="#">Terms</a></p>
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#00ddeb' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ff006e', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 3, direction: 'none', random: false, straight: false, out_mode: 'out' }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    </script>
</body>
</html> -->
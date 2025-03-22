<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - HuLang</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #0d1b2a;
            color: #e0e1dd;
            line-height: 1.6;
            overflow-x: hidden;
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

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 15px 30px;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 1.8em;
            font-weight: 600;
            color: #00ddeb;
            text-decoration: none;
        }

        .navbar .search-bar {
            flex-grow: 1;
            max-width: 400px;
            margin: 0 20px;
        }

        .navbar .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.1);
            color: #e0e1dd;
            font-size: 1em;
            outline: none;
            transition: background 0.3s;
        }

        .navbar .search-bar input::placeholder {
            color: #a9a9a9;
        }

        .navbar .search-bar input:focus {
            background: rgba(255, 255, 255, 0.2);
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #e0e1dd;
            transition: color 0.3s;
        }

        .nav-item:hover {
            color: #00ddeb;
        }

        .nav-item img {
            width: 24px; /* Adjust size as needed */
            height: 24px;
            fill: #e0e1dd; /* SVG color, adjust if needed */
        }

        .nav-item:hover img {
            filter: brightness(0) saturate(100%) invert(77%) sepia(89%) saturate(1479%) hue-rotate(152deg) brightness(103%) contrast(101%); /* Matches #00ddeb */
        }

        .nav-item span {
            font-size: 0.9em;
            margin-top: 5px;
        }

        .profile-item {
            position: relative;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #00ddeb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            color: #0d1b2a;
            cursor: pointer;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            min-width: 150px;
        }

        .profile-item:hover .dropdown {
            display: block;
        }

        .dropdown a {
            display: block;
            padding: 10px 20px;
            color: #e0e1dd;
            text-decoration: none;
            transition: background 0.3s;
        }

        .dropdown a:hover {
            background: #00ddeb;
            color: #0d1b2a;
        }

        .dashboard {
            margin-top: 80px;
            padding: 30px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 30px;
        }

        .sidebar, .main-content, .right-bar {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        .sidebar h3, .main-content h3, .right-bar h3 {
            color: #00ddeb;
            margin-bottom: 20px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Particle Background -->
    <div id="particles-js"></div>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">HuLang</a>
        <div class="search-bar">
            <input type="text" placeholder="Search HuLang...">
        </div>
        <div class="nav-icons">
            <a href="{{ route('dashboard') }}" class="nav-item">
                <img src="{{ asset('icons/home.svg') }}" alt="Home Icon">
                <span>Home</span>
            </a>
            <a href="#" class="nav-item">
                <img src="{{ asset('icons/users.svg') }}" alt="My Connections Icon">
                <span>My Connections</span>
            </a>
            <a href="#" class="nav-item">
                <img src="{{ asset('icons/briefcase.svg') }}" alt="Jobs Icon">
                <span>Jobs</span>
            </a>
            <div class="nav-item profile-item">
                <div class="profile-pic">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <span>Me</span>
                <div class="dropdown">
                    <a href="#">View Profile</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <a href="#" class="nav-item">
                <img src="{{ asset('icons/grid.svg') }}" alt="Workspace Icon">
                <span>Workspace</span>
            </a>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <section class="dashboard">
        <div class="sidebar">
            <h1>Hi {{ auth()->user()->name }}</h1>
            <p>Quick stats, bio, or recent activity can go here.</p>
        </div>
        <div class="main-content">
            <h3>Activity Feed</h3>
            <p>Post updates, shared code, or community interactions here.</p>
        </div>
        <div class="right-bar">
            <h3>Suggestions</h3>
            <p>Job recommendations, connections, or trending projects.</p>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#00ddeb' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ff006e', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out' }
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
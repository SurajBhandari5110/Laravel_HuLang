<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - HuLang</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            width: 24px;
            height: 24px;
            fill: #e0e1dd;
        }
        .nav-item:hover img {
            filter: brightness(0) saturate(100%) invert(77%) sepia(89%) saturate(1479%) hue-rotate(152deg) brightness(103%) contrast(101%);
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
        .start-post-container {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 5px 15px;
            margin-bottom: 15px;
            transition: background 0.3s;
            cursor: pointer;
        }
        .start-post-container:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        .start-post-profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .start-post-input {
            flex-grow: 1;
            padding: 10px;
            color: #e0e1dd;
            font-size: 1em;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            opacity: 0.7;
        }
        .start-post-input:hover {
            opacity: 1;
        }
        .post-options {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .post-option-btn {
            background: none;
            border: none;
            color: #00ddeb;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: color 0.3s;
        }
        .post-option-btn:hover {
            color: #ffffff;
        }
        .post-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }
        .post-modal-content {
            background: #1b263b;
            width: 90%;
            max-width: 600px;
            border-radius: 15px;
            padding: 20px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        .post-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 15px;
        }
        .post-modal-header h3 {
            color: #00ddeb;
            margin: 0;
        }
        .post-modal-close {
            color: #00ddeb;
            font-size: 30px;
            cursor: pointer;
            transition: color 0.3s;
        }
        .post-modal-close:hover {
            color: #ffffff;
        }
        #post-editor {
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            color: #e0e1dd;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .post-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .post-media-options {
            display: flex;
            gap: 15px;
        }
        .post-media-options button {
            background: none;
            border: none;
            color: #00ddeb;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s;
        }
        .post-media-options button:hover {
            color: #ffffff;
        }
        .post-submit {
            background-color: #00ddeb;
            color: #0d1b2a;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .post-submit:hover {
            background-color: #ffffff;
        }
        .post-submit:disabled {
            background-color: #a9a9a9;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
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

    <section class="dashboard">
        <div class="profile sidebar">
            <h3>Profile Section</h3>
            <h1>Hi {{ auth()->user()->name }}</h1>
        </div>
        <div class="sidebar">
            <div class="create-post-section">
                <div class="start-post-container">
                    <img src="{{ asset('images/default-profile.png') }}" alt="Profile" class="start-post-profile-pic">
                    <div id="start-post-btn" class="start-post-input">
                        Start a post, what’s on your mind?
                    </div>
                </div>
                <div class="post-options">
                    <button class="post-option-btn"><i class="fas fa-image"></i> Photo</button>
                    <button class="post-option-btn"><i class="fas fa-video"></i> Video</button>
                    <button class="post-option-btn"><i class="fas fa-file"></i> Document</button>
                </div>
            </div>
        </div>
        <div class="main-content">
            <h3>Activity Feed</h3>
        </div>
        <div class="right-bar">
            <h3>Suggestions</h3>
        </div>
    </section>

    <div id="post-modal" class="post-modal">
        <div class="post-modal-content">
            <div class="post-modal-header">
                <h3>Create a Post</h3>
                <span id="post-modal-close" class="post-modal-close">×</span>
            </div>
            <div id="post-editor"></div>
            <div class="post-actions">
                <div class="post-media-options">
                    <button id="add-image-btn"><i class="fas fa-image"></i> Image</button>
                    <button id="add-video-btn"><i class="fas fa-video"></i> Video</button>
                    <button id="add-document-btn"><i class="fas fa-file"></i> Document</button>
                </div>
                <button class="post-submit" id="submit-post">Post</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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

        var quill = new Quill('#post-editor', {
            theme: 'snow',
            placeholder: 'Write something amazing...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image']
                ]
            }
        });

        const postModal = document.getElementById('post-modal');
        const startPostBtn = document.getElementById('start-post-btn');
        const closeModalBtn = document.getElementById('post-modal-close');
        const submitPostBtn = document.getElementById('submit-post');

        startPostBtn.addEventListener('click', () => {
            postModal.style.display = 'flex';
        });

        closeModalBtn.addEventListener('click', () => {
            postModal.style.display = 'none';
        });

        postModal.addEventListener('click', (event) => {
            if (event.target === postModal) {
                postModal.style.display = 'none';
            }
        });

        quill.on('text-change', () => {
            const content = quill.getText().trim();
            submitPostBtn.disabled = content.length === 0;
        });

        submitPostBtn.addEventListener('click', () => {
            const postContent = quill.root.innerHTML.trim();
            
            if (!postContent || postContent === '<p><br></p>') {
                alert('Please enter some content before posting.');
                return;
            }

            submitPostBtn.disabled = true;
            submitPostBtn.textContent = 'Posting...';

            fetch('{{ route("posts.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json' // Ensure server knows we expect JSON
                },
                body: JSON.stringify({ 
                    content: postContent 
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || `HTTP error! Status: ${response.status}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                postModal.style.display = 'none';
                quill.root.innerHTML = '';
                submitPostBtn.disabled = false;
                submitPostBtn.textContent = 'Post';
                alert('Post successfully created!');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to create post: ' + error.message);
                submitPostBtn.disabled = false;
                submitPostBtn.textContent = 'Post';
            });
        });

        document.getElementById('add-image-btn').addEventListener('click', () => {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = (e) => {
                const file = e.target.files[0];
                console.log('Selected file:', file);
                // Add media upload logic here if needed
            };
            input.click();
        });
    </script>
</body>
</html>

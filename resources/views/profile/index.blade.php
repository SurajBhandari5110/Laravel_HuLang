<!-- resources/views/profile/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #00ddeb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            color: #0d1b2a;
            cursor: pointer;
        }
        .profile-card { max-width: 900px; margin: 20px auto; }
        .cover-image-container {
            position: relative;
            height: 250px;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
            background: #f8f9fa;
        }
        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }
        .profile-image-container {
            position: relative;
            margin-top: -80px;
            z-index: 2;
        }
        .profile-image {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 5px solid white;
            background: white;
            object-fit: cover;
        }
        .editable:hover {
            background-color: #f8f9fa;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .section-card {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .edit-btn {
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        .edit-btn:hover {
            opacity: 1;
        }
        .profile-item {
            position: relative;
        }
        .profile-pic {
            width: 25px;
            height: 25px;
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
            top: 50px;
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
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo"><img src="{{ url('logo/white_logo.png')}}" alt="Logo" width="180"></a>
        <div class="search-bar">
            <input type="text" placeholder="Search HuLang...">
        </div>
        <div class="nav-icons">
            <a href="{{ route('dashboard') }}" class="nav-item">
                <img src="{{ asset('icons/home.png') }}" alt="Home Icon">
                <span>Home</span>
            </a>
            <a href="#" class="nav-item">
                <img src="{{ asset('icons/connect.png') }}" alt="My Connections Icon">
                <span>Connections</span>
            </a>
            <a href="#" class="nav-item">
                <img src="{{ asset('icons/jobs.png') }}" alt="Jobs Icon">
                <span>Jobs</span>
            </a>
            <div class="nav-item profile-item">
            <div class="profile-pic">{{ substr(auth()->user()->name, 0, 1) }}</div>
            <span>Me</span>
            <div class="dropdown">
            <a href="{{ route('profile') }}">View Profile</a>
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
                <img src="{{ asset('icons/workflow.png') }}" alt="Workspace Icon">
                <span>Workspace</span>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="profile-card">
            <!-- Cover Image -->
            <div class="cover-image-container">
                <img src="{{ $profile->cover_image ? Storage::url($profile->cover_image) : 'https://via.placeholder.com/900x250' }}"
                     class="cover-image"
                     id="coverImagePreview">
                <input type="file"
                       class="d-none"
                       id="coverImageInput"
                       accept="image/*"
                       onchange="updateImage('cover')">
                <button class="btn btn-light position-absolute top-0 end-0 m-2 edit-btn"
                        onclick="document.getElementById('coverImageInput').click()">
                    <i class="bi bi-camera"></i> Edit Cover
                </button>
            </div>

            <!-- Profile Image and Basic Info -->
            <div class="profile-image-container text-center">
                <img src="{{ $profile->profile_image ? Storage::url($profile->profile_image) : 'https://via.placeholder.com/150' }}"
                     class="profile-image"
                     id="profileImagePreview">
                <input type="file"
                       class="d-none"
                       id="profileImageInput"
                       accept="image/*"
                       onchange="updateImage('profile')">
                <button class="btn btn-sm btn-light mt-2 edit-btn"
                        onclick="document.getElementById('profileImageInput').click()">
                    <i class="bi bi-camera"></i> Edit Photo
                </button>

                <h2 class="mt-3 editable fw-bold"
                    contenteditable="true"
                    onblur="updateField('description', this.textContent)">
                    {{ $profile->description ?? 'Add your headline' }}
                </h2>
            </div>

            <!-- About Section -->
            <div class="card section-card">
                <div class="card-header bg-white border-0">
                    <h4 class="fw-bold">About</h4>
                </div>
                <div class="card-body">
                    <p class="editable"
                       contenteditable="true"
                       onblur="updateField('about', this.textContent)">
                        {{ $profile->about ?? 'Tell us about yourself' }}
                    </p>
                </div>
            </div>

            <!-- Experience Section -->
            <div class="card section-card">
                <div class="card-header bg-white border-0">
                    <h4 class="fw-bold">Experience</h4>
                    <button class="btn btn-sm btn-primary float-end"
                            onclick="addSection('experience')">
                        Add
                    </button>
                </div>
                <div class="card-body" id="experienceSection">
                    @php
                        $experiences = is_array($profile->experience) ? $profile->experience : [];
                    @endphp
                    @forelse($experiences as $exp)
                        <div class="experience-item mb-3">
                            <h5 class="editable fw-semibold"
                                contenteditable="true"
                                onblur="updateArrayField('experience', this)">
                                {{ $exp['title'] ?? 'Untitled Experience' }}
                            </h5>
                            <p class="editable"
                               contenteditable="true"
                               onblur="updateArrayField('experience', this)">
                                {{ $exp['description'] ?? 'Add description' }}
                            </p>
                        </div>
                    @empty
                        <p class="text-muted">No experience added yet</p>
                    @endforelse
                </div>
            </div>

            <!-- Education Section -->
            <div class="card section-card">
                <div class="card-header bg-white border-0">
                    <h4 class="fw-bold">Education</h4>
                    <button class="btn btn-sm btn-primary float-end"
                            onclick="addSection('education')">
                        Add
                    </button>
                </div>
                <div class="card-body" id="educationSection">
                    @php
                        $educations = is_array($profile->education) ? $profile->education : [];
                    @endphp
                    @forelse($educations as $edu)
                        <div class="education-item mb-3">
                            <h5 class="editable fw-semibold"
                                contenteditable="true"
                                onblur="updateArrayField('education', this)">
                                {{ $edu['title'] ?? 'Untitled Education' }}
                            </h5>
                            <p class="editable"
                               contenteditable="true"
                               onblur="updateArrayField('education', this)">
                                {{ $edu['description'] ?? 'Add description' }}
                            </p>
                        </div>
                    @empty
                        <p class="text-muted">No education added yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        async function updateField(field, value) {
            const formData = new FormData();
            formData.append(field, value);
            formData.append('_method', 'PUT');

            try {
                const response = await fetch('/profile', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                console.log('Update field response:', data);
                if (!data.success) {
                    alert('Failed to update ' + field + ': ' + data.message);
                }
            } catch (error) {
                console.error('Error updating field:', error);
                alert('Error updating ' + field + ': ' + error.message);
            }
        }

        async function updateImage(type) {
            const input = document.getElementById(`${type}ImageInput`);
            const preview = document.getElementById(`${type}ImagePreview`);
            const file = input.files[0];

            if (file) {
                const formData = new FormData();
                formData.append(`${type}_image`, file);
                formData.append('_method', 'PUT');

                try {
                    const response = await fetch('/profile', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });
                    const data = await response.json();
                    console.log('Update image response:', data);
                    if (data.success) {
                        const reader = new FileReader();
                        reader.onload = (e) => preview.src = e.target.result;
                        reader.readAsDataURL(file);
                    } else {
                        alert('Failed to upload ' + type + ' image: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error uploading image:', error);
                    alert('Error uploading ' + type + ' image: ' + error.message);
                }
            }
        }

        async function updateArrayField(type, element) {
            const items = document.querySelectorAll(`#${type}Section .${type}-item`);
            const data = Array.from(items).map(item => ({
                title: item.querySelector('h5').textContent,
                description: item.querySelector('p').textContent
            }));

            const formData = new FormData();
            formData.append(type, JSON.stringify(data));
            formData.append('_method', 'PUT');

            try {
                const response = await fetch('/profile', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const result = await response.json();
                console.log('Update array response:', result);
                if (!result.success) {
                    alert('Failed to update ' + type + ': ' + result.message);
                }
            } catch (error) {
                console.error('Error updating array:', error);
                alert('Error updating ' + type + ': ' + error.message);
            }
        }

        function addSection(type) {
            const section = document.getElementById(`${type}Section`);
            const item = document.createElement('div');
            item.className = `${type}-item mb-3`;
            item.innerHTML = `
                <h5 class="editable fw-semibold" contenteditable="true" onblur="updateArrayField('${type}', this)">New Title</h5>
                <p class="editable" contenteditable="true" onblur="updateArrayField('${type}', this)">New Description</p>
            `;
            section.appendChild(item);
            updateArrayField(type);
        }
    </script>
</body>
</html>
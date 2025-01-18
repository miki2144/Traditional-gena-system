@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="title">Welcome ባህላዊ ስፓርት Management System!</h1>
    
    <!-- Main Content -->
    <div class="image-slider">
        <button class="nav-button prev" onclick="navigate(-1)">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="slider-content">
            <div class="image-container">
                <img src="{{ asset('imags/pp.jpg') }}" alt="ገነ" class="main-image">
                <div class="label">ገነ</div>
            </div>
        </div>
        <button class="nav-button next" onclick="navigate(1)">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>

<script>
    let currentIndex = 0;
    const images = [
        {src: '{{ asset('imags/bg.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/pp.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/a.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/b.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/c.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/d.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/f.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/g.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/p1.jpg') }}', label: 'ገነ'},
        {src: '{{ asset('imags/f.jpg') }}', label: 'ገነ'}
    ];

    function navigate(direction) {
        currentIndex += direction;

        if (currentIndex < 0) {
            currentIndex = images.length - 1; // Loop back to the last image
        } else if (currentIndex >= images.length) {
            currentIndex = 0; // Loop back to the first image
        }

        updateSlider();
    }

    function updateSlider() {
        const imgElement = document.querySelector('.slider-content .main-image');
        const labelElement = document.querySelector('.slider-content .label');

        imgElement.src = images[currentIndex].src;
        labelElement.innerText = images[currentIndex].label;
    }

    // Automatically change image every 3 seconds
    setInterval(() => {
        navigate(1);
    }, 3000);
</script>

<style>
    .container {
        margin: 0.1; /* Remove margin from the container */
        padding: 10px; /* Optional padding */
    }

    .title {
        margin: 0; /* Remove margin from title */
        text-align: center; /* Center text */
        font-size: 2rem; /* Adjust font size */
        font-weight: bold;
    }
    .title:hover {
            color: red; /* Change color to red on hover */
        }
    .image-slider {
        display: flex;
        align-items: center; /* Center items vertically */
        position: relative;
        width: 100%;
        height: 300px;
        margin: 0; /* Remove margin */
    }

    .slider-content {
        display: flex;
        align-items: center; /* Center items vertically */
        justify-content: center; /* Center items horizontally */
        position: relative;
        width: 100%; /* Full width */
        height: 100%;
    }

    .image-container {
        position: relative;
        width: auto; /* Allow width to adjust based on image */
        height: 100%; /* Full height */
        overflow: hidden;
        display: flex;
        justify-content: center; /* Center image horizontally */
        align-items: center; /* Center image vertically */
    }

    .main-image {
        width: auto; /* Maintain aspect ratio */
        height: 100%; /* Full height */
        object-fit: cover; /* Ensure the image covers the container without distortion */
        transition: transform 0.5s ease; /* Smooth zoom effect */
    }

    .main-image:hover {
        transform: scale(1.1); /* Zoom in effect on hover */
    }

    .nav-button {
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        color: white;
        font-size: 1.5rem;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100;
    }

    .nav-button.prev {
        left: 10px;
    }

    .nav-button.next {
        right: 10px;
    }

    .label {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        font-weight: bold;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 5px 10px;
        border-radius: 5px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .nav-button {
            font-size: 1.2rem; /* Smaller buttons on mobile */
            padding: 8px; /* Adjust padding */
        }

        .label {
            font-size: 0.9rem; /* Adjust label font size */
            padding: 4px 8px; /* Adjust label padding */
        }
    }
</style>
@endsection
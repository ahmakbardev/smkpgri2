@extends('layouts.layout')

@section('content')
    <div id="hero" class="relative w-full h-[60vh] mt-5 mx-auto overflow-hidden group">
        <!-- Carousel Container -->
        <div class="carousel relative w-[90vw] overflow-hidden rounded-lg h-full mx-auto">
            <!-- Slide Items -->

            <div class="slides flex transition-transform h-full duration-700 ease-in-out" id="carouselSlides">
                <!-- Slide 1 -->
                <div class="w-full h-full flex items-end justify-start bg-blue-400 relative flex-shrink-0">
                    <img src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg"
                        class="w-full h-full object-cover absolute top-0 left-0 transition-transform duration-700 ease-in-out transform scale-100"
                        alt="">
                    <!-- Div Black Top -->
                    {{-- <div
                        class="bg-gradient-to-b from-black/90 via-transparent to-black/90 absolute top-0 left-0 w-full h-full z-[1] opacity-0 group-hover:opacity-100 transition-opacity duration-1000">
                    </div> --}}
                    <!-- Sub Headline and Readmore -->
                    <div class="text-left py-5 w-full max-w-[70%] relative bottom-10 left-4 border-t ml-5 transition-all duration-1000 z-[4] ease-in-out opacity-0 blur-sm text-white transform translate-y-[7.5rem] scale-75 group-hover:translate-y-0 group-hover:opacity-100"
                        id="headline1">
                        <h1 class="text-5xl font-bold mb-4">Slide 1: Welcome to Our Service</h1>
                        <p class="text-lg mb-4">Experience the best service with smooth transitions</p>
                        <a href="#"
                            class="hover:bg-white hover:text-black py-2 px-4 border rounded opacity-0 translate-y-full transition-all duration-500 ease-in-out group-hover:translate-y-0 group-hover:opacity-100">
                            Read More
                        </a>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="w-full h-full flex items-end justify-start bg-green-400 relative flex-shrink-0">
                    <img src="https://buffer.com/cdn-cgi/image/w=1000,fit=contain,q=90,f=auto/library/content/images/size/w1200/2023/10/free-images.jpg"
                        class="w-full h-full object-cover absolute top-0 left-0 transition-transform duration-700 ease-in-out transform scale-100"
                        alt="">
                    {{-- <img src="{{ asset('assets/images/vector/Vector 9.png') }}" class="absolute bottom-0 z-[2]"
                        alt="Vector 9">
                    <img src="{{ asset('assets/images/vector/Vector 8.png') }}" class="absolute bottom-0 z-[2]"
                        alt="Vector 8"> --}}
                    <!-- Div Black Top -->
                    {{-- <div
                        class="bg-gradient-to-b from-black/90 via-transparent to-black/90 absolute top-0 left-0 w-full h-full z-[1] opacity-0 group-hover:opacity-100 transition-opacity duration-1000">
                    </div> --}}
                    <!-- Sub Headline and Readmore -->
                    <div class="text-left py-5 w-full max-w-[70%] relative bottom-10 left-4 border-t ml-5 transition-all duration-1000 z-[4] ease-in-out opacity-0 blur-sm text-white transform translate-y-[7.5rem] scale-75 group-hover:translate-y-0 group-hover:opacity-100"
                        id="headline2">
                        <h1 class="text-5xl font-bold mb-4">Slide 1: Welcome to Our Service</h1>
                        <p class="text-lg mb-4">Experience the best service with smooth transitions</p>
                        <a href="#"
                            class="hover:bg-white hover:text-black py-2 px-4 border rounded opacity-0 translate-y-full transition-all duration-500 ease-in-out group-hover:translate-y-0 group-hover:opacity-100">
                            Read More
                        </a>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="w-full h-full flex items-end justify-start bg-red-400 relative flex-shrink-0">
                    <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                        class="w-full h-full object-cover absolute top-0 left-0 transition-transform duration-700 ease-in-out transform scale-100"
                        alt="">
                    {{-- <img src="{{ asset('assets/images/vector/Vector 9.png') }}" class="absolute bottom-0 z-[2]"
                        alt="Vector 9">
                    <img src="{{ asset('assets/images/vector/Vector 8.png') }}" class="absolute bottom-0 z-[2]"
                        alt="Vector 8"> --}}
                    <!-- Div Black Top -->
                    {{-- <div
                        class="bg-gradient-to-b from-black/90 via-transparent to-black/90 absolute top-0 left-0 w-full h-full z-[1] opacity-0 group-hover:opacity-100 transition-opacity duration-1000">
                    </div> --}}
                    <!-- Sub Headline and Readmore -->
                    <div class="text-left py-5 w-full max-w-[70%] relative bottom-10 left-4 border-t ml-5 transition-all duration-1000 z-[4] ease-in-out opacity-0 blur-sm text-white transform translate-y-[7.5rem] scale-75 group-hover:translate-y-0 group-hover:opacity-100"
                        id="headline3">
                        <h1 class="text-5xl font-bold mb-4">Slide 1: Welcome to Our Service</h1>
                        <p class="text-lg mb-4">Experience the best service with smooth transitions</p>
                        <a href="#"
                            class="hover:bg-white hover:text-black py-2 px-4 border rounded opacity-0 translate-y-full transition-all duration-500 ease-in-out group-hover:translate-y-0 group-hover:opacity-100">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            {{-- <img src="{{ asset('assets/images/vector/Vector 9.png') }}" class="absolute bottom-0 z-[2] w-full max-w-[60vw]"
                alt="Vector 9">
            <img src="{{ asset('assets/images/vector/Vector 8.png') }}" class="absolute bottom-0 z-[2] w-full max-w-[60vw]"
                alt="Vector 8"> --}}


            <!-- Indicator Bar -->
            <div class="absolute bottom-5 right-5 transform flex space-x-2 z-[3]">
                <div
                    class="progress-bar cursor-pointer h-2 w-5 bg-gray-300 transition-all ease-in-out duration-500 rounded-full">
                </div>
                <div
                    class="progress-bar cursor-pointer h-2 w-5 bg-gray-300 transition-all ease-in-out duration-500 rounded-full">
                </div>
                <div
                    class="progress-bar cursor-pointer h-2 w-5 bg-gray-300 transition-all ease-in-out duration-500 rounded-full">
                </div>
            </div>

            <!-- Previous & Next buttons (Hidden initially, show on hover) -->
            <button
                class="absolute top-1/2 left-5 transform -translate-y-1/2 z-[3] bg-white text-black rounded-full p-2 opacity-0 transition-all translate-x-7 group-hover:translate-x-0 duration-700 ease-in-out group-hover:opacity-100"
                id="prevSlide">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="absolute top-1/2 right-5 transform -translate-y-1/2 z-[3] bg-white text-black rounded-full p-2 opacity-0 transition-all -translate-x-7 group-hover:translate-x-0 duration-700 ease-in-out group-hover:opacity-100"
                id="nextSlide">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    <div id="mission" class="flex flex-col lg:flex-row items-center justify-center py-16">
        <!-- Left Side: Image -->
        <div class="lg:w-1/3 w-full flex justify-center lg:justify-start mb-8 lg:mb-0 relative" id="missionArea">
            <div class="flex flex-col">
                <img src="{{ asset('assets/images/person/buros_2.png') }}" alt="School Mission"
                    class="max-w-full h-auto rounded-lg">
                <!-- Switch Buttons -->
                <div class="flex justify-center mt-6">
                    <button id="switchToVisi"
                        class="bg-gray-200 text-gray-700 py-2 px-4 rounded-l-lg w-full hover:bg-blue-400 hover:text-white transition-all duration-300">Visi</button>
                    <button id="switchToMisi"
                        class="bg-blue-500 text-white py-2 px-4 rounded-r-lg w-full hover:bg-blue-400 hover:text-white transition-all duration-300">Misi</button>

                </div>
            </div>
            <img src="{{ asset('assets/images/vector/keren.png') }}"
                class="mission-element absolute top-24 left-12 w-44 h-fit object-contain" alt="Keren" id="keren"
                data-speed="10">
            <img src="{{ asset('assets/images/vector/bersahabat.png') }}"
                class="mission-element absolute top-1/2 -translate-y-1/2 right-3 w-56 h-fit object-contain" alt="Bersahabat"
                id="bersahabat" data-speed="15">
            <img src="{{ asset('assets/images/vector/beretika.png') }}"
                class="mission-element absolute bottom-10 left-5 w-44 h-fit object-contain" alt="Beretika" id="beretika"
                data-speed="20">
        </div>


        <!-- Right Side: Mission Carousel -->
        <div class="lg:w-1/2 w-full relative">
            <h1 class="text-5xl font-semibold text-center">Visi & Misi</h1>
            <div class="relative h-[450px] w-full overflow-y-hidden z-[1] px-5 py-3">
                <div class="h-full flex flex-col justify-center px-5 w-full items-center relative">
                    <!-- Visi Content -->
                    <div id="visiContent"
                        class="h-[450px] flex flex-col justify-center w-full overflow-y-hidden z-[1] px-5 py-3 absolute top-0">
                        <h2 class="text-3xl font-bold mb-4">Visi Kami</h2>
                        <p class="text-gray-600">Our vision is to become a world-class institution, recognized for its
                            excellence in innovation, leadership, and creativity.</p>
                    </div>
                    <!-- Misi Content -->
                    <div id="misiContent" class="h-full w-full overflow-y-hidden z-[1] px-5 py-3 absolute active"
                        style="opacity: 1;">

                        <div class="flex flex-col pt-5 pb-32">
                            <h2 class="text-3xl font-bold mb-4">Misi Kami</h2>
                            <p>Untuk mencapai visi dan membentuk Karakter Profil Pelajar Pancasila, maka SMK PGRI 2
                                Malang menetapkan misi sebagai berikut.</p>
                        </div>
                        <div class="carousel-mission flex flex-col items-center transition-transform duration-700 ease-in-out"
                            id="missionCarousel" style="transform: translateY(0);">

                            <!-- Mission Item 1 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 1</h3>
                                <p class="text-gray-600">We strive to provide excellent education that fosters creativity
                                    and
                                    innovation. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 2 (Main) -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-100 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 2</h3>
                                <p class="text-gray-600">Encouraging students to be responsible global citizens and
                                    community
                                    leaders. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 3 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 3</h3>
                                <p class="text-gray-600">Empowering students to achieve academic excellence and lifelong
                                    success. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 2 (Main) -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-100 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 2</h3>
                                <p class="text-gray-600">Encouraging students to be responsible global citizens and
                                    community
                                    leaders. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 3 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 3</h3>
                                <p class="text-gray-600">Empowering students to achieve academic excellence and lifelong
                                    success. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 1 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 1</h3>
                                <p class="text-gray-600">We strive to provide excellent education that fosters creativity
                                    and
                                    innovation. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 2 (Main) -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-100 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 2</h3>
                                <p class="text-gray-600">Encouraging students to be responsible global citizens and
                                    community
                                    leaders. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 3 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 3</h3>
                                <p class="text-gray-600">Empowering students to achieve academic excellence and lifelong
                                    success. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 2 (Main) -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-100 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 2</h3>
                                <p class="text-gray-600">Encouraging students to be responsible global citizens and
                                    community
                                    leaders. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                            <!-- Mission Item 3 -->
                            <div
                                class="carousel-item bg-white p-4 rounded-lg opacity-30 transition-all duration-700 ease-in-out w-full">
                                <h3 class="text-2xl font-semibold mb-2">Mission 3</h3>
                                <p class="text-gray-600">Empowering students to achieve academic excellence and lifelong
                                    success. We strive to provide excellent education that fosters creativity and
                                    innovation.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Add arrows to control the vertical carousel -->
            <div class="flex justify-center space-x-4 mt-4 z-[2]">
                <button id="prevMission" class="bg-white text-black rounded-full p-2 shadow hover:shadow-md opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </button>
                <button id="nextMission" class="bg-white text-black rounded-full p-2 shadow hover:shadow-md opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Articles Section -->
    <div id="articles" class="py-16 bg-gray-50 px-3">
        <div class="container mx-auto flex flex-col lg:flex-row">
            <!-- Main Content: Articles -->
            <div class="lg:w-3/4 w-full lg:pr-8">
                <!-- Section Title -->
                <h1 class="text-4xl font-semibold mb-8">Latest Articles</h1>

                <!-- Article Filters -->
                <div
                    class="flex flex-wrap justify-start space-x-2 text-sm space-y-2 lg:space-y-0 lg:text-base lg:space-x-4 mb-8">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">All</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Web Development</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Digital Marketing</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Business</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Technology</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Writing</button>
                </div>

                <!-- Articles Grid -->
                <div class="grid lg:grid-cols-3 grid-cols-2 gap-6" id="articles-container">
                    @for ($i = 0; $i < 12; $i++)
                        <!-- contoh 9 artikel -->
                        <!-- Article -->
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden group article hover:scale-[1.02] hover:ring hover:ring-blue-400 transition-all ease-in-out duration-100">
                            <a href="{{ route('detail-article') }}">
                                <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                                    alt="Article {{ $i + 1 }}" class="w-full h-36 lg:h-60 object-cover">
                            </a>
                            <div class="p-4">
                                <h2 class="text-sm lg:text-xl font-bold mb-2 text-nowrap truncate group-hover:text-wrap">
                                    Article
                                    {{ $i + 1 }}</h2>
                                <p class="text-gray-600 mb-4 text-xs lg:text-sm">This is a brief description of article
                                    {{ $i + 1 }}...
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-400 text-xs lg:text-sm">10 Sep 2024 · 5 min read</p>
                                    <a href="#" class="text-blue-500 hover:underline">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Buttons -->
                <div class="mt-6 text-center">
                    <button id="see-more"
                        class="px-4 py-2 bg-white border border-blue-500 w-full text-blue-500 transition-all ease-in-out hover:text-white rounded hover:bg-blue-600">Lihat
                        lebih</button>
                    <a href="/semua-artikel" id="see-all"
                        class="px-4 py-2 bg-white border border-blue-500 w-full text-blue-500 transition-all ease-in-out hover:text-white rounded hover:bg-blue-600 hidden">Lihat
                        semua artikel</a>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const articles = document.querySelectorAll('.article');
                        const seeMoreBtn = document.getElementById('see-more');
                        const seeAllLink = document.getElementById('see-all');
                        let visibleCount = 6;

                        // Hide all articles after the 6th one
                        articles.forEach((article, index) => {
                            if (index >= visibleCount) {
                                article.style.display = 'none';
                                article.style.opacity = '0';
                            }
                        });

                        // Function to animate the appearance of articles
                        function smoothShow(element) {
                            element.style.display = 'block';
                            const animation = element.animate([{
                                    opacity: 0,
                                    transform: 'translateY(20px)'
                                },
                                {
                                    opacity: 1,
                                    transform: 'translateY(0)'
                                }
                            ], {
                                duration: 300,
                                easing: 'ease-out'
                            });

                            animation.onfinish = () => {
                                element.style.opacity = '1';
                            };
                        }

                        // Event listener for 'Lihat lebih' button
                        seeMoreBtn.addEventListener('click', function() {
                            let hiddenArticles = Array.from(articles).filter(article => article.style.display ===
                                'none');
                            for (let i = 0; i < 6 && hiddenArticles[i]; i++) {
                                smoothShow(hiddenArticles[i]);
                            }

                            // If there are no more hidden articles, show 'Lihat semua artikel' and hide 'Lihat lebih'
                            if (hiddenArticles.length <= 6) {
                                seeMoreBtn.style.display = 'none';
                                seeAllLink.style.display = 'inline-block';
                            }
                        });
                    });
                </script>


            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 w-full h-fit sticky top-32 space-y-6">
                <!-- Card for Most Viewed Articles -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Artikel yang Sering Dilihat</h2>
                    <div class="gap-4 grid grid-cols-2">
                        <!-- Article Card 1 -->
                        <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
                            <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                                alt="Article 1" class="w-full h-20 object-cover">
                            <div class="p-2">
                                <h3 class="text-base font-semibold">Artikel 1</h3>
                                <p class="text-gray-600 text-xs text-nowrap truncate">Summary of Artikel 1 goes
                                    here...</p>
                                <p class="text-xs text-gray-500 font-semibold text-end mt-2">100 views</p>
                            </div>
                        </div>

                        <!-- Article Card 2 -->
                        <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
                            <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                                alt="Article 2" class="w-full h-20 object-cover">
                            <div class="p-2">
                                <h3 class="text-base font-semibold">Artikel 2</h3>
                                <p class="text-gray-600 text-xs text-nowrap truncate">Summary of Artikel 2 goes
                                    here...</p>
                                <p class="text-xs text-gray-500 font-semibold text-end mt-2">100 views</p>
                            </div>
                        </div>

                        <!-- Article Card 3 -->
                        <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
                            <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                                alt="Article 3" class="w-full h-20 object-cover">
                            <div class="p-2">
                                <h3 class="text-base font-semibold">Artikel 3</h3>
                                <p class="text-gray-600 text-xs text-nowrap truncate">Summary of Artikel 3 goes
                                    here...</p>
                                <p class="text-xs text-gray-500 font-semibold text-end mt-2">100 views</p>
                            </div>
                        </div>

                        <!-- Article Card 4 -->
                        <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
                            <img src="https://smkpgri2kotamalang.sch.id/media_library/albums/084b60e36c4a2e7dfe18e9563893963a.jpeg"
                                alt="Article 4" class="w-full h-20 object-cover">
                            <div class="p-2">
                                <h3 class="text-base font-semibold">Artikel 4</h3>
                                <p class="text-gray-600 text-xs text-nowrap truncate">Summary of Artikel 4 goes
                                    here...</p>
                                <p class="text-xs text-gray-500 font-semibold text-end mt-2">100 views</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List of Authors -->
                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h2 class="text-2xl font-bold mb-4">Penulis Artikel</h2>
                    <ul class="space-y-4">
                        <!-- Author 1 -->
                        <li class="flex items-center">
                            <img src="https://i.pravatar.cc/50?img=1" alt="Author 1" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="text-lg font-semibold">Author 1</h3>
                                <p class="text-gray-500 text-sm">Web Developer</p>
                            </div>
                        </li>

                        <!-- Author 2 -->
                        <li class="flex items-center">
                            <img src="https://i.pravatar.cc/50?img=2" alt="Author 2" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="text-lg font-semibold">Author 2</h3>
                                <p class="text-gray-500 text-sm">Digital Marketer</p>
                            </div>
                        </li>

                        <!-- Author 3 -->
                        <li class="flex items-center">
                            <img src="https://i.pravatar.cc/50?img=3" alt="Author 3" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="text-lg font-semibold">Author 3</h3>
                                <p class="text-gray-500 text-sm">Content Writer</p>
                            </div>
                        </li>

                        <!-- Author 4 -->
                        <li class="flex items-center">
                            <img src="https://i.pravatar.cc/50?img=4" alt="Author 4" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="text-lg font-semibold">Author 4</h3>
                                <p class="text-gray-500 text-sm">Customer Loyalty Expert</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>



    <!-- Script for Carousel Functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const missionCarousel = document.getElementById("missionCarousel");
            const carouselItems = missionCarousel.children;
            const nextButton = document.getElementById("nextMission");
            const prevButton = document.getElementById("prevMission");

            let currentIndex = 0; // Start with the first item
            let translateYPosition = 0;

            const updateCarousel = () => {
                const itemHeight = carouselItems[currentIndex]
                    .offsetHeight; // Get the height of the current item dynamically
                translateYPosition = -currentIndex * itemHeight;

                // Update transform to move items
                missionCarousel.style.transform = `translateY(${translateYPosition}px)`;

                // Update opacity and scale of items
                for (let i = 0; i < carouselItems.length; i++) {
                    if (i === currentIndex) {
                        // Add scale and opacity 100% for the main item (middle)
                        carouselItems[i].classList.add("opacity-100", "scale-100", "shadow", "shadow-lg");
                        carouselItems[i].classList.remove("opacity-30", "opacity-0", "scale-90");
                    } else if (i === currentIndex - 1 || i === currentIndex + 1) {
                        // For items above and below the main item, apply opacity 30% and remove scaling
                        carouselItems[i].classList.add("opacity-30", "scale-90");
                        carouselItems[i].classList.remove("opacity-100", "opacity-0", "scale-100", "shadow",
                            "shadow-lg");
                    } else {
                        // Hide the rest of the items with opacity 0 and normal scale
                        carouselItems[i].classList.add("opacity-0", "scale-90");
                        carouselItems[i].classList.remove("opacity-30", "opacity-100", "scale-100", "shadow",
                            "shadow-lg");
                    }
                }

                // Disable prev button if at the first item
                if (currentIndex === 0) {
                    prevButton.disabled = true;
                    prevButton.classList.add("opacity-50", "pointer-events-none");
                } else {
                    prevButton.disabled = false;
                    prevButton.classList.remove("opacity-50", "pointer-events-none");
                }

                // Disable next button if at the last item
                if (currentIndex === carouselItems.length - 1) {
                    nextButton.disabled = true;
                    nextButton.classList.add("opacity-50", "pointer-events-none");
                } else {
                    nextButton.disabled = false;
                    nextButton.classList.remove("opacity-50", "pointer-events-none");
                }
            };

            const nextMission = () => {
                if (currentIndex < carouselItems.length - 1) {
                    currentIndex++;
                    updateCarousel();
                }
            };

            const prevMission = () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            };

            nextButton.addEventListener("click", nextMission);
            prevButton.addEventListener("click", prevMission);

            // Initialize carousel
            updateCarousel();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const visiContent = document.getElementById('visiContent');
            const misiContent = document.getElementById('misiContent');
            const switchToVisi = document.getElementById('switchToVisi');
            const switchToMisi = document.getElementById('switchToMisi');
            const prevButton = document.getElementById('prevMission');
            const nextButton = document.getElementById('nextMission');

            const toggleMissionButtons = (show) => {
                if (show) {
                    prevButton.style.display = 'flex'; // Show the buttons
                    nextButton.style.display = 'flex';
                } else {
                    prevButton.style.display = 'none'; // Hide the buttons
                    nextButton.style.display = 'none';
                }
            };

            // Saat mengklik tombol "Visi"
            switchToVisi.addEventListener('click', () => {
                visiContent.classList.add('active');
                visiContent.style.opacity = '1'; // Menampilkan visi
                misiContent.classList.remove('active');
                misiContent.style.opacity = '0'; // Menyembunyikan misi

                // Ubah warna tombol saat active
                switchToVisi.classList.add('bg-blue-500', 'text-white');
                switchToVisi.classList.remove('bg-gray-200', 'text-gray-700');

                switchToMisi.classList.add('bg-gray-200', 'text-gray-700');
                switchToMisi.classList.remove('bg-blue-500', 'text-white');

                toggleMissionButtons(false); // Hide mission navigation buttons
            });

            // Saat mengklik tombol "Misi"
            switchToMisi.addEventListener('click', () => {
                misiContent.classList.add('active');
                misiContent.style.opacity = '1'; // Menampilkan misi
                visiContent.classList.remove('active');
                visiContent.style.opacity = '0'; // Menyembunyikan visi

                // Ubah warna tombol saat active
                switchToMisi.classList.add('bg-blue-500', 'text-white');
                switchToMisi.classList.remove('bg-gray-200', 'text-gray-700');

                switchToVisi.classList.add('bg-gray-200', 'text-gray-700');
                switchToVisi.classList.remove('bg-blue-500', 'text-white');

                toggleMissionButtons(true); // Show mission navigation buttons
            });

            // Initialize by hiding buttons if Visi is active by default
            if (visiContent.classList.contains('active')) {
                toggleMissionButtons(false); // Hide mission navigation buttons
            } else {
                toggleMissionButtons(true); // Show mission navigation buttons
            }
        });
    </script>


    <!-- Script for Carousel and Progress Bars -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.getElementById('carouselSlides');
            const progressBars = document.querySelectorAll('.progress-bar');
            const vector8 = document.querySelector("img[alt='Vector 8']");
            const vector9 = document.querySelector("img[alt='Vector 9']");
            const totalSlides = slides.children.length;
            let currentIndex = 0;
            let autoSlideInterval;

            const headlines = [
                document.getElementById('headline1'),
                document.getElementById('headline2'),
                document.getElementById('headline3')
            ];

            const setZIndexForHeadlines = () => {
                headlines.forEach((headline) => {
                    headline.style.zIndex = "5";
                });
                vector8.style.zIndex = "2";
                vector9.style.zIndex = "2";
            };

            const updateSlidePosition = () => {
                slides.style.transform = `translateX(-${currentIndex * 100}%)`;
                updateProgressBars();
                setTimeout(() => {
                    setZIndexForHeadlines();
                }, 700);
            };

            const updateHeadline = () => {
                headlines.forEach((headline, index) => {
                    if (index === currentIndex) {
                        headline.classList.remove('opacity-0', 'blur-sm', 'translate-y-20', 'scale-75');
                        headline.classList.add('opacity-100', 'blur-0', 'translate-y-0', 'scale-100');
                    } else {
                        headline.classList.add('opacity-0', 'blur-sm', 'translate-y-20', 'scale-75');
                        headline.classList.remove('opacity-100', 'blur-0', 'translate-y-0',
                            'scale-100');
                    }
                });
            };

            const updateProgressBars = () => {
                progressBars.forEach((bar, index) => {
                    bar.addEventListener('click', function() {
                        currentIndex = index;
                        updateSlidePosition();
                        updateHeadline();
                        resetAutoSlide();
                    });
                    if (index === currentIndex) {
                        bar.classList.add('bg-blue-500', 'w-14', 'scale-110', 'transform');
                        bar.classList.remove('bg-gray-300', 'w-5', 'scale-100');
                    } else {
                        bar.classList.add('bg-gray-300', 'w-5', 'scale-100', 'transform');
                        bar.classList.remove('bg-blue-500', 'w-14', 'scale-110');
                    }
                });
            };

            const nextSlide = () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlidePosition();
                updateHeadline();
                resetAutoSlide();
            };

            const prevSlide = () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlidePosition();
                updateHeadline();
                resetAutoSlide();
            };

            const startAutoSlide = () => {
                autoSlideInterval = setInterval(nextSlide, 5000);
            };

            const resetAutoSlide = () => {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            };

            document.getElementById('nextSlide').addEventListener('click', nextSlide);
            document.getElementById('prevSlide').addEventListener('click', prevSlide);

            startAutoSlide();
            updateHeadline();
            updateProgressBars();
            setZIndexForHeadlines();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const missionArea = document.getElementById("mission");
            const keren = document.getElementById("keren");
            const bersahabat = document.getElementById("bersahabat");
            const beretika = document.getElementById("beretika");

            missionArea.addEventListener("mousemove", function(e) {
                const rect = missionArea.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;

                // Gerakan untuk elemen "keren"
                const kerenOffsetX = (mouseX - rect.width / 2) / 20;
                const kerenOffsetY = (mouseY - rect.height / 2) / 20;
                keren.style.transform = `translate(${kerenOffsetX}px, ${kerenOffsetY}px)`;

                // Gerakan untuk elemen "bersahabat" dengan delay berbeda
                const bersahabatOffsetX = (mouseX - rect.width / 2) / 30;
                const bersahabatOffsetY = (mouseY - rect.height / 2) / 30;
                setTimeout(() => {
                    bersahabat.style.transform =
                        `translate(${bersahabatOffsetX}px, ${bersahabatOffsetY}px)`;
                }, 100); // 100ms delay

                // Gerakan untuk elemen "beretika" dengan arah sedikit berbeda dan delay
                const beretikaOffsetX = -(mouseX - rect.width / 2) / 25;
                const beretikaOffsetY = -(mouseY - rect.height / 2) / 25;
                setTimeout(() => {
                    beretika.style.transform =
                        `translate(${beretikaOffsetX}px, ${beretikaOffsetY}px)`;
                }, 200); // 200ms delay
            });

            // Reset posisi saat kursor keluar dari area
            missionArea.addEventListener("mouseleave", function() {
                keren.style.transform = "translate(0, 0)";
                bersahabat.style.transform = "translate(0, 0)";
                beretika.style.transform = "translate(0, 0)";
            });
        });
    </script>
    <style>
        #visiContent,
        #misiContent {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }

        #visiContent.active,
        #misiContent.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endsection

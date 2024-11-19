@extends('layouts.layout')

@section('content')
    <div id="hero" class="relative w-full h-[60vh] mt-5 mx-auto overflow-hidden group">
        <!-- Carousel Container -->
        <div class="carousel relative w-[90vw] overflow-hidden rounded-lg h-full mx-auto">
            <div class="slides flex transition-transform h-full duration-700 ease-in-out" id="carouselSlides">
                @foreach ($carouselArticles as $index => $article)
                    <div class="w-full h-full flex items-end justify-start relative flex-shrink-0 group">
                        <img src="{{ asset($article->images) }}"
                            class="w-full h-full object-cover absolute top-0 left-0 transition-transform duration-700 ease-in-out transform scale-100"
                            alt="{{ $article->title }}">
                        <div class="text-left py-5 w-full max-w-[70%] relative bottom-10 left-4 border-t ml-5 transition-all duration-1000 z-[4] ease-in-out opacity-0 blur-sm text-white transform translate-y-[7.5rem] scale-75 group-hover:translate-y-0 group-hover:opacity-100"
                            id="headline{{ $index + 1 }}">
                            <h1 class="text-3xl lg:text-5xl font-bold mb-4">{{ $article->title }}</h1>
                            <p class="text-sm lg:text-lg mb-4">{{ Str::limit($article->description, 100) }}</p>
                            <a href="{{ route('detail-article', $article->id) }}" {{-- <a href="{{ route('detail-article') }}" --}}
                                class="hover:bg-white text-sm lg:text-base hover:text-black py-2 px-4 border rounded opacity-0 translate-y-full transition-all duration-500 ease-in-out group-hover:translate-y-0 group-hover:opacity-100">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicator Bar -->
            <div class="absolute bottom-5 right-5 transform flex space-x-2 z-[3]">
                @foreach ($carouselArticles as $index => $article)
                    <div class="progress-bar cursor-pointer h-2 w-5 bg-gray-300 transition-all ease-in-out duration-500 rounded-full"
                        data-slide="{{ $index }}">
                    </div>
                @endforeach
            </div>

            <!-- Previous & Next Buttons -->
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
            <h1 class="text-2xl lg:text-5xl font-semibold text-center">Visi & Misi</h1>
            <div class="relative h-[450px] w-full overflow-y-hidden z-[1] px-5 py-3">
                <div class="h-full flex flex-col justify-center px-5 w-full items-center relative">
                    <!-- Visi Content -->
                    <div id="visiContent"
                        class="h-[450px] flex flex-col justify-center w-full overflow-y-hidden z-[1] px-5 py-3 absolute top-0">
                        <h2 class="text-xl lg:text-3xl font-bold mb-4">Visi Kami</h2>
                        <p class="text-sm lg:text-base text-gray-600">{{ $visi }}</p>
                    </div>

                    <!-- Misi Content -->
                    <div id="misiContent" class="h-full w-full overflow-y-hidden z-[1] px-5 py-3 absolute active"
                        style="opacity: 1;">

                        <div class="flex flex-col pt-5 pb-32">
                            <h2 class="text-xl lg:text-3xl font-bold mb-4">Misi Kami</h2>
                            <p class="text-sm lg:text-base">Untuk mencapai visi dan membentuk Karakter Profil Pelajar
                                Pancasila, maka SMK PGRI 2 Malang
                                menetapkan misi sebagai berikut.</p>
                        </div>
                        <div class="carousel-mission flex flex-col items-center transition-transform duration-700 ease-in-out"
                            id="missionCarousel" style="transform: translateY(0);">
                            @foreach ($misi as $index => $mission)
                                <div
                                    class="carousel-item bg-white p-4 rounded-lg {{ $loop->first ? 'opacity-100' : 'opacity-30' }} transition-all duration-700 ease-in-out w-full">
                                    <h3 class="text-lg lg:text-2xl font-semibold mb-2">Misi {{ $index + 1 }}</h3>
                                    <p class="text-sm lg:text-base text-gray-600">{{ $mission }}</p>
                                </div>
                            @endforeach
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
                <h1 class="text-2xl lg:text-4xl font-semibold mb-8">Latest Articles</h1>

                <!-- Article Filters -->
                <div
                    class="flex flex-wrap justify-start space-x-2 text-sm space-y-2 lg:space-y-0 lg:text-base lg:space-x-4 mb-8">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg category-filter"
                        data-category="all">All</button>
                    @foreach ($categories as $category)
                        <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg category-filter"
                            data-category="{{ $category->id }}">{{ $category->name }}</button>
                    @endforeach
                </div>


                <!-- Articles Grid -->
                <div id="articles-container" class="grid lg:grid-cols-3 grid-cols-2 gap-6">
                    @include('partials.articles-list', ['articles' => $articles])
                </div>
                <div id="article-actions" class="text-center mt-8">
                    <button id="see-more"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                        Lihat Lebih
                    </button>
                    <a href="{{ url('/') }}" id="see-all"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition duration-300 hidden">
                        Lihat Semua
                    </a>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 w-full h-fit sticky top-32 space-y-6">
                <!-- Card for Most Viewed Articles -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Artikel yang Sering Dilihat</h2>
                    <div class="gap-4 grid grid-cols-2">
                        @foreach ($articles->take(4) as $article)
                            <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
                                <img src="{{ asset($article->images) }}" alt="{{ $article->title }}"
                                    class="w-full h-20 object-cover">
                                <div class="p-2">
                                    <h3 class="text-base font-semibold">{{ $article->title }}</h3>
                                    <p class="text-gray-600 text-xs text-nowrap truncate">
                                        {{ Str::limit($article->description, 50) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- List of Authors -->
                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h2 class="text-2xl font-bold mb-4">Penulis Artikel</h2>
                    <ul class="space-y-4">
                        @foreach ($authors as $author)
                            <li class="flex items-center">
                                <img src="{{ $author->profile_picture ? asset('storage/' . $author->profile_picture) : asset('assets/images/avatar/avatar-1.jpg') }}"
                                    alt="{{ $author->name }}" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $author->name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $author->bio }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slideInFromBottom {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slide-in {
            animation: slideInFromBottom 0.3s ease-out;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryButtons = document.querySelectorAll(".category-filter");
            const articlesContainer = document.getElementById("articles-container");

            categoryButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    const categoryId = button.getAttribute("data-category");

                    // Tambahkan kelas aktif ke tombol yang dipilih
                    categoryButtons.forEach((btn) => {
                        btn.classList.remove("bg-blue-500", "text-white");
                        btn.classList.add("bg-gray-200", "text-gray-600");
                    });
                    button.classList.add("bg-blue-500", "text-white");
                    button.classList.remove("bg-gray-200", "text-gray-600");

                    // Fetch artikel dari server
                    fetch(`/articles/category/${categoryId}`)
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Gagal memuat data.");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            articlesContainer.innerHTML = data.articles;

                            // Tambahkan animasi
                            const newArticles = articlesContainer.querySelectorAll(".article");
                            newArticles.forEach((article) => {
                                article.classList.add("slide-in");
                                setTimeout(() => article.classList.remove("slide-in"),
                                    300);
                            });
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            articlesContainer.innerHTML =
                                `<p class="text-red-500">Gagal memuat artikel. Silakan coba lagi.</p>`;
                        });
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const articles = document.querySelectorAll(".article");
            const seeMoreBtn = document.getElementById("see-more");
            const seeAllLink = document.getElementById("see-all");
            let visibleCount = 6; // Jumlah artikel awal yang terlihat

            // Fungsi untuk menampilkan lebih banyak artikel dengan animasi
            function showMoreArticles() {
                const hiddenArticles = Array.from(articles).slice(visibleCount, visibleCount + 6);
                hiddenArticles.forEach((article) => {
                    article.style.display = "block"; // Tampilkan artikel
                    article.classList.add("slide-in"); // Tambahkan kelas animasi
                    setTimeout(() => {
                        article.classList.remove("slide-in"); // Hapus kelas animasi setelah selesai
                    }, 300); // Sesuaikan dengan durasi animasi di CSS
                });
                visibleCount += 6;

                // Jika semua artikel telah terlihat, sembunyikan tombol "Lihat Lebih" dan tampilkan tombol "Lihat Semua"
                if (visibleCount >= articles.length) {
                    seeMoreBtn.classList.add("hidden");
                    seeAllLink.classList.remove("hidden");
                }
            }

            // Sembunyikan artikel di luar batas awal (visibleCount)
            articles.forEach((article, index) => {
                if (index >= visibleCount) {
                    article.style.display = "none";
                }
            });

            // Tambahkan event listener ke tombol "Lihat Lebih"
            if (seeMoreBtn) {
                seeMoreBtn.addEventListener("click", showMoreArticles);
            }
        });
    </script>



    < <!-- Script for Carousel Functionality -->
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

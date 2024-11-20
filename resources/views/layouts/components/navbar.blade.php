<nav id="navbar" class="bg-[#139a4a] py-6 text-white sticky top-0 z-10 transition-all ease-in-out duration-700">
    <div class="flex justify-between items-center px-4 md:px-8 lg:px-12">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="relative flex gap-3 items-center">
            <img src="{{ asset('assets/images/logo/logo.webp') }}" class="max-w-12" alt="">
            <div class="flex flex-col gap-0">
                <p class="text-lg font-bold">SMK PGRI 2 MALANG</p>
                <p class="text-xs font-medium">School of Business and Technology</p>
            </div>
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex space-x-8">
            <div class="relative">
                <button id="profileBtn" class="cursor-pointer relative flex items-center">Profil
                    <i data-feather="chevron-down" class="ml-2 w-4 transition-transform"></i>

                </button>
                <!-- Dropdown Menu -->
                <div id="profileDropdown"
                    class="absolute top-full mt-2 z-[21] left-0 w-48 bg-white p-1 text-gray-800 rounded-lg shadow-lg opacity-0 transition-opacity duration-300 invisible">
                    {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profil Sekolah</a> --}}
                    {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-100">Prestasi</a> --}}
                    {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sejarah</a> --}}
                    {{-- <a href="#mission" class="block px-4 py-2 hover:bg-gray-100">Visi Misi</a> --}}
                    <a href="{{ route('guru.list') }}" class="block px-4 py-2 hover:bg-gray-100">Guru</a>
                </div>
            </div>

            <!-- Konsentrasi Keahlian Dropdown -->
            {{-- <button id="konsentrasiBtn" class="relative flex items-center">Konsentrasi Keahlian
                <i data-feather="chevron-down" class="ml-2 w-4 transition-transform"></i>
            </button>

            <button id="siswaBtn" class="relative flex items-center">Siswa
                <i data-feather="chevron-down" class="ml-2 w-4 transition-transform"></i>
            </button>
            <button id="fasilitasBtn" class="relative flex items-center">Fasilitas
                <i data-feather="chevron-down" class="ml-2 w-4 transition-transform"></i> --}}
            </button>
            {{-- <a href="#" class="">Berita</a> --}}
            <a href="https://ppdb.smkpgri2malang.sch.id/" class="">PPDB</a>
        </div>

        <!-- Desktop Authentication Links -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="https://ppdb.smkpgri2malang.sch.id/"
                class="bg-green-500 text-white transition-all ease-in-out px-5 py-2 rounded-md text-sm font-medium hover:bg-green-700 flex items-center space-x-2">
                <span>Daftar Sekarang</span>
            </a>
        </div>

        <!-- Mobile Hamburger Menu -->
        <div class="md:hidden">
            <button id="hamburger" class="focus:outline-none">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    {{-- <div id="siswaDropdown"
        class="absolute top-full -mt-1 left-0 w-full bg-white text-gray-800 overflow-hidden max-h-0 z-20 shadow-lg transition-all duration-500 ease-in-out opacity-0">
        <div class="container mx-auto py-8 px-4 grid grid-cols-4 gap-8">
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Siswa 1</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Jadwal Pelajaran</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Kegiatan Ekstrakurikuler</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Organisasi Siswa</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Siswa 2</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Prestasi Siswa</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Beasiswa</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Siswa 3</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Pusat Konseling</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Bimbingan Karir</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Siswa 4</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Perpustakaan Digital</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Fasilitas E-Learning</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="fasilitasDropdown"
        class="absolute top-full -mt-1 left-0 w-full bg-white text-gray-800 overflow-hidden max-h-0 z-20 shadow-lg transition-all duration-500 ease-in-out opacity-0">
        <div class="container mx-auto py-8 px-4 grid grid-cols-4 gap-8">
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Fasilitas 1</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Jadwal Pelajaran</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Kegiatan Ekstrakurikuler</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Organisasi Siswa</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Fasilitas 2</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Prestasi Siswa</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Beasiswa</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Fasilitas 3</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Pusat Konseling</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Bimbingan Karir</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Fasilitas 4</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Perpustakaan Digital</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Fasilitas E-Learning</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Dropdown for Konsentrasi Keahlian -->
    <div id="konsentrasiDropdown"
        class="absolute top-full -mt-1 left-0 w-full bg-white text-gray-800 overflow-hidden max-h-0 z-20 shadow-lg transition-all duration-500 ease-in-out opacity-0">
        <div class="container mx-auto py-8 px-4 grid grid-cols-2 gap-8">
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Konsentrasi 1</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Desain Komunikasi Visual</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Multimedia</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Rekayasa Perangkat Lunak</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Konsentrasi 2</h3>
                <ul class="*:pt-3">
                    <li><a href="#" class="hover:text-[#11c382]">Teknik Jaringan</a></li>
                    <li><a href="#" class="hover:text-[#11c382]">Bisnis Digital</a></li>
                </ul>
            </div>
        </div>
    </div> --}}

    <!-- Mobile Menu (Sidebar) -->
    <div id="mobileMenu"
        class="fixed inset-y-0 right-0 w-64 bg-[#11c382] transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex justify-end p-4">
            <button id="closeMenu" class="focus:outline-none">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <nav class="flex flex-col space-y-4 p-4">
            {{-- <a href="#" class="">Jurusan</a>
            <a href="#" class="">Fasilitas</a>
            <a href="#" class="">Tentang</a> --}}
            <a href="{{ route('guru.list') }}" class="">Guru</a>
            {{-- <a href="#" class="">Berita</a> --}}
            <a href="https://ppdb.smkpgri2malang.sch.id/" class="">PPDB</a>
            <a href="https://ppdb.smkpgri2malang.sch.id/"
                class="bg-green-500 text-white transition-all ease-in-out px-5 py-2 rounded-md text-sm font-medium hover:bg-green-700 flex items-center space-x-2">
                <span>Daftar Sekarang</span>
            </a>
        </nav>
    </div>
</nav>


<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 700) {
            navbar.classList.remove('py-6');
            navbar.classList.add('py-3');
        } else {
            navbar.classList.remove('py-3');
            navbar.classList.add('py-6');
        }
    });

    // Open mobile menu
    document.getElementById('hamburger').addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.remove('translate-x-full');
    });

    // Close mobile menu
    document.getElementById('closeMenu').addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.add('translate-x-full');
    });

    // Toggle Jurusan Dropdown
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', function() {
        profileDropdown.classList.toggle('opacity-0');
        profileDropdown.classList.toggle('invisible');
    });

    // Close both dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('opacity-0');
            profileDropdown.classList.add('invisible');
        }

        // if (!facilityBtn.contains(e.target) && !facilityDropdown.contains(e.target)) {
        //     facilityDropdown.classList.add('hidden');
        // }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Load Feather Icons once when the page loads
        feather.replace();

        // Toggle Konsentrasi Keahlian Dropdown
        const konsentrasiBtn = document.getElementById('konsentrasiBtn');
        const konsentrasiDropdown = document.getElementById('konsentrasiDropdown');

        konsentrasiBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            toggleDropdown(konsentrasiDropdown); // Toggle Konsentrasi Dropdown
            rotateIcon(konsentrasiBtn); // Rotate the icon using style
        });

        // Toggle Siswa Dropdown
        const siswaBtn = document.getElementById('siswaBtn');
        const siswaDropdown = document.getElementById('siswaDropdown');

        siswaBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            toggleDropdown(siswaDropdown); // Toggle Siswa Dropdown
            rotateIcon(siswaBtn); // Rotate the icon using style
        });

        // Toggle Fasilitas Dropdown
        const fasilitasBtn = document.getElementById('fasilitasBtn');
        const fasilitasDropdown = document.getElementById('fasilitasDropdown');

        fasilitasBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            toggleDropdown(fasilitasDropdown); // Toggle Fasilitas Dropdown
            rotateIcon(fasilitasBtn); // Rotate the icon using style
        });

        // Function to toggle dropdowns
        function toggleDropdown(dropdown) {
            closeAllDropdownsExcept(dropdown); // Close other dropdowns

            // Toggle dropdown's visibility and height
            dropdown.classList.toggle('opacity-100');
            dropdown.classList.toggle('translate-y-0');
            if (dropdown.style.maxHeight === "0px" || !dropdown.style.maxHeight) {
                dropdown.style.maxHeight = dropdown.scrollHeight + "px";
            } else {
                dropdown.style.maxHeight = "0px";
            }
        }

        // Function to close all dropdowns except the currently active one
        function closeAllDropdownsExcept(activeDropdown) {
            const allDropdowns = [fasilitasDropdown, konsentrasiDropdown, siswaDropdown];

            allDropdowns.forEach(dropdown => {
                if (dropdown !== activeDropdown) {
                    dropdown.style.maxHeight = "0px";
                    dropdown.classList.remove('opacity-100');
                    dropdown.classList.remove('translate-y-0');
                }
            });
        }

        // Function to rotate the icon using inline style
        function rotateIcon(button) {
            const icon = button.querySelector('i[data-feather="chevron-down"]');
            if (icon) {
                const currentRotation = icon.getAttribute('data-rotated') === 'true' ? 'rotate(0deg)' :
                    'rotate(180deg)';
                icon.style.transform = currentRotation;
                icon.style.transition = 'transform 0.3s ease-in-out'; // Adding smooth transition
                icon.setAttribute('data-rotated', currentRotation === 'rotate(180deg)'); // Toggle state
            }
        }
    });
</script>

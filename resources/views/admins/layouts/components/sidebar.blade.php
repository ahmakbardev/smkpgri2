<!-- start navbar -->
<nav class="navbar-vertical navbar">
    <div id="myScrollableElement" class="h-screen" data-simplebar>
        <!-- brand logo -->
        <a href="{{ url('/') }}" class="relative px-6 py-5 flex gap-3 items-center">
            <img src="{{ asset('assets/images/logo/logo.webp') }}" class="max-w-8 inline" alt="">
            <div class="flex flex-col gap-0">
                <p class="text-base font-bold">SMK PGRI 2 MALANG</p>
                <p class="text-[9px] font-medium">School of Business and Technology</p>
            </div>
        </a>

        <!-- navbar nav -->
        <ul class="navbar-nav flex-col" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link active" href="./index.html">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i> Dashboard
                </a>
            </li>

            <!-- Konten Web -->
            <li class="nav-item">
                <div class="navbar-heading">Konten Web</div>
            </li>

            <!-- Article Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                    aria-expanded="false" aria-controls="navPages">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Article
                </a>
                <div id="navPages" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item"><a class="nav-link" href="{{ route('category-articles.index') }}"><i
                                    data-feather="tag" class="w-4 h-4 mr-2"></i> Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><i data-feather="message-square"
                                    class="w-4 h-4 mr-2"></i> Manage Comments</a></li>
                    </ul>
                </div>
            </li>

            {{-- <!-- Konsentrasi Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navKonsentrasi"
                    aria-expanded="false" aria-controls="navKonsentrasi">
                    <i data-feather="book-open" class="w-4 h-4 mr-2"></i> Konsentrasi
                </a>
                <div id="navKonsentrasi" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jurusans.index') }}">
                                <i data-feather="list" class="w-4 h-4 mr-2"></i> Daftar Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navJurusan" aria-expanded="false" aria-controls="navJurusan">
                                <i data-feather="layers" class="w-4 h-4 mr-2"></i> Jurusan
                            </a>
                            <div id="navJurusan" class="collapse" data-bs-parent="#navKonsentrasi">
                                <ul id="navKonsentrasiList" class="nav flex-col ml-8">
                                    @foreach ($bidangs as $bidang)
                                        <a class="nav-link collapsed nav-konsentrasi" href="#!"
                                            data-bs-toggle="collapse" data-bs-target="#navBidang{{ $bidang->id }}"
                                            data-bidang-id="{{ $bidang->id }}" aria-expanded="false"
                                            aria-controls="navBidang{{ $bidang->id }}">
                                            {{ $bidang->name }}
                                        </a>
                                        <div id="navBidang{{ $bidang->id }}" class="collapse nav-konsentrasi"
                                            data-bs-parent="#navJurusan">
                                            <ul id="jurusanList{{ $bidang->id }}" class="nav flex-col"></ul>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Fasilitas Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navFasilitas"
                    aria-expanded="false" aria-controls="navFasilitas">
                    <i data-feather="tool" class="w-4 h-4 mr-2"></i> Fasilitas
                </a>
                <div id="navFasilitas" class="collapse" data-bs-parent="#sideNavbar">
                    <ul id="navFasilitasList" class="nav flex-col ml-8">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fasilitas-bidangs.index') }}">
                                <i data-feather="list" class="w-4 h-4 mr-2"></i> Daftar Jurusan
                            </a>
                        </li>
                        @foreach ($fasilitasBidangs as $fasilitasBidang)
                            <a class="nav-link collapsed nav-fasilitas" href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navFasilitasBidang{{ $fasilitasBidang->id }}"
                                data-fasilitas-bidang-id="{{ $fasilitasBidang->id }}" aria-expanded="false"
                                aria-controls="navFasilitasBidang{{ $fasilitasBidang->id }}">
                                {{ $fasilitasBidang->name }}
                            </a>
                            <div id="navFasilitasBidang{{ $fasilitasBidang->id }}" class="collapse nav-fasilitas"
                                data-bs-parent="#navFasilitas">
                                <ul id="facilityList{{ $fasilitasBidang->id }}" class="nav flex-col ml-8"></ul>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </li> --}}


            <!-- Profil Sekolah Section -->
            <li class="nav-item">
                <div class="navbar-heading">Profil Sekolah</div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#!"><i data-feather="user" class="w-4 h-4 mr-2"></i>
                    Profil Sekolah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('school_profile.sejarah_form') }}"><i
                        data-feather="book" class="w-4 h-4 mr-2"></i> Sejarah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('school_profile.visi_misi_form') }}"><i
                        data-feather="compass" class="w-4 h-4 mr-2"></i> Visi Misi</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('guru.index') }}"><i data-feather="users"
                        class="w-4 h-4 mr-2"></i> Guru</a></li>
        </ul>
    </div>
</nav>
<!--end of navbar-->

<!--end of navbar-->
<script>
    // Encode bidang dan fasilitasBidangs menjadi JSON agar bisa diakses di JS
    var bidangs = @json($bidangs);
    var fasilitasBidangs = @json($fasilitasBidangs);

    $(document).ready(function() {
        // Delegasikan event untuk konsentrasi
        $('#sideNavbar').on('click', '.nav-konsentrasi', function(e) {
            e.preventDefault(); // Prevent default action
            var $this = $(this);
            var bidangId = $this.data('bidang-id'); // Ambil bidang ID dari attribute

            console.log('Bidang ID:', bidangId); // Debugging

            // Jika bidangId tidak ada, ambil dari JSON
            if (!bidangId || bidangId === "undefined") {
                bidangId = bidangs.find(bidang => bidang.name === $this.text().trim())?.id;
            }

            if (bidangId && $(`#jurusanList${bidangId}`).children().length === 0) {
                $(`#jurusanList${bidangId}`).html(
                    '<li class="nav-item">Loading...</li>'); // Tambah loading indicator
                $.get(`/bidangs/${bidangId}/global-jurusan`, function(data) {
                    $(`#jurusanList${bidangId}`).empty(); // Kosongkan sebelum tambahkan data
                    if (data.jurusans && data.jurusans.length > 0) {
                        data.jurusans.forEach(function(jurusan) {
                            $(`#jurusanList${bidangId}`).append(`
                            <li class="nav-item">
                                <a class="nav-link" href="#!">${jurusan.name}</a>
                            </li>
                        `);
                        });
                    } else {
                        $(`#jurusanList${bidangId}`).append(`
                        <li class="nav-item">
                            <a class="nav-link" href="#!">No Jurusan available</a>
                        </li>
                    `);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error fetching jurusans:', xhr
                        .responseText); // Untuk menampilkan error
                });
            }
        });

        // Delegasikan event untuk fasilitas
        $('#sideNavbar').on('click', '.nav-fasilitas', function(e) {
            e.preventDefault(); // Prevent default action
            var $this = $(this);
            var fasilitasBidangId = $this.data('fasilitas-bidang-id'); // Ambil ID bidang fasilitas

            console.log('Fasilitas Bidang ID:', fasilitasBidangId); // Debugging

            // Jika fasilitasBidangId tidak ada, ambil dari JSON
            if (!fasilitasBidangId || fasilitasBidangId === "undefined") {
                fasilitasBidangId = fasilitasBidangs.find(fasilitas => fasilitas.name === $this.text()
                    .trim())?.id;
            }

            if (fasilitasBidangId && $(`#facilityList${fasilitasBidangId}`).children().length === 0) {
                $(`#facilityList${fasilitasBidangId}`).html(
                    '<li class="nav-item">Loading...</li>'); // Tambah loading indicator
                $.get(`/fasilitas-bidangs/${fasilitasBidangId}/sideFacilities`, function(data) {
                    $(`#facilityList${fasilitasBidangId}`)
                        .empty(); // Kosongkan sebelum tambahkan data
                    if (data.facilities && data.facilities.length > 0) {
                        data.facilities.forEach(function(facility) {
                            $(`#facilityList${fasilitasBidangId}`).append(`
                            <li class="nav-item">
                                <a class="nav-link" href="#!">
                                    <i data-feather="tool" class="w-4 h-4 mr-2"></i>${facility.name}
                                </a>
                            </li>
                        `);
                        });
                    } else {
                        $(`#facilityList${fasilitasBidangId}`).append(`
                        <li class="nav-item">
                            <a class="nav-link" href="#!">
                                <i data-feather="alert-circle" class="w-4 h-4 mr-2"></i>No Facilities available
                            </a>
                        </li>
                    `);
                    }
                    feather.replace(); // Refresh icons
                }).fail(function(xhr, status, error) {
                    console.error('Error fetching facilities:', xhr
                        .responseText); // Untuk menampilkan error
                });
            }
        });
    });
</script>

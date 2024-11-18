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

                        <li class="nav-item"><a class="nav-link" href="{{ route('penulis.articles.create') }}"><i
                                    data-feather="edit" class="w-4 h-4 mr-2"></i> Create New Article</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('penulis.articles.index') }}"><i
                                    data-feather="file" class="w-4 h-4 mr-2"></i> Manage All Articles</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--end of navbar-->

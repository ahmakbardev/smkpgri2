<!-- start navbar -->
<div class="header">
    <!-- navbar -->
    <nav class="bg-white px-6 py-[10px] flex items-center justify-between shadow-sm">
        <a id="nav-toggle" href="#" class="text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>
        <div class="ml-3 hidden md:hidden lg:block">
            <!-- form -->
            <form class="flex items-center">
                <input type="search"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Search" />
            </form>
        </div>
        <!-- navbar nav -->
        <ul class="flex ml-auto items-center">
            <!-- list -->
            <li class="dropdown ml-2">
                <a class="rounded-full" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="w-10 h-10 relative">
                        <img alt="avatar"
                            src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/images/avatar/avatar-1.jpg') }}"
                            class="w-20 h-20 rounded-full object-cover object-center" />
                        <div
                            class="absolute border-gray-200 border-2 rounded-full right-0 bottom-0 bg-green-600 h-3 w-3">
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="dropdownUser">
                    <div class="px-4 pb-0 pt-2">
                        <div class="leading-4">
                            <h5 class="mb-1">{{ old('name', $user->name) }}</h5>
                        </div>
                        <div class="border-b mt-3 mb-2"></div>
                    </div>

                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="{{ route('penulis.dashboard') }}">
                                <i class="w-4 h-4" data-feather="user"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="flex items-center">
                                    <i class="w-4 h-4 mr-2" data-feather="power"></i>
                                    Sign Out
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>
<!-- end of navbar -->

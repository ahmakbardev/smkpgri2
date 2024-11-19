@extends('layouts.layout')

@section('content')
    <div class="container mx-auto py-8 grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Left Sidebar -->
        <aside class="md:col-span-3 hidden md:block sticky top-28 h-fit">
            <!-- Section for Article Author -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ $article->author->profile_picture ? asset('storage/' . $article->author->profile_picture) : asset('assets/images/avatar/avatar-1.jpg') }}"
                        alt="Author Avatar" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $article->author->name }}</h3>
                        <p class="text-sm text-gray-600">By {{ $article->author->name }}</p>
                    </div>
                </div>
            </div>

            <!-- Latest Update Section -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="font-semibold text-lg mb-4">Latest Update</h2>
                <ul>
                    @foreach ($latestArticles as $latest)
                        <li class="mb-3">
                            <a href="{{ route('detail-article', $latest->id) }}" class="text-blue-500 hover:underline">
                                {{ $latest->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="md:col-span-6 bg-white p-8 rounded-lg shadow-md">
            <nav class="mb-4 text-sm text-gray-600 flex items-center space-x-2">
                <a href="{{ url('/') }}" class="flex items-center text-blue-500 hover:underline">
                    <i data-feather="home" class="w-4 h-4 mr-1"></i>
                    Home
                </a>
                <span class="text-gray-400">/</span>
                <a href="#" class="text-blue-500 hover:underline">
                    {{ $article->category->name }}
                </a>
                <span class="text-gray-400">/</span>
                <span class="text-gray-500">{{ $article->title }}</span>
            </nav>

            <article>
                <!-- Article Image -->
                @if ($article->images)
                    <div class="mb-6">
                        <img src="{{ asset($article->images) }}" alt="{{ $article->alt ?? 'Article Image' }}"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                @endif

                <!-- Article Title -->
                <h1 class="text-2xl lg:text-4xl font-bold mb-4">{{ $article->title }}</h1>
                <p class="text-xs lg:text-sm text-gray-500 mb-4">Last updated: {{ $article->updated_at->format('M d, Y') }}
                </p>

                <div class="bg-teal-100 p-4 rounded-md mb-6">
                    <p class="text-sm lg:text-base text-teal-800 font-semibold">Disclaimer: This content is based on
                        reliable sources and is
                        updated regularly.</p>
                </div>

                <!-- Article Content -->
                @php
                    $content = $article->content;
                    $content = preg_replace(
                        '/<h1>(.*?)<\/h1>/',
                        '<h1 class="text-2xl lg:text-3xl font-bold mt-6 mb-4">$1</h1>',
                        $content,
                    );
                    $content = preg_replace(
                        '/<h2>(.*?)<\/h2>/',
                        '<h2 class="text-xl lg:text-2xl font-semibold mt-4 mb-3">$1</h2>',
                        $content,
                    );
                    $content = preg_replace(
                        '/<h3>(.*?)<\/h3>/',
                        '<h3 class="text-base lg:text-xl font-medium mt-3 mb-2">$1</h3>',
                        $content,
                    );
                    $content = preg_replace(
                        '/<h4>(.*?)<\/h4>/',
                        '<h4 class="text-base lg:text-lg font-medium mt-3 mb-2">$1</h4>',
                        $content,
                    );

                    $content = preg_replace(
                        '/<p>(.*?)<\/p>/',
                        '<p class="text-sm lg:text-base leading-relaxed text-gray-700 my-4">$1</p>',
                        $content,
                    );

                    $content = preg_replace(
                        '/<img(.*?)alt="(.*?)"(.*?)>/',
                        '<div class="my-6"><img $1 $3 class="w-full h-auto rounded-lg shadow"><p class="text-sm text-center text-gray-500 mt-2">$2</p></div>',
                        $content,
                    );

                    // Figures
                    $content = preg_replace('/<figure(.*?)>/', '<figure class="mx-auto"$1>', $content);
                @endphp

                {!! $content !!}
            </article>

            <style>
                figure {
                    margin: 1.5rem 0;
                    text-align: center;
                }

                figure img {
                    width: 100%;
                    height: auto;
                    border-radius: 0.5rem;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                figure figcaption {
                    margin-top: 0.5rem;
                    font-size: 0.875rem;
                    color: #6B7280;
                    /* Tailwind's text-gray-500 */
                }
            </style>

        </main>

        <!-- Right Sidebar -->
        <!-- Right Sidebar -->
        <aside class="md:col-span-3 hidden md:block sticky top-28 h-fit">
            <!-- Share Now Section -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="font-semibold text-lg mb-4">Share Now</h2>
                <div class="flex space-x-3">
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition">
                        <i data-feather="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition">
                        <i data-feather="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition">
                        <i data-feather="facebook" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    if (typeof feather !== "undefined") {
                        feather.replace();
                    }
                });
            </script>


            <!-- Comment Section -->
            <div class="bg-white p-4 rounded-lg shadow-md mt-2">
                <!-- Display Comments -->
                <div class="mt-2 max-h-[348px] overflow-y-scroll">
                    <h3 class="font-semibold text-lg mb-2">Comments</h3>
                    @foreach ($article->comments as $comment)
                        <div class="mb-4">
                            <div class="flex justify-between mb-1 border-b-[1px]">
                                <p class="text-sm font-medium text-gray-700">{{ $comment->name }}</p>
                                <p class="text-xs text-gray-600">{{ $comment->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                            <p class="text-gray-700">{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- Comment Form -->
                <form action="{{ route('article.comment', $article->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea id="comment" name="comment" rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                        Submit
                    </button>
                </form>
            </div>

        </aside>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== "undefined") {
                feather.replace();
            }
        });
    </script>
@endsection

@foreach ($articles as $article)
    <div
        class="article bg-white rounded-lg shadow-md overflow-hidden group hover:scale-[1.02] hover:ring hover:ring-blue-400 transition-all ease-in-out duration-100 relative">

        <!-- Tanda Berita Favorite -->
        @if ($article->is_favorite)
            <div class="absolute top-2 left-2 bg-yellow-500 flex items-center gap-3 text-white text-xs font-semibold py-1 px-3 rounded-full z-[5]">
                <i data-feather="star" class="inline w-5 object-contain"></i> Berita Favorit!
            </div>
        @endif

        <a href="{{ route('detail-article', app('slugify')($article->title)) }}">
            <img src="{{ asset($article->images) }}" alt="{{ $article->title }}" class="w-full h-36 lg:h-60 object-cover">
        </a>
        <div class="p-4">
            <h2 class="text-sm lg:text-xl font-bold mb-2 truncate">{{ $article->title }}</h2>
            <p class="text-gray-600 mb-4 text-xs lg:text-sm">
                {{ Str::limit($article->description, 100) }}
            </p>
            <div class="flex justify-between items-center">
                <p class="text-gray-400 text-xs lg:text-sm">
                    {{ $article->created_at->format('d M Y') }}</p>
                <a href="{{ route('detail-article', app('slugify')($article->title)) }}"
                    class="text-xs lg:text-base text-blue-500 hover:underline">Read
                    more</a>
            </div>
        </div>
    </div>
@endforeach

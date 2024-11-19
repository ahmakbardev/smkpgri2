@extends('penulis.layouts.layout')

@section('penulis-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Manage Articles</h1>
            <a href="{{ route('penulis.articles.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                + Add New Article
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-600">
                        <th class="py-3 px-6 font-semibold text-sm uppercase">Title</th>
                        <th class="py-3 px-6 font-semibold text-sm uppercase">Category</th>
                        <th class="py-3 px-6 font-semibold text-sm uppercase">Status</th>
                        <th class="py-3 px-6 font-semibold text-sm uppercase">Tags</th>
                        <th class="py-3 px-6 font-semibold text-sm uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($articles as $article)
                        <tr class="border-b border-gray-200 hover:bg-gray-50" data-id="{{ $article->id }}">
                            <td class="py-4 px-6">
                                <p>
                                    {{ $article->title }}
                                </p>
                            </td>
                            <td class="py-4 px-6">{{ $article->category->name }}</td>
                            <td class="py-4 px-6">
                                <select class="status-dropdown bg-white border border-gray-300 rounded"
                                    data-id="{{ $article->id }}">
                                    <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft
                                    </option>
                                    <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="archived" {{ $article->status == 'archived' ? 'selected' : '' }}>Archived
                                    </option>
                                </select>
                            </td>
                            <td class="py-4 px-6">
                                @foreach ($article->tags as $tag)
                                    <span
                                        class="bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('penulis.articles.edit', $article->id) }}"
                                    class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 mr-2">
                                    Edit
                                </a>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 delete-btn"
                                    data-id="{{ $article->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="deleteModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-500">
        <div id="modalContent"
            class="bg-white rounded-lg shadow-lg p-6 w-96 opacity-0 transform translate-y-10 scale-95 transition-all duration-500">
            <h3 class="text-lg font-semibold mb-4">Are you sure you want to delete this article?</h3>
            <div class="flex justify-end">
                <button id="cancelDelete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancel</button>
                <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteButtons = document.querySelectorAll('.favorite-btn');

            favoriteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const articleId = this.dataset.id;

                    fetch(`/articles/${articleId}/favorite`, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.classList.toggle('text-yellow-500');
                                this.classList.toggle('text-gray-400');
                                alert(data.message);
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteArticleId = null;

            function showModal() {
                // Tampilkan modal dengan smooth effect
                $('#deleteModal').removeClass('hidden');
                setTimeout(function() {
                    $('#deleteModal').removeClass('opacity-0').addClass('opacity-100');
                    $('#modalContent').removeClass('opacity-0 translate-y-10 scale-95').addClass(
                        'opacity-100 translate-y-0 scale-100');
                }, 100);
            }

            function hideModal() {
                // Sembunyikan modal dengan smooth effect
                $('#deleteModal').removeClass('opacity-100').addClass('opacity-0');
                $('#modalContent').removeClass('opacity-100 translate-y-0 scale-100').addClass(
                    'opacity-0 translate-y-10 scale-95');
                setTimeout(function() {
                    $('#deleteModal').addClass('hidden');
                }, 500); // Cocokkan durasi dengan transisi
            }

            // Event listener untuk tombol delete di tabel
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    deleteArticleId = this.dataset.id;
                    showModal(); // Panggil modal untuk ditampilkan
                });
            });

            // Event listener untuk tombol cancel di modal
            document.getElementById('cancelDelete').addEventListener('click', function() {
                hideModal(); // Panggil modal untuk disembunyikan
            });

            // Event listener untuk tombol confirm delete di modal
            document.getElementById('confirmDelete').addEventListener('click', function() {
                if (deleteArticleId) {
                    fetch(`/penulis/articles/${deleteArticleId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to delete the article');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Hapus baris dari tabel
                                document.querySelector(`tr[data-id="${deleteArticleId}"]`).remove();
                                showToast('success', 'Article deleted successfully!');
                                hideModal();
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('error', 'An error occurred while deleting the article.');
                        });
                }
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusDropdowns = document.querySelectorAll('.status-dropdown');

            // Fungsi untuk mengubah warna berdasarkan status
            function updateDropdownColor(dropdown, status) {
                dropdown.classList.remove('text-gray-500', 'text-green-500',
                    'text-red-500'); // Hapus class warna sebelumnya

                if (status === 'draft') {
                    dropdown.classList.add('text-gray-500');
                } else if (status === 'published') {
                    dropdown.classList.add('text-green-500');
                } else if (status === 'archived') {
                    dropdown.classList.add('text-red-500');
                }
            }

            // Atur warna pada saat page load berdasarkan status yang sudah dipilih
            statusDropdowns.forEach(dropdown => {
                updateDropdownColor(dropdown, dropdown.value);

                // Event listener untuk mengubah warna saat status berubah
                dropdown.addEventListener('change', function() {
                    const newStatus = this.value;
                    updateDropdownColor(this, newStatus);

                    // Fetch request untuk update status di server
                    const articleId = this.dataset.id;
                    fetch(`{{ url('articles') }}/${articleId}/update-status`, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
                        })

                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showToast('success', 'Status updated successfully!');
                            } else {
                                showToast('error', 'An error occurred while updating status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('error', 'An error occurred while updating status.');
                        });
                });
            });
        });
    </script>
@endsection

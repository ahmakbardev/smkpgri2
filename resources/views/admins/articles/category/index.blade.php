@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Manage Article Categories</h1>

        <!-- Button to trigger modal -->
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6" data-toggle="modal"
            data-target="#categoryModal">Add New Category</button>

        <!-- Category List -->
        <div class="card h-full shadow">
            <div class="relative overflow-x-auto" data-simplebar="" style="max-height: 380px">
                <table class="min-w-full text-left bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="text-gray-700">
                            <th class="px-6 py-3 bg-gray-100">Name</th>
                            <th class="px-6 py-3 bg-gray-100">Description</th>
                            <th class="px-6 py-3 bg-gray-100">Action</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                        @foreach ($categories as $category)
                            <tr data-id="{{ $category->id }}">
                                <td class="px-6 py-3 border-b">{{ $category->name }}</td>
                                <td class="px-6 py-3 border-b">{{ $category->description }}</td>
                                <td class="px-6 py-3 border-b">
                                    <button
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editCategory"
                                        data-id="{{ $category->id }}">Edit</button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteCategory"
                                        data-id="{{ $category->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300 ease-out hidden opacity-0 flex items-center justify-center"
        id="categoryModal">
        <div class="bg-white rounded-lg shadow-lg w-1/3 transform transition-all duration-500 ease-in-out opacity-0 translate-y-10 scale-95"
            id="modalContent">
            <form id="categoryForm"> <!-- Pastikan form memiliki ID -->
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4" id="categoryModalLabel">Add New Category</h2>
                    <input type="hidden" id="categoryId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Save</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                            id="closeModal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Scripts for Ajax and Modal -->
    <script>
        $(document).ready(function() {
            rebindEventHandlers(); // Rebind event handlers on page load

            $('#categoryForm').on('submit', function(event) {
                event.preventDefault();
                var id = $('#categoryId').val();
                var url = id ? '/category-articles/' + id : '/category-articles';
                var method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: {
                        name: $('#name').val(),
                        description: $('#description').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        hideModal(); // Sembunyikan modal setelah sukses

                        // Jika menambah kategori baru
                        if (method === 'POST') {
                            $('#categoryTableBody').append(`
                                <tr data-id="${response.category.id}">
                                    <td class="px-6 py-3 border-b">${response.category.name}</td>
                                    <td class="px-6 py-3 border-b">${response.category.description || ''}</td>
                                    <td class="px-6 py-3 border-b">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editCategory" data-id="${response.category.id}">Edit</button>
                                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteCategory" data-id="${response.category.id}">Delete</button>
                                    </td>
                                </tr>
                            `);
                            showToast('success',
                            'Category added successfully!'); // Show success toast for adding
                        } else if (method === 'PUT') {
                            // Jika mengedit kategori
                            const row = $(`tr[data-id='${response.category.id}']`);
                            row.find('td').eq(0).text(response.category.name);
                            row.find('td').eq(1).text(response.category.description || '');
                            showToast('success',
                            'Category updated successfully!'); // Show success toast for updating
                        }

                        // Rebind event handler setelah tambah atau edit
                        rebindEventHandlers();
                    },
                    error: function(xhr) {
                        showToast('error',
                        'An error occurred while saving the category.'); // Show error toast
                    }
                });
            });

            // Fungsi untuk mengikat kembali event handler pada edit dan delete
            function rebindEventHandlers() {
                // Edit category
                $('.editCategory').off('click').on('click', function() {
                    var id = $(this).data('id');
                    $.get('/category-articles/' + id + '/edit', function(data) {
                        $('#categoryModalLabel').text('Edit Category');
                        $('#categoryId').val(data.id);
                        $('#name').val(data.name);
                        $('#description').val(data.description);
                        showModal();
                    });
                });

                // Delete category
                $('.deleteCategory').off('click').on('click', function() {
                    if (confirm('Are you sure you want to delete this category?')) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: '/category-articles/' + id,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Hapus baris yang sesuai secara dinamis tanpa reload
                                $(`tr[data-id='${id}']`).fadeOut(300, function() {
                                    $(this)
                                .remove(); // Hapus dari DOM setelah animasi fade out selesai
                                });
                                showToast('success',
                                'Category deleted successfully!'); // Show success toast for deletion
                            },
                            error: function(xhr) {
                                showToast('error',
                                    'An error occurred while deleting the category.'
                                    ); // Show error toast
                            }
                        });
                    }
                });
            }

            // Show modal
            $('[data-toggle="modal"]').on('click', function() {
                if ($('#categoryForm').length > 0) {
                    $('#categoryForm')[0].reset(); // Clear the form safely
                }
                $('#categoryModalLabel').text('Add New Category');
                $('#categoryId').val('');
                showModal();
            });

            // Close modal
            $('#closeModal').on('click', function() {
                hideModal();
            });

            function showModal() {
                $('#categoryModal').removeClass('hidden');
                setTimeout(function() {
                    $('#categoryModal').removeClass('opacity-0').addClass('opacity-100');
                    $('#modalContent').removeClass('opacity-0 translate-y-10 scale-95').addClass(
                        'opacity-100 translate-y-0 scale-100');
                }, 100);
            }

            function hideModal() {
                $('#categoryModal').removeClass('opacity-100').addClass('opacity-0');
                $('#modalContent').removeClass('opacity-100 translate-y-0 scale-100').addClass(
                    'opacity-0 translate-y-10 scale-95');
                setTimeout(function() {
                    $('#categoryModal').addClass('hidden');
                }, 500); // Matches the transition duration
            }
        });
    </script>
@endsection

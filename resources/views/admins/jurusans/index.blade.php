@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- Bidang List -->
            <div>
                <h1 class="text-2xl font-bold mb-4">Manage Bidang</h1>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6" id="addBidangBtn">+
                    Add New Bidang</button>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 bg-gray-100">Bidang Name</th>
                                <th class="px-6 py-3 bg-gray-100">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bidangTableBody">
                            @foreach ($bidangs as $bidang)
                                <tr data-id="{{ $bidang->id }}" class="selectBidang">
                                    <td class="px-6 py-3 border-b">{{ $bidang->name }}</td>
                                    <td class="px-6 py-3 border-b">
                                        <button
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editBidang"
                                            data-id="{{ $bidang->id }}">Edit</button>
                                        <button
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteBidang"
                                            data-id="{{ $bidang->id }}">Delete</button>
                                        <button
                                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2 manageJurusan"
                                            data-id="{{ $bidang->id }}">Manage</button> <!-- Tombol Manage -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Jurusan List (related to selected Bidang) -->
            <div id="jurusanContainer">
                <h1 class="text-2xl font-bold mb-4">Manage Jurusan</h1>
                <div class="hidden" id="jurusanSection">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6"
                        id="addJurusanBtn">+ Add New Jurusan</button>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 bg-gray-100">Jurusan Name</th>
                                    <th class="px-6 py-3 bg-gray-100">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="jurusanTableBody">
                                <!-- Jurusan will be loaded dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Bidang -->
    <div id="bidangModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
        <div
            class="modal-content bg-white rounded-lg shadow-lg w-1/3 transform transition-all duration-500 ease-in-out opacity-0 translate-y-10 scale-95">
            <form id="bidangForm">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4" id="bidangModalLabel">Add New Bidang</h2>
                    <input type="hidden" id="bidangId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Bidang Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Save</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                            id="closeBidangModal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Jurusan -->
    <div id="jurusanModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
        <div
            class="modal-content bg-white rounded-lg shadow-lg w-1/3 transform transition-all duration-500 ease-in-out opacity-0 translate-y-10 scale-95">
            <form id="jurusanForm">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4" id="jurusanModalLabel">Add New Jurusan</h2>
                    <input type="hidden" id="jurusanId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Jurusan Name</label>
                        <input type="text" id="jurusanName" name="name"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Save</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                            id="closeJurusanModal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            var selectedBidangId = null; // Track the selected bidang

            // Function to show the modal with smooth transition
            function showModal(modalId) {
                $(modalId).removeClass('hidden'); // Show the modal container
                setTimeout(function() {
                    $(modalId).find('.modal-content').removeClass('opacity-0 translate-y-10 scale-95')
                        .addClass('opacity-100 translate-y-0 scale-100');
                }, 100); // Delay for smoothness
            }

            // Function to hide the modal with smooth transition
            function hideModal(modalId) {
                $(modalId).find('.modal-content').removeClass('opacity-100 translate-y-0 scale-100')
                    .addClass('opacity-0 translate-y-10 scale-95');
                setTimeout(function() {
                    $(modalId).addClass('hidden'); // Hide the modal container
                }, 500); // Matches the transition duration
            }


            // Show and hide modals
            $('#addBidangBtn').on('click', function() {
                $('#bidangForm')[0].reset();
                $('#bidangId').val('');
                $('#bidangModalLabel').text('Add New Bidang');
                showModal('#bidangModal');
            });

            // Handle when 'Add New Jurusan' is clicked
            $('#addJurusanBtn').on('click', function() {
                $('#jurusanForm')[0].reset(); // Clear the form
                $('#jurusanId').val(''); // Ensure no previous jurusanId is set
                $('#jurusanModalLabel').text('Add New Jurusan');
                showModal('#jurusanModal');
            });

            $('#closeBidangModal').on('click', function() {
                hideModal('#bidangModal');
            });

            $('#closeJurusanModal').on('click', function() {
                hideModal('#jurusanModal');
            });

            $('#bidangForm').on('submit', function(e) {
                e.preventDefault();
                var name = $('#name').val();

                // Cek jika ada karakter spesial
                var specialCharPattern = /[^a-zA-Z0-9 ]/g;
                if (specialCharPattern.test(name)) {
                    showToast('error', 'Bidang name contains special characters!');
                    return; // Stop submission
                }

                var id = $('#bidangId').val();
                var url = id ? '/bidangs/' + id : '/bidangs';
                var method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (method === 'POST') {
                            $('#bidangTableBody').append(`
                    <tr data-id="${response.bidang.id}" class="selectBidang">
                        <td class="px-6 py-3 border-b">${response.bidang.name}</td>
                        <td class="px-6 py-3 border-b">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editBidang" data-id="${response.bidang.id}">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteBidang" data-id="${response.bidang.id}">Delete</button>
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2 manageJurusan" data-id="${response.bidang.id}">Manage</button>
                        </td>
                    </tr>
                `);
                            showToast('success', 'Bidang created successfully!');
                        } else {
                            const row = $(`tr[data-id="${id}"]`);
                            row.find('td').eq(0).text(response.bidang.name);
                            showToast('success', 'Bidang edited successfully!');
                        }
                        hideModal('#bidangModal');
                    }
                });
            });

            $('#jurusanForm').on('submit', function(e) {
                e.preventDefault();
                var name = $('#jurusanName').val();

                // Cek jika ada karakter spesial
                var specialCharPattern = /[^a-zA-Z0-9 ]/g;
                if (specialCharPattern.test(name)) {
                    showToast('error', 'Jurusan name contains special characters!');
                    return; // Stop submission
                }

                var id = $('#jurusanId').val();
                var url = id ? '/jurusans/' + id : '/jurusans';
                var method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: {
                        name: name,
                        bidang_id: selectedBidangId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (method === 'POST') {
                            $('#jurusanTableBody').append(`
                    <tr data-id="${response.jurusan.id}">
                        <td class="px-6 py-3 border-b">${response.jurusan.name}</td>
                        <td class="px-6 py-3 border-b">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editJurusan" data-id="${response.jurusan.id}">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteJurusan" data-id="${response.jurusan.id}">Delete</button>
                        </td>
                    </tr>
                `);
                            showToast('success', 'Jurusan created successfully!');
                        } else {
                            const row = $(`tr[data-id="${id}"]`);
                            row.find('td').eq(0).text(response.jurusan.name);
                            showToast('success', 'Jurusan edited successfully!');
                        }
                        hideModal('#jurusanModal');
                    }
                });
            });

            // Handle when 'Manage' button is clicked to select a bidang
            $('#bidangTableBody').on('click', '.manageJurusan', function() {
                selectedBidangId = $(this).data('id'); // Capture the selected bidang_id
                $('#jurusanTableBody').empty(); // Clear the jurusan list
                $('#jurusanSection').removeClass('hidden'); // Show jurusan section

                // Fetch jurusan based on the selected bidang
                $.get(`/bidangs/${selectedBidangId}/jurusan-data`, function(data) {
                    if (data.jurusans && data.jurusans.length > 0) {
                        data.jurusans.forEach(function(jurusan) {
                            $('#jurusanTableBody').append(`
                        <tr data-id="${jurusan.id}">
                            <td class="px-6 py-3 border-b">${jurusan.name}</td>
                            <td class="px-6 py-3 border-b">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editJurusan" data-id="${jurusan.id}">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteJurusan" data-id="${jurusan.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                        });
                    } else {
                        $('#jurusanTableBody').append(
                            `<tr><td class="px-6 py-3 border-b" colspan="2">No jurusan found for this bidang</td></tr>`
                        );
                    }
                }).fail(function() {
                    alert('Error loading jurusan data.');
                });
            });


            // Event for editing bidang
            $('#bidangTableBody').on('click', '.editBidang', function() {
                var id = $(this).data('id');
                $.get('/bidangs/' + id + '/edit', function(data) {
                    $('#bidangModalLabel').text('Edit Bidang'); // Change the modal title
                    $('#bidangId').val(data.id); // Set the ID in hidden input
                    $('#name').val(data.name); // Set the name in the input field
                    showModal('#bidangModal');
                }).fail(function() {
                    alert('Error loading bidang data.');
                });
            });

            // Handle jurusan edit
            $('#jurusanTableBody').on('click', '.editJurusan', function() {
                var id = $(this).data('id');
                $.get('/jurusans/' + id + '/edit', function(data) {
                    $('#jurusanModalLabel').text('Edit Jurusan');
                    $('#jurusanId').val(data.id); // Set the ID in hidden input
                    $('#jurusanName').val(data.name); // Set the jurusan name
                    showModal('#jurusanModal');
                }).fail(function() {
                    alert('Error loading jurusan data.');
                });
            });

            // Handle jurusan delete
            $('#jurusanTableBody').on('click', '.deleteJurusan', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this jurusan?')) {
                    $.ajax({
                        url: '/jurusans/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $(`tr[data-id="${id}"]`).fadeOut(300, function() {
                                $(this).remove();
                            });
                            showToast('success', 'Jurusan successfully deleted!');
                        },
                        error: function() {
                            alert('Error deleting jurusan.');
                            showToast('error',
                                'An error occurred while deleting the jurusan.');
                        }
                    });
                }
            });

            // Event for deleting bidang
            $('#bidangTableBody').on('click', '.deleteBidang', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this bidang?')) {
                    $.ajax({
                        url: '/bidangs/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $(`tr[data-id="${id}"]`).fadeOut(300, function() {
                                $(this).remove();
                            });
                            showToast('success', 'Bidang successfully deleted!');
                        }
                    });
                }
            });
        });
    </script>
@endsection

@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- Bidang List -->
            <div>
                <h1 class="text-2xl font-bold mb-4">Manage Bidang Fasilitas</h1>
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
                                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2 manageFacilities"
                                            data-id="{{ $bidang->id }}">Manage</button> <!-- Tombol Manage -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Facility List (related to selected Bidang) -->
            <div id="facilityContainer">
                <h1 class="text-2xl font-bold mb-4">Manage Fasilitas</h1>
                <div class="hidden" id="facilitySection">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6"
                        id="addFacilityBtn">+ Add New Facility</button>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 bg-gray-100">Facility Name</th>
                                    <th class="px-6 py-3 bg-gray-100">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="facilityTableBody">
                                <!-- Facility will be loaded dynamically -->
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

    <!-- Modal for Facility -->
    <div id="facilityModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
        <div
            class="modal-content bg-white rounded-lg shadow-lg w-1/3 transform transition-all duration-500 ease-in-out opacity-0 translate-y-10 scale-95">
            <form id="facilityForm">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4" id="facilityModalLabel">Add New Facility</h2>
                    <input type="hidden" id="facilityId">
                    <input type="hidden" id="fasilitasBidangId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Facility Name</label>
                        <input type="text" id="facilityName" name="name"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Save</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                            id="closeFacilityModal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            var selectedBidangId = null;

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
            // Show modals
            $('#addBidangBtn').on('click', function() {
                $('#bidangForm')[0].reset();
                $('#bidangId').val('');
                $('#bidangModalLabel').text('Add New Bidang');
                showModal('#bidangModal');
            });

            $('#addFacilityBtn').on('click', function() {
                $('#facilityForm')[0].reset();
                $('#facilityId').val('');
                $('#facilityModalLabel').text('Add New Facility');
                showModal('#facilityModal');
            });

            $('#closeBidangModal').on('click', function() {
                hideModal('#bidangModal');
            });

            $('#closeFacilityModal').on('click', function() {
                hideModal('#facilityModal');
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
                var url = id ? '/fasilitas-bidangs/' + id : '/fasilitas-bidangs';
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
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2 manageFacilities" data-id="${response.bidang.id}">Manage</button>
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

            // Handle editing a bidang
            $('#bidangTableBody').on('click', '.editBidang', function() {
                var id = $(this).data('id');
                $.get('/fasilitas-bidangs/' + id + '/edit', function(response) {
                    $('#bidangModalLabel').text('Edit Bidang');
                    $('#bidangId').val(response.id); // Set the ID of the Bidang
                    $('#name').val(response.name); // Populate the name field with the Bidang's name
                    showModal('#bidangModal'); // Show the modal
                });
            });


            // Handle deleting a bidang
            $('#bidangTableBody').on('click', '.deleteBidang', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this bidang?')) {
                    $.ajax({
                        url: '/fasilitas-bidangs/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $(`tr[data-id="${id}"]`).remove();
                            showToast('success', 'Bidang deleted successfully!');
                        }
                    });
                }
            });

            $('#facilityForm').on('submit', function(e) {
                e.preventDefault();
                var name = $('#facilityName').val();

                // Cek jika ada karakter spesial
                var specialCharPattern = /[^a-zA-Z0-9 ]/g;
                if (specialCharPattern.test(name)) {
                    showToast('error', 'Facility name contains special characters!');
                    return; // Stop submission
                }

                var id = $('#facilityId').val();
                var url = id ? '/facilities/' + id : '/facilities';
                var method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: {
                        name: name,
                        fasilitas_bidang_id: selectedBidangId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (method === 'POST') {
                            $('#facilityTableBody').append(`
                    <tr data-id="${response.facility.id}">
                        <td class="px-6 py-3 border-b">${response.facility.name}</td>
                        <td class="px-6 py-3 border-b">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editFacility" data-id="${response.facility.id}">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteFacility" data-id="${response.facility.id}">Delete</button>
                        </td>
                    </tr>
                `);
                            showToast('success', 'Facility created successfully!');
                        } else {
                            const row = $(`tr[data-id="${id}"]`);
                            row.find('td').eq(0).text(response.facility.name);
                            showToast('success', 'Facility edited successfully!');
                        }
                        hideModal('#facilityModal');
                    }
                });
            });


            // Fetch and manage facilities related to selected bidang
            $('#bidangTableBody').on('click', '.manageFacilities', function() {
                selectedBidangId = $(this).data('id');
                $('#facilityTableBody').empty();
                $('#facilitySection').removeClass('hidden');

                $.get(`/fasilitas-bidangs/${selectedBidangId}/facilities`, function(data) {
                    if (data.facilities.length > 0) {
                        data.facilities.forEach(function(facility) {
                            $('#facilityTableBody').append(`
        <tr data-id="${facility.id}">
            <td class="px-6 py-3 border-b">${facility.name}</td>
            <td class="px-6 py-3 border-b">
                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2 editFacility" data-id="${facility.id}">Edit</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteFacility" data-id="${facility.id}">Delete</button>
            </td>
        </tr>
    `);
                        });
                    } else {
                        $('#facilityTableBody').append(
                            `<tr><td class="px-6 py-3 border-b" colspan="2">No facilities found for this bidang</td></tr>`
                        );
                    }
                });
            });

            // Handle editing a facility
            $('#facilityTableBody').on('click', '.editFacility', function() {
                var id = $(this).data('id');
                $.get('/facilities/' + id + '/edit', function(response) {
                    $('#facilityModalLabel').text('Edit Facility');
                    $('#facilityId').val(response.id); // Set the ID of the facility
                    $('#facilityName').val(response
                        .name); // Populate the name field with the Facility's name
                    showModal('#facilityModal'); // Show the modal
                });
            });


            // Handle deleting a facility
            $('#facilityTableBody').on('click', '.deleteFacility', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this facility?')) {
                    $.ajax({
                        url: '/facilities/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $(`tr[data-id="${id}"]`).remove();
                            showToast('success', 'Facility deleted successfully!');
                        }
                    });
                }
            });

        });
    </script>
@endsection

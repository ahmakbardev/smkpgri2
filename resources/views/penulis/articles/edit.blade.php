@extends('penulis.layouts.layout')

@section('penulis-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Article</h1>

        <form action="{{ route('penulis.articles.update', $article->id) }}" class="flex w-full gap-8" method="POST"
            id="articleForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 w-3/5 gap-6">
                <!-- Left Column -->
                <div class="col-span-2">
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>

                    <!-- Content Input -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" name="content" rows="5"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>{{ old('content', $article->content) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Sticky Right Column -->
            <div class="w-2/5 sticky top-32">
                <!-- Category Select -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category_id"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags Input -->
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                    <div class="relative">
                        <input type="text" id="tagInput" placeholder="Enter a tag"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <ul id="tagSuggestions"
                            class="absolute bg-white border border-gray-300 rounded-md mt-1 max-h-48 overflow-auto hidden w-full z-50">
                            <!-- Search suggestions will appear here -->
                        </ul>
                    </div>
                    <!-- Container for displaying added tags -->
                    <div id="tagContainer" class="mt-2 flex flex-wrap space-x-2">
                        @foreach ($article->tags as $tag)
                            <span class="bg-blue-500 text-white px-2 py-1 rounded-full flex items-center space-x-2">
                                {{ $tag->name }}
                                <button type="button" class="ml-2 text-white removeTag" data-id="{{ $tag->id }}"
                                    data-name="{{ $tag->name }}">✕</button>
                            </span>
                        @endforeach
                    </div>
                    <!-- Hidden input field to store selected tag IDs and new tags -->
                    <input type="hidden" name="existing_tags" id="existingTagsInput"
                        value="{{ implode(',', $article->tags->pluck('id')->toArray()) }}">
                    <input type="hidden" name="new_tags" id="newTagsInput">
                    <input type="hidden" name="removed_tags" id="removedTagsInput">
                </div>

                <!-- HTML Lang Input -->
                <div class="mb-4">
                    <label for="html_lang" class="block text-sm font-medium text-gray-700">HTML Lang</label>
                    <input type="text" id="html_lang" name="html_lang"
                        value="{{ old('html_lang', $article->html_lang) }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Description Textarea -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $article->description) }}</textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="images" class="block text-sm font-medium text-gray-700">Upload Image</label>
                    <div id="drop-area"
                        class="border-2 border-dashed border-gray-300 p-4 rounded-lg text-center cursor-pointer">
                        <p class="text-gray-500">Drag & drop images, or <span class="text-blue-500 underline">browse</span>
                        </p>
                        <input type="file" id="image-upload" name="images" class="hidden" accept="image/*">
                    </div>
                    <div id="preview-container" class="mt-4 {{ $article->images ? '' : 'hidden' }}">
                        <img id="preview-image"
                            src="{{ $article->images ? asset('storage/' . str_replace('storage/', '', $article->images)) : '' }}"
                            alt="Image Preview" class="w-full h-auto rounded">
                        <p id="file-name" class="text-sm text-gray-600">{{ basename($article->images) }}</p>
                        <button type="button" id="remove-image" class="mt-2 text-red-500 underline">Remove</button>
                    </div>

                </div>

                <!-- Alt Text Input -->
                <div class="mb-4">
                    <label for="alt" class="block text-sm font-medium text-gray-700">Alt Text</label>
                    <input type="text" id="alt" name="alt" value="{{ old('alt', $article->alt) }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 w-full rounded shadow">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script>
        var uploadImageCK = "{{ route('penulis.article.upload') }}?_token={{ csrf_token() }}";

        // Initialize CKEditor for 'content' textarea
        CKEDITOR.ClassicEditor.create(document.querySelector('#content'), {
            toolbar: {
                items: [
                    "findAndReplace", "selectAll", "|",
                    "heading", "|",
                    "fontSize", "fontFamily", "fontColor", "fontBackgroundColor", "highlight", "|",
                    "bulletedList", "numberedList", "todoList", "|",
                    "outdent", "indent", "|",
                    "undo", "redo", "|",
                    "specialCharacters", "horizontalLine", "|",
                    "link", "insertImage", "blockQuote", "insertTable", "mediaEmbed",
                    "-",
                    "alignment", "|",
                    "bold", "italic", "strikethrough", "underline", "code", "subscript", "superscript",
                    "removeFormat", "|",
                    "exportPDF", "exportWord", "|"
                ],
                shouldNotGroupWhenFull: true
            },
            removePlugins: [
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'WebSocketGateway'
            ],
            ckfinder: {
                uploadUrl: uploadImageCK,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            },
            mediaEmbed: {
                previewsInData: true
            }
        }).then(editor => {
            editor.ui.view.editable.element.style.minHeight = "200px";
            editor.ui.view.editable.element.style.borderBottomLeftRadius = "15px";
            editor.ui.view.editable.element.style.borderBottomRightRadius = "15px";
            editor.ui.view.editable.element.closest('.ck-editor').style.borderRadius = "15px";

            // Sinkronisasi data CKEditor ke textarea
            document.getElementById('articleForm').addEventListener('submit', function(event) {
                document.querySelector('#content').value = editor.getData();
            });
        }).catch(error => {
            console.error(error);
        });
    </script>
    <style>
        #drop-area.dragover {
            background-color: #f0f4ff;
            border-color: #3b82f6;
        }

        #preview-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }


        .ck-editor__editable {
            border-bottom-left-radius: 15px !important;
            border-bottom-right-radius: 15px !important;
            min-height: 200px;
        }

        .ck-toolbar {
            background: #F2F4F7 !important;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            let selectedTags = {!! json_encode($article->tags->pluck('id')->toArray()) !!}; // Tag ID yang sudah ada
            let tagNames = {!! json_encode($article->tags->pluck('name')->toArray()) !!}; // Nama tag yang sudah ada
            let newTags = []; // Tag baru
            let removedTags = []; // Tag yang dihapus

            function addTag(tagId, tagName, isNew = false) {
                if (tagNames.includes(tagName)) {
                    alert("Tag sudah ditambahkan!");
                    return;
                }

                if (isNew) {
                    newTags.push(tagName); // Tambahkan ke array tag baru
                    tagId = tagName; // Gunakan nama sebagai ID sementara
                } else {
                    selectedTags.push(tagId); // Tambahkan ke array tag yang ada
                }
                tagNames.push(tagName); // Tambahkan ke array nama tag

                // Tampilkan tag sebagai badge
                let tagBadge = `
            <span class="bg-blue-500 text-white px-2 py-1 rounded-full flex items-center space-x-2">
                ${tagName}
                <button type="button" class="ml-2 text-white removeTag" data-id="${tagId}" data-name="${tagName}">✕</button>
            </span>
        `;

                $('#tagContainer').append(tagBadge);

                // Perbarui input tersembunyi
                $('#existingTagsInput').val(selectedTags.join(','));
                $('#newTagsInput').val(newTags.join(','));

                // Reset input tag dan sembunyikan saran
                $('#tagInput').val('');
                $('#tagSuggestions').empty().hide();
            }

            // Cari tag yang ada atau tampilkan opsi untuk menambahkan tag baru
            $('#tagInput').on('input', function() {
                const searchTerm = $(this).val().trim();
                if (searchTerm.length > 1) {
                    $.ajax({
                        url: '/tags/search',
                        method: 'GET',
                        data: {
                            query: searchTerm
                        },
                        success: function(response) {
                            $('#tagSuggestions').empty();
                            if (response.tags.length > 0) {
                                response.tags.forEach(tag => {
                                    $('#tagSuggestions').append(`
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100" data-id="${tag.id}" data-name="${tag.name}">
                                    ${tag.name}
                                </li>
                            `);
                                });
                            } else {
                                $('#tagSuggestions').append(`
                            <li class="px-4 py-2 cursor-pointer bg-blue-500 text-white" data-id="new" data-name="${searchTerm}">
                                Add "${searchTerm}" as a new tag
                            </li>
                        `);
                            }
                            $('#tagSuggestions').show();
                        },
                        error: function() {
                            console.error("Error fetching tags");
                        }
                    });
                } else {
                    $('#tagSuggestions').empty().hide();
                }
            });

            // Pilih tag dari dropdown atau tambahkan tag baru
            $('#tagSuggestions').on('click', 'li', function() {
                const tagId = $(this).data('id');
                const tagName = $(this).data('name');
                const isNew = tagId === 'new'; // Apakah tag baru?
                addTag(tagId, tagName, isNew);
            });

            // Tambahkan tag baru dengan tombol Enter
            $('#tagInput').on('keypress', function(e) {
                if (e.which == 13 && $(this).val().trim()) { // Tekan Enter
                    e.preventDefault();
                    const tagName = $(this).val().trim();
                    addTag(null, tagName, true); // Tambahkan sebagai tag baru
                }
            });

            // Hapus tag
            $('#tagContainer').on('click', '.removeTag', function() {
                const tagId = $(this).data('id');
                const tagName = $(this).data('name');

                selectedTags = selectedTags.filter(id => id !== tagId); // Hapus dari array tag yang ada
                newTags = newTags.filter(name => name !== tagName); // Hapus dari array tag baru
                tagNames = tagNames.filter(name => name !== tagName); // Hapus dari array nama tag

                // Jika tag yang dihapus adalah tag lama, tambahkan ke array removedTags
                if (tagId !== tagName) {
                    removedTags.push(tagId);
                }

                $('#removedTagsInput').val(removedTags.join(',')); // Perbarui input untuk tag yang dihapus

                $(this).parent().remove(); // Hapus badge dari DOM
                $('#existingTagsInput').val(selectedTags.join(',')); // Perbarui input untuk tag yang ada
                $('#newTagsInput').val(newTags.join(',')); // Perbarui input untuk tag baru
            });
        });5
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('image-upload');
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            const fileName = document.getElementById('file-name');
            const removeImageBtn = document.getElementById('remove-image');

            // Trigger file input when clicking on drop area
            dropArea.addEventListener('click', () => fileInput.click());

            // Handle file selection
            fileInput.addEventListener('change', handleFiles);

            // Drag-and-drop events
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
                dropArea.addEventListener(event, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(event => {
                dropArea.addEventListener(event, () => dropArea.classList.add('dragover'), false);
            });

            ['dragleave', 'drop'].forEach(event => {
                dropArea.addEventListener(event, () => dropArea.classList.remove('dragover'), false);
            });

            dropArea.addEventListener('drop', (e) => {
                const files = e.dataTransfer.files;
                handleFiles({
                    target: {
                        files
                    }
                });
            });

            function handleFiles(event) {
                const files = event.target.files;
                if (files.length > 0) {
                    const file = files[0];
                    previewImage.src = URL.createObjectURL(file);
                    fileName.textContent = `${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
                    previewContainer.classList.remove('hidden');
                }
            }

            // Remove image preview
            removeImageBtn.addEventListener('click', () => {
                previewContainer.classList.add('hidden');
                previewImage.src = '';
                fileName.textContent = '';
                fileInput.value = '';
            });
        });
    </script>
@endsection

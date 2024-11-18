@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Sejarah Sekolah</h1>

        <form action="{{ route('school_profile.store_or_update_sejarah') }}" method="POST" id="sejarahForm">
            @csrf
            <!-- CKEditor akan diinisialisasi di #sejarah-editor dengan nilai dari database jika ada -->
            <textarea id="sejarah-editor">{{ $schoolProfile->sejarah ?? '' }}</textarea>
            <!-- Textarea tersembunyi untuk menyimpan data dari CKEditor -->
            <textarea id="sejarah" name="sejarah" class="hidden">{{ $schoolProfile->sejarah ?? '' }}</textarea>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">Save</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for 'sejarah-editor' textarea
        CKEDITOR.ClassicEditor.create(document.querySelector('#sejarah-editor'), {
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
                uploadUrl: "{{ route('penulis.article.upload') }}?_token={{ csrf_token() }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            },
            mediaEmbed: {
                previewsInData: true
            }
        }).then(editor => {
            editor.ui.view.editable.element.style.minHeight = "300px";
            editor.ui.view.editable.element.style.borderBottomLeftRadius = "15px";
            editor.ui.view.editable.element.style.borderBottomRightRadius = "15px";
            editor.ui.view.editable.element.closest('.ck-editor').style.borderRadius = "15px";

            // Set editor content if already exists in hidden field
            editor.setData(document.querySelector('#sejarah').value);

            // Sync CKEditor data with hidden textarea on form submission
            document.getElementById('sejarahForm').addEventListener('submit', function(event) {
                document.querySelector('#sejarah').value = editor
            .getData(); // Set CKEditor data to hidden textarea
            });
        }).catch(error => {
            console.error(error);
        });
    </script>
    <style>
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
@endsection

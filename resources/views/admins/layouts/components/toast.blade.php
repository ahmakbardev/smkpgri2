<div id="toastContainer" class="fixed top-5 right-5 z-50 space-y-3">
    @if (session('success'))
        <div class="my-toast bg-green-500 text-white px-6 py-4 rounded shadow-md flex items-center space-x-2 opacity-0 transform -translate-y-10 transition-all duration-500"
            id="toast-success">
            <span>{{ session('success') }}</span>
            <button onclick="hideToast('toast-success')" class="focus:outline-none text-white">✕</button>
        </div>
    @endif

    @if (session('error'))
        <div class="my-toast bg-red-500 text-white px-6 py-4 rounded shadow-md flex items-center space-x-2 opacity-0 transform -translate-y-10 transition-all duration-500"
            id="toast-error">
            <span>{{ session('error') }}</span>
            <button onclick="hideToast('toast-error')" class="focus:outline-none text-white">✕</button>
        </div>
    @endif
</div>
<script>
    $(document).ready(function() {
        // Animasi untuk toast yang ada saat halaman dimuat
        $('.my-toast').each(function() {
            const $toast = $(this);
            playNotificationSound('{{ session('success') ? 'success' : 'error' }}');
            // Mainkan suara sesuai jenis notifikasi
            setTimeout(function() {
                $toast.removeClass('opacity-0 -translate-y-10').addClass(
                    'opacity-100 translate-y-0'); // Tampilkan dengan transisi
            }, 500); // Delay sebelum tampil
            setTimeout(function() {
                hideToast($toast.attr('id')); // Auto-hide setelah 5 detik
            }, 5000); // Durasi tampil 5 detik
        });
    });

    // Fungsi untuk membuat toast baru secara dinamis dari JS (AJAX)
    function showToast(type, message) {
        const toastId = `toast-${Math.random().toString(36).substr(2, 9)}`;
        const toastHtml = `
            <div id="${toastId}" class="my-toast bg-${type === 'success' ? 'green' : 'red'}-500 text-white px-6 py-4 rounded shadow-md flex items-center space-x-2 opacity-0 transform -translate-y-10 transition-all duration-500">
                <span>${message}</span>
                <button onclick="hideToast('${toastId}')" class="focus:outline-none text-white">✕</button>
            </div>
        `;
        $('#toastContainer').append(toastHtml);
        const $newToast = $('#' + toastId);
        playNotificationSound(type); // Mainkan suara berdasarkan tipe ('success' atau 'error')
        setTimeout(function() {
            $newToast.removeClass('opacity-0 -translate-y-10').addClass(
                'opacity-100 translate-y-0'); // Tampilkan dengan transisi smooth
        }, 100); // Delay untuk transisi masuk
        setTimeout(function() {
            hideToast(toastId); // Auto-hide setelah 5 detik
        }, 5000);
    }

    // Fungsi untuk menyembunyikan toast
    function hideToast(id) {
        const $toast = $('#' + id);
        $toast.removeClass('opacity-100 translate-y-0').addClass('opacity-0 -translate-y-10'); // Transisi keluar
        setTimeout(function() {
            $toast.remove(); // Hapus element setelah transisi selesai
        }, 500); // Durasi transisi keluar
    }

    // Fungsi untuk memainkan suara notifikasi
    function playNotificationSound(type) {
        let audio;
        if (type === 'success') {
            audio = new Audio('{{ asset('assets/sounds/success.mp3') }}'); // Suara untuk notifikasi sukses
        } else if (type === 'error') {
            audio = new Audio('{{ asset('assets/sounds/error.mp3') }}'); // Suara untuk notifikasi error
        }
        audio.play();
    }
</script>

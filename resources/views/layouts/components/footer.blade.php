<footer class="bg-[#139a4a] text-white py-6 mt-10">
    <div class="container mx-auto px-4">
        <div class="flex justify-between">
            <div>
                <h4 class="text-lg font-semibold">Brand</h4>
                <p class="mt-2 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold">Links</h4>
                <ul class="mt-2">
                    <li><a href="{{ url('/') }}" class=" hover:text-white">Home</a></li>
                    <li><a href="{{ url('/about') }}" class=" hover:text-white">About</a></li>
                    <li><a href="{{ url('/services') }}" class=" hover:text-white">Services</a></li>
                    <li><a href="{{ url('/contact') }}" class=" hover:text-white">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold">Contact Us</h4>
                <p class="mt-2 ">Email: info@example.com</p>
                <p class="">Phone: +123 456 7890</p>
            </div>
        </div>
        <div class="mt-6 text-center ">
            &copy; {{ date('Y') }} Brand. All rights reserved.
        </div>
    </div>
</footer>

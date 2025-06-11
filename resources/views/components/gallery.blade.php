<section class="py-20 bg-gradient-to-t from-neutral-200 to-neutral-100">
    <h2 class="text-shadow-md text-3xl md:text-3xl font-extrabold text-center text-gray-800 mb-5">
        Gallery Snaptures Studio</h2>
    <div class="flex items-center justify-center py-4 md:py-5 sm:py-3 flex-wrap">
        <button type="button" data-filter="all"
            class="filter-btn text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-2xl text-base font-md px-5 md:px-3 sm:px-2 sm:text-sm py-2.5 text-center me-3 mb-3">All
        </button>
        <button type="button" data-filter="selfphoto"
            class="filter-btn text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-2xl text-base font-md px-5 md:px-3 sm:px-2 sm:text-sm py-2.5 text-center me-3 mb-3">Self
            Photo</button>
        <button type="button" data-filter="photostudio"
            class="filter-btn text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-2xl text-base font-md px-5 md:px-3 sm:px-2 sm:text-sm py-2.5 text-center me-3 mb-3">Photo
            Studio</button>
        <button type="button" data-filter="pasphoto"
            class="filter-btn text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-2xl text-base font-md px-5 md:px-3 sm:px-2 sm:text-sm py-2.5 text-center me-3 mb-3">Pas
            Photo</button>
    </div>
    {{-- Gallery --}}
    <div class="flex flex-wrap justify-center gap-3 px-3 md:px-20 py-4">
        <!-- Card 1 -->
        <div class="filter-item" data-category="selfphoto">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s1.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="filter-item" data-category="selfphoto">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s2.jpeg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="shoes">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s3.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="photostudio">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s4.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Photo Studio</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="shoes">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s1.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="pasphoto">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/firman.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Pas Photo</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="shoes">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s5.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="shoes">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100">
                <img src="{{ asset('img/s6.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Fullscreen -->
    <div id="imageModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
        <span id="closeModal"
            class="absolute top-6 p-1 bg-red-300 hover:bg-red-500 right-6 text-white text-2xl font-bold cursor-pointer select-none">&times;</span>
        <img id="modalImage" class="max-w-3xl max-h-[90vh] rounded-lg shadow-lg shadow-white border-black border"
            src="" alt="Full Image">
    </div>

    <script>
        const filterButtons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.filter-item');
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');

        // Filtering logic
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filterValue = button.getAttribute('data-filter');

                items.forEach(item => {
                    const category = item.getAttribute('data-category');
                    item.style.display = (filterValue === 'all' || category === filterValue) ?
                        'block' : 'none';
                });
            });
        });

        // Open modal on image click
        items.forEach(item => {
            const img = item.querySelector('img');
            img.addEventListener('click', () => {
                modalImg.src = img.src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        // Close modal
        closeModal.addEventListener('click', () => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });

        // Close modal on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        });
    </script>
</section>

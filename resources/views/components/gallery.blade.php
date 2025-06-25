@props(['items'])

<section class="py-20 bg-gradient-to-t from-neutral-200 to-neutral-100">
    <h2 class="text-shadow-md text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-8">
        Gallery Snapstures Studio
    </h2>

    <!-- Filter Buttons -->
    <div class="flex items-center justify-center flex-wrap gap-3 mb-10">
        @foreach (['all' => 'All', 'selfphoto' => 'Self Photo', 'photostudio' => 'Photo Studio', 'pasphoto' => 'Pas Photo'] as $filter => $label)
            <button type="button" data-filter="{{ $filter }}"
                class="filter-btn text-blue-700 border border-blue-600 bg-white hover:bg-blue-700 hover:text-white px-4 py-2 rounded-full text-sm font-medium shadow-sm transition duration-200">
                {{ $label }}
            </button>
        @endforeach
    </div>

    <!-- Gallery Cards -->
    <div class="flex flex-wrap justify-center gap-5 px-4 md:px-10">
        @foreach ($items as $item)
            <div class="filter-item w-64 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 transition transform hover:-translate-y-1 hover:shadow-xl duration-300"
                data-category="{{ $item->kategori }}">
                <div class="aspect-[3/4] w-full">
                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}"
                        class="w-full h-full object-cover cursor-pointer transition duration-300 hover:opacity-90">
                </div>
                <div class="p-2 text-center">
                    <p class="text-sm font-semibold text-gray-800">{{ $item->judul }}</p>
                    <p class="text-xs text-gray-500 capitalize">{{ $item->kategori }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
        <span id="closeModal"
            class="absolute top-6 right-6 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-lg font-bold cursor-pointer">&times;</span>
        <img id="modalImage" class="max-w-3xl max-h-[90vh] rounded-lg shadow-lg border-4 border-white" src=""
            alt="Full Image">
    </div>

    <!-- JS Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const items = document.querySelectorAll('.filter-item');
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeModal = document.getElementById('closeModal');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');
                    items.forEach(item => {
                        const cat = item.getAttribute('data-category');
                        item.style.display = (filter === 'all' || cat === filter) ?
                            'block' : 'none';
                    });
                });
            });

            items.forEach(item => {
                const img = item.querySelector('img');
                img.addEventListener('click', () => {
                    modalImg.src = img.src;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            closeModal.addEventListener('click', () => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</section>

<div class="flex flex-wrap justify-center gap-6 px-6 md:px-16">
    @foreach ($propertis as $item)
        <div class="filter-item w-56 bg-gray-100 border border-gray-300 shadow-md shadow-black rounded-xl overflow-hidden transition hover:shadow-lg"
            data-category="{{ $item->kategori }}">

            <!-- Gambar -->
            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}"
                class="w-full aspect-[3/4] object-cover cursor-pointer hover:opacity-90">

            <!-- Deskripsi -->
            <div class="p-3 text-center">
                <p class="text-sm font-semibold text-gray-800">{{ $item->judul }}</p>
                <p class="text-xs text-gray-500 capitalize">{{ $item->kategori }}</p>
            </div>
        </div>
    @endforeach
</div>

@if ($propertis->hasPages())
    <div class="mt-10 flex justify-center">
        {{ $propertis->links('pagination::tailwind') }}
    </div>
@endif

<!-- Modal Zoom -->
<div id="imageModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
    <button id="closeModal"
        class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center bg-red-300 text-gray-700 border border-gray-300 rounded-full shadow hover:bg-red-500 hover:text-white hover:border-red-500 transition duration-300 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <img id="modalImage" class="max-w-3xl max-h-[90vh] rounded-lg shadow-lg border-4 border-white" src=""
        alt="Preview">
</div>

<!-- Script Modal -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');

        document.querySelectorAll('.filter-item img').forEach(img => {
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

<section class="py-20 bg-gradient-to-t from-neutral-100 to-neutral-10">
    <h2 class="text-shadow-md text-3xl md:text-3xl font-extrabold text-center text-gray-800 mb-5">
        Background Snaptures Studio
    </h2>

    <div class="flex flex-wrap justify-center gap-3 px-3 md:px-20 py-4">
        <!-- Card 1 -->
        <div class="filter-item" data-category="background">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 cursor-pointer">
                <img src="img/bg1.jpg" alt="Background 1" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Background</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="background">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 cursor-pointer">
                <img src="img/bg2.jpg" alt="Background 1" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Background</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="background">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 cursor-pointer">
                <img src="img/bg3.jpg" alt="Background 1" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Background</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="background">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 cursor-pointer">
                <img src="img/bg4.jpg" alt="Background 1" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Background</p>
                </div>
            </div>
        </div>

        <div class="filter-item" data-category="background">
            <div class="w-72 rounded-xl overflow-hidden shadow-black shadow-md bg-gray-100 cursor-pointer">
                <img src="img/bg5.jpg" alt="Background 1" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Background</p>
                </div>
            </div>
        </div>

        <!-- Modal Fullscreen -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
            <span id="closeModal"
                class="absolute top-6 right-6 bg-red-500 hover:bg-red-700 text-white text-3xl font-bold rounded-full px-3 py-1 cursor-pointer select-none">
                &times;
            </span>
            <img id="modalImage"
                class="max-w-full max-h-screen rounded-lg shadow-lg transition duration-300 ease-in-out border-4 border-white"
                src="" alt="Fullscreen Image">
        </div>
</section>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const closeModal = document.getElementById("closeModal");

        // Select all images inside .filter-item
        const images = document.querySelectorAll(".filter-item img");

        images.forEach(img => {
            img.addEventListener("click", () => {
                modalImg.src = img.src;
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            });
        });

        closeModal.addEventListener("click", () => {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });

        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.remove("flex");
                modal.classList.add("hidden");
            }
        });
    });
</script>

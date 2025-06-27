@props(['items'])

<section class="py-20 bg-gradient-to-t from-neutral-200 to-neutral-100">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Background Snapstures Studio</h2>

    <!-- Filter Buttons -->
    <div class="flex items-center justify-center flex-wrap gap-3 mb-10">
        @foreach (['all' => 'All-bg', 'bg-selfphoto' => 'bg-Self Photo', 'bg-photostudio' => 'bg-Photo Studio', 'bg-pasphoto' => 'bg-Pas Photo'] as $filter => $label)
            <button type="button" data-filter="{{ $filter }}"
                class="filter-btn px-4 py-2 rounded-full text-sm font-medium border transition duration-200
                {{ $filter === 'all' ? 'bg-blue-700 text-white border-blue-700' : 'bg-white text-blue-600 border-blue-600 hover:bg-blue-700 hover:text-white hover:border-blue-700' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    <!-- Gallery Content to Replace -->
    <div id="gallery-content">
        @include('components.partials.background-item', ['backgrounds' => $items])
    </div>
</section>

<!-- JS: Filter + Pagination -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const galleryContent = document.getElementById("gallery-content");
        const filterButtons = document.querySelectorAll('.filter-btn');

        // Filter handling
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-700', 'text-white',
                        'border-blue-700');
                    btn.classList.add('bg-white', 'text-blue-600', 'border-blue-600');
                });

                button.classList.remove('bg-white', 'text-blue-600', 'border-blue-600');
                button.classList.add('bg-blue-700', 'text-white', 'border-blue-700');

                const filter = button.getAttribute('data-filter');
                const items = document.querySelectorAll('.filter-item');
                items.forEach(item => {
                    const category = item.getAttribute('data-category');
                    item.style.display = (filter === 'all' || filter === category) ?
                        'block' : 'none';
                });
            });
        });

        // AJAX Pagination
        galleryContent.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = e.target.closest('a').getAttribute('href');
                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        galleryContent.innerHTML = html;
                        window.scrollTo({
                            top: galleryContent.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    });
            }
        });
    });
</script>

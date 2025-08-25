<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyCars</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lenis@1.3.8/dist/lenis.min.js"></script>
    <script src="https://kit.fontawesome.com/35d8865ade.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: 'Open Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .font-heading {
            font-family: 'Montserrat', sans-serif;
        }

        .expandable-section {
            max-height: 500px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .expandable-section.expanded {
            max-height: 1000px;
        }

        .gallery-grid {
            display: grid;
            grid-column: 3;
            gap: 1rem;
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .theme-toggle {
            position: relative;
            display: inline-block;
        }

        .theme-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: var(--color-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .theme-dropdown.active {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav
        class="fixed top-6 left-1/2 -translate-x-1/2 
     bg-background/90 backdrop-blur-md border border-border 
     rounded-full shadow-lg px-6 py-2 z-50">
        <div class="flex items-center space-x-8">
            <h1 class="font-heading font-black text-xl text-foreground">OnlyCars</h1>
            <a href="#events" class="text-foreground hover:text-primary transition-colors">Events</a>
            <a href="#gallery" class="text-foreground hover:text-primary transition-colors">Gallery</a>
            <a href="#store" class="text-foreground hover:text-primary transition-colors">Store</a>

            <div class="theme-toggle relative">
                <button id="theme-toggle"
                    class="p-2 rounded-full bg-muted hover:bg-primary hover:text-primary-foreground transition-colors">
                    <svg id="theme-icon" class="w-5 h-5" fill="#f1f1f1" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="theme-dropdown" class="theme-dropdown"> <button data-theme="light"
                        class="block w-full text-left px-4 py-2 hover:bg-muted rounded-t-lg">Light</button> <button
                        data-theme="dark" class="block w-full text-left px-4 py-2 hover:bg-muted">Dark</button> <button
                        data-theme="system"
                        class="block w-full text-left px-4 py-2 hover:bg-muted rounded-b-lg">System</button>
                </div>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section style="background-image: url('img/hero.jpeg')"
        class="relative bg-cover bg-center min-h-screen flex items-center text-white">
        <!-- Gradient background behind content -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/50 to-black/10 z-0"></div>

        <!-- Content sits above gradient -->
        <div class="relative z-10 text-left px-24">
            <p class="text-xl mb-5">
                Since <span class="p-1 ">2012</span>
            </p>
            <h1 class="font-heading font-black text-5xl md:text-7xl mb-6">Komunitas Mobil<br>Indonesia</h1>
            <p class="text-xl md:text-2xl mb-8 font-medium">
                Gabung bareng komunitas otomotif, curahkan hobi kamu<br> dan rasakan serunya menjelajahi dunia mobil
                bersama.
            </p>
            <button
                class="bg-primary text-primary-foreground px-8 py-4 text-lg font-semibold hover:bg-opacity-90 transition-all transform ">
                Get Started
            </button>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-20 pb-30 bg-background relative">

        <div class="absolute inset-0 w-full flex justify-end">
            <img src="img/car.png" alt="" class="object-cover w-4xl h-full blur-xl">
        </div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative flex items-center flex-col">
            <div class="text-center mb-12">
                <h2 class="font-heading font-black text-4xl md:text-5xl text-foreground mb-4">Event Mendatang</h2>
                <p class="text-xl text-muted-foreground">Datang dan rasakan sendiri serunya meet up dan show mobil
                    komunitas onlycars</p>
            </div>

            <div id="events-content" class="relative expandable-section">
                <div class="w-full h-20 z-20 bg-gradient-to-t from-background to-transparent absolute bottom-0 left-0">
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach ($events as $ev)
                        <div class="bg-card rounded-sm border border-border  hover:shadow-lg transition-shadow overflow-hidden relative group"
                            x-data="{ openEdit{{ $ev->id }}: false }">


                            <button type="button" class="absolute top-3 right-10" aria-label="Edit Event"
                                @click="openEdit{{ $ev->id }} = true">
                                <i
                                    class="fa-solid fa-pen text-transparent cursor-pointer
                       hover:text-blue-900/50 transition-all
                       group-hover:text-black/30 duration-100"></i>
                            </button>


                            {{-- tombol delete --}}
                            <form action="{{ route('events.destroy', $ev->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus event ini?')" class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i
                                        class="fa-solid fa-trash text-transparent cursor-pointer 
                          hover:text-red-900/50 transition-all 
                          group-hover:text-black/30 duration-100"></i>
                                </button>
                            </form>

                            <img src="{{ asset('storage/' . $ev->img) }}" alt="{{ $ev->title }}"
                                class="w-full aspect-[16/9] object-cover mb-4">

                            <div class="p-6 pt-0">
                                <h3 class="font-heading font-bold text-xl text-card-foreground mb-2">
                                    {{ $ev->title }}
                                </h3>
                                <p class="text-muted-foreground mb-3">{{ $ev->desc }}</p>
                                <div class="flex items-center text-sm text-muted-foreground mb-4">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $ev->date }}</span>
                                </div>
                                <button
                                    class="bg-secondary cursor-pointer text-black px-4 py-2 hover:bg-opacity-90 transition-colors">
                                    Learn More
                                </button>
                            </div>
                            @include('events.edit', ['ev' => $ev])
                        </div>
                    @endforeach

                </div>
            </div>


            <div class="flex gap-3 text-center absolute mx-auto z-20 -bottom-16">
                <button id="events-toggle"
                    class="bg-transition border border-primary text-primary px-5 py-2 hover:bg-opacity-90 transition-colors">
                    Show More Events
                </button>

                @include('events.create')
            </div>
        </div>
    </section>





    <!-- Gallery Section -->
    <section id="gallery" class="bg-muted py-20 relative min-h-[15rem]">

        <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading font-black text-4xl md:text-5xl text-foreground mb-4">
                    Community Gallery
                </h2>
                <p class="text-xl text-muted-foreground">
                    Pamerkan mobil dan kagumi mahakarya otomotif milik orang lain
                </p>
            </div>

            <!-- Alpine state -->
            <div id="gallery-content" x-data="{ selectedImage: null }" class="expandable-section relative">

                <!-- gradient bawah -->
                <div
                    class="w-full h-30 z-20 bg-gradient-to-t from-muted via-muted/60 to-transparent absolute bottom-0 left-0">
                </div>

                <!-- masonry grid -->
                <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 mb-8">
                    @foreach ($galleries as $image)
                        <div class="mb-4 cursor-pointer relative group">

                            {{-- tombol delete --}}
                            <form action="{{ route('gallery.destroy', $image->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus foto ini?')" class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i
                                        class="fa-solid fa-trash text-transparent cursor-pointer 
                          hover:text-red-900/50 transition-all 
                          group-hover:text-black/30 duration-100"></i>
                                </button>
                            </form>

                            <img src="{{ asset('storage/' . $image['url']) }}" alt="Car Gallery"
                                @click="selectedImage = '{{ $image['url'] }}'"
                                class="rounded-lg shadow-lg w-full h-auto transition-transform" />
                        </div>
                    @endforeach
                </div>

                <!-- Popup / Lightbox -->
                <div x-show="selectedImage" x-cloak
                    class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                    @click.self="selectedImage = null">
                    <div class="relative">
                        <!-- Gambar dengan aspect ratio -->
                        <img :src="selectedImage" alt="Preview"
                            class="w-full max-h-[80vh] object-contain rounded-lg shadow-xl" />

                        <!-- Tombol Close di pojok gambar -->
                        <button" @click="selectedImage = null"
                            class="absolute top-2 right-2 bg-black/60 text-white
                            rounded-full p-2 hover:bg-black/80 transition">
                            ✕
                            </button>
                    </div>
                </div>



            </div>

            <div class="text-center mt-5 flex gap-3">
                <button id="gallery-toggle"
                    class="bg-transition border border-primary text-primary px-5 py-2 hover:bg-opacity-90 transition-colors">
                    Show More Photos
                </button>
                @include('gallery.create')
            </div>
        </div>
    </section>



    <!-- Store Section -->
    <section id="store" class="py-20 bg-background">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading font-black text-4xl md:text-5xl text-foreground mb-4">Community Merch</h2>
                <p class="text-xl text-muted-foreground">Dapatkan merchandise eksklusif dan keren</p>
            </div>

            <div id="store-content" class="expandable-section relative">

                <div class="w-full h-20 bg-gradient-to-t from-background to-transparent absolute z-20 bottom-0 left-0">
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    @foreach ($merchs as $m)
                        <div
                            class="bg-card rounded-sm border overflow-hidden relative group border-border hover:shadow-lg transition-shadow flex flex-col">

                            {{-- tombol delete --}}
                            <form action="{{ route('merchs.destroy', $m->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus produk ini?')"
                                class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i
                                        class="fa-solid fa-trash text-transparent cursor-pointer 
                          hover:text-red-900/50 transition-all 
                          group-hover:text-black/30 duration-100"></i>
                                </button>
                            </form>

                            <!-- dynamic image -->
                            <img src="{{ $m['img'] }}" alt="{{ $m['name'] }}"
                                class="w-full h-48 object-cover">

                            <div class="p-6 flex flex-col flex-1">
                                <!-- dynamic title & desc -->
                                <h3 class="font-heading font-bold text-lg text-card-foreground mb-2">
                                    {{ $m['name'] }}
                                </h3>
                                <p class="text-muted-foreground mb-3">{{ $m['desc'] }}</p>

                                <!-- price & rating -->
                                <div class="mt-auto flex items-center justify-between mb-4">
                                    {{-- Format harga jadi Rp 399.000 --}}
                                    <span class="text-2xl font-bold text-primary">
                                        Rp {{ number_format($m['price'], 0, ',', '.') }}
                                    </span>

                                    {{-- Convert rating angka ke bintang --}}
                                    <div class="flex text-yellow-400">
                                        {!! str_repeat('★', $m['rating']) !!}{!! str_repeat('☆', 5 - $m['rating']) !!}
                                    </div>
                                </div>

                                <!-- button always at bottom -->
                                <button
                                    class="w-full bg-secondary text-black py-2 hover:bg-opacity-90 transition-colors">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="text-center mt-5">
                <button id="store-toggle"
                    class="bg-transition border border-primary text-primary px-5 py-2 hover:bg-opacity-90 transition-colors">
                    Show More Products
                </button>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-card py-12 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-heading font-black text-2xl text-primary mb-4">RevUp</h3>
                    <p class="text-muted-foreground">Building the ultimate car community experience.</p>
                </div>
                <div>
                    <h4 class="font-heading font-bold text-lg text-card-foreground mb-4">Community</h4>
                    <ul class="space-y-2 text-muted-foreground">
                        <li><a href="#" class="hover:text-primary transition-colors">Events</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Gallery</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Forums</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-heading font-bold text-lg text-card-foreground mb-4">Support</h4>
                    <ul class="space-y-2 text-muted-foreground">
                        <li><a href="#" class="hover:text-primary transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-heading font-bold text-lg text-card-foreground mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-muted-foreground hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-muted-foreground hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-muted-foreground hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-border mt-8 pt-8 text-center text-muted-foreground">
                <p>&copy; 2024 RevUp Community. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <img id="lightbox-img" src="/placeholder.svg" alt="">
        <button id="lightbox-close"
            class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
    </div>

    <script>
        // Theme switching functionality
        const themeToggle = document.getElementById('theme-toggle');
        const themeDropdown = document.getElementById('theme-dropdown');
        const themeIcon = document.getElementById('theme-icon');
        const html = document.documentElement;

        // Initialize theme based on system preference
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'system';
            applyTheme(savedTheme);
        }

        function applyTheme(theme) {
            localStorage.setItem('theme', theme);

            if (theme === 'system') {
                const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                html.classList.toggle('dark', systemDark);
            } else {
                html.classList.toggle('dark', theme === 'dark');
            }

            updateThemeIcon(theme);
        }

        function updateThemeIcon(theme) {
            const isDark = html.classList.contains('dark');
            themeIcon.innerHTML = isDark ?
                '<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>' :
                '<path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>';
        }

        // Theme toggle dropdown
        themeToggle.addEventListener('click', () => {
            themeDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!themeToggle.contains(e.target) && !themeDropdown.contains(e.target)) {
                themeDropdown.classList.remove('active');
            }
        });

        // Theme selection
        document.querySelectorAll('[data-theme]').forEach(button => {
            button.addEventListener('click', () => {
                const theme = button.getAttribute('data-theme');
                applyTheme(theme);
                themeDropdown.classList.remove('active');
            });
        });

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (localStorage.getItem('theme') === 'system') {
                applyTheme('system');
            }
        });

        // Expandable sections functionality
        function setupExpandableSection(toggleId, contentId, showText, hideText) {
            const toggle = document.getElementById(toggleId);
            const content = document.getElementById(contentId);

            toggle.addEventListener('click', () => {
                content.classList.toggle('expanded');
                toggle.textContent = content.classList.contains('expanded') ? hideText : showText;
            });
        }

        setupExpandableSection('events-toggle', 'events-content', 'Show More Events', 'Show Less Events');
        setupExpandableSection('gallery-toggle', 'gallery-content', 'Show More Photos', 'Show Less Photos');
        setupExpandableSection('store-toggle', 'store-content', 'Show More Products', 'Show Less Products');

        // Gallery lightbox functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxClose = document.getElementById('lightbox-close');
        const galleryItems = document.querySelectorAll('.gallery-item img');

        galleryItems.forEach(img => {
            img.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightboxImg.alt = img.alt;
                lightbox.classList.add('active');
            });
        });

        lightboxClose.addEventListener('click', () => {
            lightbox.classList.remove('active');
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Initialize Lenis
        const lenis = new Lenis({
            autoRaf: true,
        });

        // Listen for the scroll event and log the event data
        lenis.on('scroll', (e) => {
            console.log(e);
        });

        // Initialize theme on page load
        initTheme();
    </script>
</body>

</html>

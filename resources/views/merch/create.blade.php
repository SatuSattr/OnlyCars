<!-- Modal Add Merchandise -->
<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true"
        class="bg-transition border border-primary text-primary cursor-pointer px-5 py-2 hover:bg-opacity-90 transition-colors">
        +
    </button>

    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 z-40 flex items-center justify-center bg-[#000000]/0 backdrop-blur-sm"
        x-transition>

        <!-- Modal Content -->
        <div class="bg-muted text-white w-full max-w-lg rounded-lg shadow-2xl border border-[#333333] p-6 relative z-50"
            @click.away="open = false">

            <!-- Header -->
            <div class="flex justify-between items-center pb-4 border-b border-[#333333]">
                <h2 class="text-xl font-bold text-[#ffffff]">Tambah Merchandise Baru</h2>
                <button @click="open = false"
                    class="text-[#9ca3af] hover:text-[#ef4444] text-2xl font-bold transition-colors">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('merchs.store') }}" method="POST" enctype="multipart/form-data"
                class="mt-6 space-y-5 flex flex-col justify-start">
                @csrf

                <!-- Name -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Nama</label>
                    <input type="text" name="name" placeholder="Masukkan nama merchandise"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                        required>
                </div>

                <!-- Description -->
                <div class="flex items-start space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0 pt-2">Deskripsi</label>
                    <textarea name="desc" rows="3" placeholder="Masukkan deskripsi merchandise"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors resize-none"></textarea>
                </div>

                <!-- Price -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Harga</label>
                    <input type="number" name="price" step="0.01" placeholder="0.00"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                        required>
                </div>

                <!-- Rating -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Rating</label>
                    <input type="number" name="rating" min="0" max="5" placeholder="0"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors">
                </div>

                <!-- Image -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Gambar</label>
                    <input type="file" name="img" accept="image/*"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors file:mr-3 file:py-1 file:px-3 file:rounded-sm file:border-0 file:bg-[#404040] file:text-[#ffffff] file:hover:bg-[#4a4a4a] file:transition-colors">
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" @click="open = false"
                        class="px-5 py-2 bg-[#374151] text-[#ffffff] hover:bg-[#4b5563] cursor-pointer transition-colors font-medium">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-primary text-white hover:bg-primary-foreground cursor-pointer transition-colors font-medium">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

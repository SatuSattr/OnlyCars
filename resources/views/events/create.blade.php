<!-- Modal Add Event -->
<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <!-- Changed rounded-md to rounded-sm for button -->
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
                <h2 class="text-xl font-bold text-[#ffffff]">Tambah Event Baru</h2>
                <button @click="open = false"
                    class="text-[#9ca3af] hover:text-[#ef4444] text-2xl font-bold transition-colors">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data"
                class="mt-6 space-y-5 flex flex-col justify-start">
                @csrf

                <!-- Title -->
                <!-- Changed layout to flex with label on left and added placeholder -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Judul</label>
                    <input type="text" name="title" placeholder="Masukkan judul event"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                        required>
                </div>

                <!-- Description -->
                <!-- Changed layout to flex with label on left and added placeholder -->
                <div class="flex items-start space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0 pt-2">Deskripsi</label>
                    <textarea name="desc" rows="3" placeholder="Masukkan deskripsi event"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors resize-none"
                        required></textarea>
                </div>

                <!-- Date -->
                <!-- Changed layout to flex with label on left -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Tanggal</label>
                    <input type="date" name="date"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                        required>
                </div>

                <!-- Image -->
                <!-- Changed layout to flex with label on left -->
                <div class="flex items-center space-x-4">
                    <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Gambar</label>
                    <input type="file" name="img" accept="image/*"
                        class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors file:mr-3 file:py-1 file:px-3 file:rounded-sm file:border-0 file:bg-[#404040] file:text-[#ffffff] file:hover:bg-[#4a4a4a] file:transition-colors"
                        required>
                </div>

                <!-- Action Buttons -->
                <!-- Changed rounded-md to rounded-sm for buttons -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" @click="open = false"
                        class=" px-5 py-2 bg-[#374151] text-[#ffffff] hover:bg-[#4b5563] cursor-pointer transition-colors font-medium">
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

{{-- Modal Edit Gallery --}}
<div x-show="openEdit{{ $gallery->id }}" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-[#000000]/50 backdrop-blur-sm" x-transition>
    <div class="bg-muted text-white w-full max-w-lg rounded-lg shadow-2xl border border-[#333333] p-6 relative z-50"
        @click.away="openEdit{{ $gallery->id }} = false">

        <!-- Header -->
        <div class="flex justify-between items-center pb-4 border-b border-[#333333]">
            <h2 class="text-xl font-bold text-[#ffffff]">Edit Gallery</h2>
            <button @click="openEdit{{ $gallery->id }} = false"
                class="text-[#9ca3af] hover:text-[#ef4444] text-2xl font-bold transition-colors">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-6 space-y-5 flex flex-col justify-start">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Judul</label>
                <input type="text" name="title" value="{{ $gallery->title }}" placeholder="Masukkan judul gambar"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                    required>
            </div>

            <!-- Current Image Preview -->
            <div class="flex items-start space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0 pt-2">Saat ini</label>
                <div class="flex-1">
                    <img src="{{ asset('storage/' . $gallery->url) }}" alt="{{ $gallery->title }}"
                        class="h-24 w-auto rounded border border-[#404040] object-cover">
                    <p class="text-xs text-[#9ca3af] mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                </div>
            </div>

            <!-- New Image -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Gambar Baru</label>
                <input type="file" name="url" accept="image/*"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors file:mr-3 file:py-1 file:px-3 file:rounded-sm file:border-0 file:bg-[#404040] file:text-[#ffffff] file:hover:bg-[#4a4a4a] file:transition-colors">
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" @click="openEdit{{ $gallery->id }} = false"
                    class="px-5 py-2 bg-[#374151] text-[#ffffff] hover:bg-[#4b5563] cursor-pointer transition-colors font-medium">
                    Batal
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-yellow-500 text-black hover:bg-yellow-600 cursor-pointer transition-colors font-medium">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Merchandise --}}
<div x-show="openEdit{{ $merch->id }}" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-[#000000]/50 backdrop-blur-sm" x-transition>
    <div class="bg-muted text-white w-full max-w-lg rounded-lg shadow-2xl border border-[#333333] p-6 relative z-50"
        @click.away="openEdit{{ $merch->id }} = false">

        <!-- Header -->
        <div class="flex justify-between items-center pb-4 border-b border-[#333333]">
            <h2 class="text-xl font-bold text-[#ffffff]">Edit Merchandise</h2>
            <button @click="openEdit{{ $merch->id }} = false"
                class="text-[#9ca3af] hover:text-[#ef4444] text-2xl font-bold transition-colors">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{ route('merchs.update', $merch->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-6 space-y-5 flex flex-col justify-start">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Nama</label>
                <input type="text" name="name" value="{{ $merch->name }}" placeholder="Masukkan nama merchandise"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                    required>
            </div>

            <!-- Description -->
            <div class="flex items-start space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0 pt-2">Deskripsi</label>
                <textarea name="desc" rows="3" placeholder="Masukkan deskripsi merchandise"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors resize-none">{{ $merch->desc }}</textarea>
            </div>

            <!-- Price -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Harga</label>
                <input type="number" name="price" step="0.01" value="{{ $merch->price }}"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors"
                    required>
            </div>

            <!-- Rating -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Rating</label>
                <input type="number" name="rating" min="0" max="5" value="{{ $merch->rating }}"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors">
            </div>

            <!-- Current image preview -->
            <div class="flex items-start space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0 pt-2">Saat ini</label>
                <div class="flex-1">
                    @if ($merch->img)
                        <img src="{{ asset('storage/' . $merch->img) }}" alt="{{ $merch->name }}"
                            class="h-24 w-auto rounded border border-[#404040] object-cover">
                        <p class="text-xs text-[#9ca3af] mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    @else
                        <p class="text-xs text-[#9ca3af] mt-1">Belum ada gambar.</p>
                    @endif
                </div>
            </div>

            <!-- New Image -->
            <div class="flex items-center space-x-4">
                <label class="font-medium text-sm text-[#e5e7eb] w-20 flex-shrink-0">Gambar Baru</label>
                <input type="file" name="img" accept="image/*"
                    class="flex-1 bg-[#2a2a2a] border border-[#404040] text-[#ffffff] rounded-sm px-3 py-2 focus:ring-2 focus:ring-[#2563eb] focus:border-[#2563eb] transition-colors file:mr-3 file:py-1 file:px-3 file:rounded-sm file:border-0 file:bg-[#404040] file:text-[#ffffff] file:hover:bg-[#4a4a4a] file:transition-colors">
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" @click="openEdit{{ $merch->id }} = false"
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

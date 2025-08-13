@extends('layouts.app')

@section('content')
<div class="py-6" x-data="{ showModal: false, editMode: false, formData: {} }">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        <!-- Daftar Jurusan -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Jurusan</h3>
                <button @click="showModal = true; editMode = false; formData = {}"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded font-medium">
                    Tambah Jurusan
                </button>
            </div>

            @if($jurusans->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Belum ada jurusan yang ditambahkan.</p>
            @else
                <ul class="divide-y divide-gray-300 dark:divide-gray-600">
                    @foreach ($jurusans as $jurusan)
                        <li class="py-4">
                            <div class="flex justify-between items-center space-x-4">
                                <div class="flex items-center space-x-4">
                                    @if ($jurusan->gambar)
                                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="Gambar {{ $jurusan->nama }}" class="w-24 h-24 object-cover rounded">
                                    @endif
                                    <div>
                                        <a href="{{ route('admin.jurusanDetail', $jurusan->id) }}"
                                           class="text-blue-600 dark:text-blue-400 hover:underline font-semibold text-lg">
                                            {{ $jurusan->nama }}
                                        </a>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ Str::limit($jurusan->deskripsi, 100) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button @click="showModal = true; editMode = true; formData = {{ Js::from($jurusan) }}"
                                       class="px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                                       Edit
                                    </button>
                                    <form action="{{ route('admin.hapusJurusan', $jurusan->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus jurusan ini?');">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <!-- Modal Form Tambah/Edit Jurusan -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
        <div class="bg-white dark:bg-gray-800 w-full max-w-4xl p-8 rounded-xl shadow-lg relative max-h-[95vh] overflow-y-auto">

            <!-- Tombol X Close -->
            <button @click="showModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-xl font-bold">
                &times;
            </button>

            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6" x-text="editMode ? 'Edit Jurusan' : 'Tambah Jurusan'"></h3>

            <form :action="editMode ? `/admin/jurusan/${formData.id}/update` : '{{ route('admin.simpanJurusan') }}'"
                  method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT" />
                </template>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Jurusan</label>
                    <input type="text" name="nama" x-model="formData.nama"
                        class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gaji Rata-Rata</label>
                    <input type="number" name="gaji_rata_rata" x-model="formData.gaji_rata_rata"
                        class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm" required>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                    <textarea name="deskripsi" x-model="formData.deskripsi" required rows="3"
                        class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran</label>
                    <textarea name="mata_pelajaran" x-model="formData.mata_pelajaran" required rows="3"
                        class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prospek Kerja</label>
                    <textarea name="prospek_kerja" x-model="formData.prospek_kerja" required rows="3"
                        class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Jurusan</label>
                    <input type="file" name="gambar"
                        class="mt-1 w-full text-sm text-gray-900 bg-white dark:bg-gray-700 dark:text-white border border-gray-300 dark:border-gray-600 rounded-md shadow-sm">
                </div>

                <div class="sm:col-span-2 flex justify-end gap-3 mt-2">
                    <button type="button" @click="showModal = false"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md shadow">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md shadow"
                        x-text="editMode ? 'Update' : 'Simpan'"></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

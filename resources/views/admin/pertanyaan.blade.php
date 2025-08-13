@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Panel Pertanyaan --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Daftar Pertanyaan</h3>
                <button onclick="toggleForm()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Pertanyaan
                </button>
            </div>

            @if ($pertanyaans->count())
                <ul class="space-y-4">
                    @foreach ($pertanyaans as $p)
                        <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md flex justify-between items-start">
                            <div>
                                <div class="text-gray-800 dark:text-white font-medium">{{ $p->teks }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    Jurusan: {{ $p->jurusan->nama }} | Level: {{ $p->level_penting }}
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="toggleEdit({{ $p->id }})"
                                    class="px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                                    Edit
                                </button>
                                <form action="{{ route('admin.hapusPertanyaan', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </li>

                        {{-- Modal Edit Pertanyaan --}}
                        <div id="editModal-{{ $p->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-xl relative">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Pertanyaan</h3>
                                    <button onclick="toggleEdit({{ $p->id }})"
                                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 text-xl">✕</button>
                                </div>

                                <form action="{{ route('admin.updatePertanyaan', $p->id) }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="teks-{{ $p->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teks Pertanyaan</label>
                                        <textarea id="teks-{{ $p->id }}" name="teks" required
                                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">{{ old('teks', $p->teks) }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jurusan_id-{{ $p->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Jurusan</label>
                                        <select id="jurusan_id-{{ $p->id }}" name="jurusan_id" required
                                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                                            @foreach ($jurusans as $jurusan)
                                                <option value="{{ $jurusan->id }}" {{ $jurusan->id == $p->jurusan_id ? 'selected' : '' }}>
                                                    {{ $jurusan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="level_penting-{{ $p->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Level Penting</label>
                                        <input type="number" id="level_penting-{{ $p->id }}" name="level_penting" min="1" max="5" required
                                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                            value="{{ old('level_penting', $p->level_penting) }}">
                                    </div>

                                    <div class="flex justify-end gap-2">
                                        <button type="button" onclick="toggleEdit({{ $p->id }})"
                                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600 dark:text-gray-300">Belum ada pertanyaan yang ditambahkan.</p>
            @endif
        </div>

        {{-- Modal Tambah Pertanyaan --}}
        <div id="formTambah" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-xl">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Pertanyaan</h3>
                    <button onclick="toggleForm()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 text-xl">✕</button>
                </div>

                <form action="{{ route('admin.simpanPertanyaan') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="teks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teks Pertanyaan</label>
                        <textarea id="teks" name="teks" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">{{ old('teks') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="jurusan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jurusan</label>
                        <select id="jurusan_id" name="jurusan_id" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="level_penting" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Level Penting</label>
                        <input type="number" id="level_penting" name="level_penting" min="1" max="5" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white" value="{{ old('level_penting') }}">
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="toggleForm()"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function toggleForm() {
        const form = document.getElementById('formTambah');
        form.classList.toggle('hidden');
    }

    function toggleEdit(id) {
        const modal = document.getElementById('editModal-' + id);
        modal.classList.toggle('hidden');
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
            document.querySelectorAll('.fixed.inset-0').forEach(el => {
                if (!el.classList.contains('hidden')) {
                    el.classList.add('hidden');
                }
            });
        }
    });
</script>
@endsection

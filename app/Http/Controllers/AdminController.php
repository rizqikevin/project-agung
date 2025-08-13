<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Pertanyaan;
use App\Models\Rekomendasi;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $this->authorizeAdmin();

        return view('admin.dashboard', [
            'totalPengguna' => Pengguna::count(),
            'totalSiswa' => Pengguna::where('peran', 'siswa')->count(),
            'totalJurusan' => Jurusan::count(),
            'totalPertanyaan' => Pertanyaan::count(),
        ]);
    }

    // ----------------------------
    // JURUSAN
    // ----------------------------

    public function kelolaJurusan()
    {
        $this->authorizeAdmin();

        $jurusans = Jurusan::all();
        return view('admin.jurusan', compact('jurusans'));
    }

    public function simpanJurusan(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mata_pelajaran' => 'required|string',
            'prospek_kerja' => 'required|string',
            'gaji_rata_rata' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan_images', 'public');
        }

        Jurusan::create($data);

        return redirect()->route('admin.kelolaJurusan')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function updateJurusan(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mata_pelajaran' => 'required|string',
            'prospek_kerja' => 'required|string',
            'gaji_rata_rata' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $data = $request->only(['nama', 'deskripsi', 'mata_pelajaran', 'prospek_kerja', 'gaji_rata_rata']);

        if ($request->hasFile('gambar')) {
            if ($jurusan->gambar) {
                Storage::disk('public')->delete($jurusan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('jurusan_images', 'public');
        }

        $jurusan->update($data);

        return redirect()->route('admin.kelolaJurusan')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function hapusJurusan($id)
    {
        $this->authorizeAdmin();

        $jurusan = Jurusan::findOrFail($id);

        if ($jurusan->gambar) {
            Storage::disk('public')->delete($jurusan->gambar);
        }

        $jurusan->delete();

        return redirect()->route('admin.kelolaJurusan')->with('success', 'Jurusan berhasil dihapus.');
    }

    public function jurusanDetail($id)
    {
        $this->authorizeAdmin();

        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan-detail', compact('jurusan'));
    }

    // ----------------------------
    // PERTANYAAN
    // ----------------------------

    public function kelolaPertanyaan()
    {
        $this->authorizeAdmin();

        $jurusans = Jurusan::all();
        $pertanyaans = Pertanyaan::with('jurusan')->get();

        return view('admin.pertanyaan', compact('jurusans', 'pertanyaans'));
    }

    public function simpanPertanyaan(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'teks' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'level_penting' => 'required|integer|min:1|max:5',
        ]);

        Pertanyaan::create($request->all());

        return redirect()->route('admin.kelolaPertanyaan')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function updatePertanyaan(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate([
            'teks' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'level_penting' => 'required|integer|min:1|max:5',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($request->only(['teks', 'jurusan_id', 'level_penting']));

        return redirect()->route('admin.kelolaPertanyaan')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function hapusPertanyaan($id)
    {
        $this->authorizeAdmin();

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('admin.kelolaPertanyaan')->with('success', 'Pertanyaan berhasil dihapus.');
    }

    // ----------------------------
    // HASIL REKOMENDASI
    // ----------------------------

  public function hasilRekomendasi()
{
    $this->authorizeAdmin();

    $rekomendasis = Rekomendasi::with(['siswa', 'jurusan'])->get();

    return view('admin.hasil-rekomendasi', compact('rekomendasis'));
}


    // ----------------------------
    // VALIDASI PERAN ADMIN
    // ----------------------------
    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || $user->peran !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
    }
public function hapusRekomendasi($id)
{
    $this->authorizeAdmin();

    $rekomendasi = \App\Models\Rekomendasi::findOrFail($id);
    $rekomendasi->delete();

    return redirect()->route('admin.hasilRekomendasi')->with('success', 'Data rekomendasi berhasil dihapus.');
}

public function grafikData()
{
    // Ambil semua jurusan
    $jurusans = Jurusan::all();

    // Hitung jumlah rekomendasi per jurusan
    $data = $jurusans->map(function ($jurusan) {
        $total = Rekomendasi::where('jurusan_id', $jurusan->id)->count();

        return [
            'jurusan' => $jurusan->nama,
            'total' => $total
        ];
    });

    // Cek apakah semua data totalnya nol
    $isDataEmpty = $data->sum('total') === 0;

    // Jika tidak ada data sama sekali, gunakan data contoh untuk demonstrasi
    if ($isDataEmpty) {
        $data = collect([
            ['jurusan' => 'Teknik Informatika', 'total' => 15],
            ['jurusan' => 'Desain Komunikasi Visual', 'total' => 10],
            ['jurusan' => 'Akuntansi', 'total' => 7],
            ['jurusan' => 'Manajemen Bisnis', 'total' => 12],
            ['jurusan' => 'Sastra Inggris', 'total' => 5],
        ]);
    }

    return response()->json($data);
}




}

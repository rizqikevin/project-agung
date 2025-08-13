<?php

namespace App\Http\Controllers;

use App\Models\{Jurusan, Jawaban, Rekomendasi, Pengguna};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function tampilForm(Request $request)
    {
        $siswa = Auth::user();
        if ($siswa->peran !== 'siswa') abort(403, 'Akses hanya untuk siswa.');

        if (!$siswa->nama_lengkap || !$siswa->nis || !$siswa->jenis_kelamin || !$siswa->asal_sekolah) {
            return view('siswa.biodata');
        }

        if (!$request->session()->has('soal_siswa')) {
            $pertanyaans = Jurusan::with('pertanyaans')
                ->get()
                ->pluck('pertanyaans')
                ->flatten()
                ->shuffle()
                ->values();

            $request->session()->put('soal_siswa', $pertanyaans);
            $request->session()->put('halaman_soal', 1);
        }

        $all = collect($request->session()->get('soal_siswa'));
        $page = $request->session()->get('halaman_soal');
        $perPage = 4;
        $chunk = $all->forPage($page, $perPage);
        $totalPage = ceil($all->count() / $perPage);

        if ($chunk->isEmpty()) {
            $semuaRekomendasi = $this->hitungSemuaRekomendasi($siswa);
            $rekomendasiUtama = $semuaRekomendasi->first();
            $request->session()->forget(['soal_siswa', 'halaman_soal']);
            return view('siswa.rekomendasi', compact('rekomendasiUtama', 'semuaRekomendasi'));
        }

        return view('siswa.form-paged', [
            'pertanyaans' => $chunk,
            'halaman' => $page,
            'totalHalaman' => $totalPage,
        ]);
    }

    public function kembaliHalaman(Request $request)
    {
        $current = $request->session()->get('halaman_soal', 1);
        $previous = max(1, $current - 1);
        $request->session()->put('halaman_soal', $previous);
        return redirect()->route('siswa.form');
    }

    public function kirimJawabanPerHalaman(Request $request)
    {
        $siswa = Auth::user();
        if ($siswa->peran !== 'siswa') abort(403);

        $request->validate([
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|string|in:Suka,Netral,Tidak Suka',
        ]);

        foreach ($request->jawaban as $pertanyaanId => $jawaban) {
            $nilai = match ($jawaban) {
                'Suka' => 3,
                'Netral' => 2,
                'Tidak Suka' => 1,
            };

            Jawaban::updateOrCreate(
                ['siswa_id' => $siswa->id, 'pertanyaan_id' => $pertanyaanId],
                ['jawaban' => $jawaban, 'nilai' => $nilai]
            );
        }

        $next = $request->session()->get('halaman_soal') + 1;
        $request->session()->put('halaman_soal', $next);

        return redirect()->route('siswa.form');
    }

    public function simpanBiodata(Request $request)
    {
        $siswa = Auth::user();
        if ($siswa->peran !== 'siswa') abort(403);

        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'nis'            => 'required|string|max:50',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah'   => 'required|string|max:255',
        ]);

        $siswa->update($request->only(['nama_lengkap', 'nis', 'jenis_kelamin', 'asal_sekolah']));
        return redirect()->route('siswa.form')->with('success', 'Biodata berhasil disimpan.');
    }

    public function jurusanDetail($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('siswa.jurusan-detail', compact('jurusan'));
    }

    private function hitungSemuaRekomendasi(Pengguna $siswa)
    {
        $jawabanGrouped = Jawaban::with('pertanyaan.jurusan')
            ->where('siswa_id', $siswa->id)
            ->get()
            ->groupBy(fn($jawaban) => optional($jawaban->pertanyaan->jurusan)->id);

        $hasil = $jawabanGrouped->map(function ($jawabans, $jurusanId) {
            return new Rekomendasi([
                'jurusan_id' => $jurusanId,
                'skor_total' => $jawabans->sum('nilai'),
                'jurusan'    => $jawabans->first()->pertanyaan->jurusan,
            ]);
        })->sortByDesc('skor_total')->values();

        $terbaik = $hasil->first();
        if ($terbaik) {
            Rekomendasi::updateOrCreate(
                ['siswa_id' => $siswa->id],
                ['jurusan_id' => $terbaik->jurusan_id, 'skor_total' => $terbaik->skor_total]
            );
        }

        return $hasil;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BukuExport;
use App\Models\Buku;
use App\Models\Genre;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Penerbit;
use App\Models\Penulis;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    // Method to display the book list
    public function index(Request $request)
    {
        $data['main'] = 'Buku';
        $data['judul'] = 'Manajemen Buku';
        $data['sub_judul'] = 'Data Buku';
        $data['bukus'] = Buku::with(['penulis', 'penerbit', 'genre'])->get();

        if ($request->ajax()) {
            $data = Buku::with(['penulis', 'penerbit', 'genre']); // Load relasi

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('penulis_id', function ($row) {
                    return $row->penulis ? $row->penulis->nama_author : '-';
                })
                ->addColumn('penerbit_id', function ($row) {
                    return $row->penerbit ? $row->penerbit->nama_penerbit : '-';
                })
                ->addColumn('genre_id', function ($row) {
                    return $row->genre ? $row->genre->nama_genre : '-';
                })
                ->addColumn('action', function ($row) {
                    return view('admin.buku.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $tracker = Buku::select('terbit', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('terbit')
            ->get();
        $total = $tracker->sum('jumlah');
        $data['tracker'] = $tracker;
        $data['total'] = $total;

        return view('admin.buku.index', $data);
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'penulis_id' => 'required|numeric',
            'penerbit_id' => 'required|numeric',
            'terbit' => 'required|date',
            'genre_id' => 'required|numeric',
            'stock' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:255',
            'gambar_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // fungsi gawe naruh gambar
        if ($request->hasFile('gambar_buku')) {
            $gambar = $request->file('gambar_buku');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/buku', $gambarName);
        } else {
            $gambarName = null;
        }

        // Create a new book record
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'isbn' => $request->isbn,
            'title' => $request->title,
            'penulis_id' => $request->penulis_id,
            'penerbit_id' => $request->penerbit_id,
            'terbit' => $request->terbit,
            'genre_id' => $request->genre_id,
            'deskripsi' => $request->deskripsi,
            'sinopsis' => $request->sinopsis,
            'stock' => $request->stock ?? '0',
            'gambar_buku' => $gambarName,
        ]);
        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function create()
    {
        $data['penulis'] = Penulis::all();
        $data['penerbit'] = Penerbit::all();
        $data['genre'] = Genre::all();

        return view('admin.buku.create', $data);
    }


    public function getBukuData(Request $request)
    {
        // Fetch books with their associated penulis, penerbit, and genre
        $buku = Buku::with(['penulis', 'penerbit', 'genre'])->get();

        return datatables()->of($buku)
            ->addColumn('penulis_id', function ($buku) {
                return $buku->penulis ? $buku->penulis->nama_author : '-';
            })
            ->addColumn('penerbit_id', function ($buku) {
                return $buku->penerbit ? $buku->penerbit->nama_penerbit : '-';
            })
            ->addColumn('genre_id', function ($buku) {
                return $buku->genre ? $buku->genre->nama_genre : '-';
            })
            ->addColumn('action', function ($buku) {
                return '<button class="btn btn-info">View</button>';
            })
            ->make(true);
    }
    public function excel()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku; // Missing model import
use App\Models\Genre;
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
        if ($request->ajax()) {
            $data = Buku::select('id', 'title', 'penulis', 'penerbit', 'terbit', 'deskripsi', 'sinopsis', 'genre', 'stock');
            return Datatables::of($data)
                ->addIndexColumn()
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
            'title' => 'required|string|max:255',
            'penulis' => 'required|numeric',
            'penerbit' => 'required|numeric',
            'terbit' => 'required|date',
            'genre' => 'required|numeric',
            'stock' => 'required|numeric',
            'gambar_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);
    
        // Check if an image file is uploaded
        if ($request->hasFile('gambar_buku')) {
            $gambar = $request->file('gambar_buku');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension(); // Create a unique name for the image
            $gambar->storeAs('public/buku', $gambarName); // Store the image in the 'public/buku' directory
        } else {
            $gambarName = null; // If no image is uploaded, set the filename to null
        }
    
        // Create a new book record
        Buku::create([
            'title' => $request->title,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'terbit' => $request->terbit,
            'genre' => $request->genre,
            'stock' => $request->stock ?? '0',
            'gambar_buku' => $gambarName, // Save the image filename to the database
        ]);
    
        // Redirect to the supplier list with a success message
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



}


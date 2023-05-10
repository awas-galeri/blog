<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Fungsi untuk menampilkan semua data
    public function index()
    {
        $blog = Blog::all();
        return view('blog.index', compact('blog'));
    }

    // Fungsi untuk menampilkan form create
    public function create()
    {
        return view('create-view-name');
    }

    // Fungsi untuk menyimpan data baru
    public function store(Request $request)
    {
        $data = new Blog();
        $data->field1 = $request->input('field1');
        $data->field2 = $request->input('field2');
        // Menyimpan data ke database
        $data->save();

        return redirect('/index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Fungsi untuk menampilkan data yang akan diedit
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('edit-view-name', compact('data'));
    }

    // Fungsi untuk mengupdate data yang sudah diedit
    public function update(Request $request, $id)
    {
        $data = Blog::find($id);
        $data->field1 = $request->input('field1');
        $data->field2 = $request->input('field2');
        // Menyimpan data ke database
        $data->save();

        return redirect('/index')->with('success', 'Data berhasil diupdate!');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();

        return redirect('/index')->with('success', 'Data berhasil dihapus!');
    }
}

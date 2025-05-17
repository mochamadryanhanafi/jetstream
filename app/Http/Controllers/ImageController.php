<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary as CloudinaryFacade;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Menampilkan daftar gambar
    public function index()
    {
        $images = Image::latest()->get();  // Mengambil gambar terbaru
        return view('images.index', compact('images'));  // Mengirim data gambar ke view
    }

    // Untuk upload gambar
    public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|image|max:2048',
    ], [
        'file.required' => 'Silakan pilih gambar.',
        'file.image' => 'File harus berupa gambar.',
        'file.max' => 'Ukuran gambar maksimal 2MB.',
    ]);

    $file = $request->file('file');

    // Upload ke Cloudinary menggunakan Storage facade
    $path = Storage::disk('cloudinary')->put('laravel_uploads', $file);

    // Dapatkan URL dan public ID
    $url = Storage::disk('cloudinary')->url($path);
    $publicId = pathinfo($path, PATHINFO_FILENAME);

    Image::create([
        'public_id' => $publicId,
        'url' => $url,
    ]);

    return redirect()->route('images.index')->with('success', 'Gambar berhasil diupload!');
}

    // Menghapus gambar
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus gambar dari Cloudinary
        CloudinaryFacade::destroy($image->public_id);

        // Hapus gambar dari database
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Gambar berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    private $URL_IMG_GALLERY = 'image/gallery';
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Gallery $gallery)
    {
        //
    }


    public function edit(Gallery $gallery)
    {
        //
    }


    public function update(Request $request, Gallery $gallery)
    {
    }


    public function destroy(Request $request)
    {
        $id_gallery = $request->id_gallery;

        $gallery  = Gallery::find($id_gallery);
        if ($gallery) {
            $oldFilename = $gallery->img_gallery;
            if (File::exists(public_path("$this->URL_IMG_GALLERY/$oldFilename"))) {
                File::delete(public_path("$this->URL_IMG_GALLERY/$oldFilename"));
            }
            Gallery::destroy($id_gallery);
        }
    }
}
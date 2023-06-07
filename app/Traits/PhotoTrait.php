<?php

namespace App\Traits;

use App\Models\Photo;
use Illuminate\Http\Request;

trait PhotoTrait
{

    /**
   

     */
    function loadFiles(Request $request): array
    {
        $path = [];
        if ($request->has('file')) {
            foreach ($request->file('file') as $value) {
                $ext = $value->extension();
                $image_name = uniqid() . '.' . $ext;
                $value->move(public_path() . '/uploads', $image_name);
                $path[] = new Photo(['path' => '/uploads/' . $image_name]);
            }
        }
        return $path;
    }
    function loadCover(Request $request): string
    {
        $cover='';
            if ($request->has('cover')) {
                $value=$request->file('cover');
                $ext = $value->extension();
                $image_name = uniqid() . '.' . $ext;
                $value->move(public_path() . '/covers/', $image_name);
                $cover = '/covers/' . $image_name;
    }
    return $cover;
}
}

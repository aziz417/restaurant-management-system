<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class ComonController extends Controller
{
    public function fileUploadedBackend($image, $storeName, $fildName){
        if($fildName){
            request()->validate([
                $fildName => 'mimes:jpg,jpeg,bmp,png',
            ],[
                $fildName.'.mimes' => 'Invalid file try to upload!'
            ]);
        }

        if ($image){
            $real_image = $image;
            $imgNameWithExtention = "Fictionsoft".rand(8,8).time().
            '.'.$image->getClientOriginalExtension();
            Image::make($real_image)
            ->save( base_path('public/admin/uploads_images/'.$storeName.'/'
            .$imgNameWithExtention),'100');

            return $imgNameWithExtention;
        }
    }

    public function imageDeleteBackend($oldImage,$storeName){
        if($oldImage != ''){
            file_exists('admin/uploads_images/'.$storeName.'/'.$oldImage);
            unlink('admin/uploads_images/'.$storeName.'/'.$oldImage);
        }
        return 0;
    }
}

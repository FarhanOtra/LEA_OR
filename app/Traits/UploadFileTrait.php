<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadFileTrait
{

    public function saveUploadedFile($model, $request, $field_name, $folder, $filename = null)
    {
        if (!isset($model->id)) {
            $model->save();
        }
        if (!empty($request->hasFile($field_name))) {
            //Generate filename
            if ($filename == null) {
                $filename = uniqid($model->id . '_') . '.' . $request->$field_name->getClientOriginalExtension();
            }

            //Hapus file lama jika ada
            $file_path = 'public/' . $folder . '/' . $model->$field_name;
            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }

            //Simpan file upload
            $request->file($field_name)->storeAs('public/' . $folder, $filename);
            $model->$field_name = $filename;
            $model->save();

            return $model;
        }
        return null;
    }

    public function saveAvatarImage($model, $request, $request_field, $avatar_field, $folder, $filename = null)
    {
        if (!isset($model->id)) {
            $model->save();
        }
        if (!empty($request->hasFile($request_field))) {
            //Hapus file lama jika ada
            $file_path = 'public/' . $folder . '/' . $model->$avatar_field;
            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }

            //Generate filename
            if ($filename == null) {
                $filename = uniqid($model->id . '_') . '.' . $request->$request_field->getClientOriginalExtension();
            }
            $image = $request->file($request_field);
            //Process Image
            $canvas = Image::canvas(60, 60);
            $resizeImage = Image::make($image)->resize(60, 60, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::isDirectory(storage_path('app/public/' . $folder))) {
                File::makeDirectory(storage_path('app/public/' . $folder));
            }

            $canvas->insert($resizeImage, 'center');

            $canvas->save(storage_path('app/public/' . $folder . $filename));

            //Simpan file upload
//            $image->storeAs('public/'.$folder, $filename);
            $model->$avatar_field = $filename;
            $model->save();

            return $model;
        }
        return null;
    }

    public function saveUploadedPhoto($photo_field, $image, $folder, $filename)
    {

        $sizes = config('central.photo_size');
        $width = Image::make($image)->width();
        $height = Image::make($image)->height();

        if ($width > $height) {
            $width = $height;
        } else {
            $height = $width;
        }

        //Hapus file lama jika ada
        $file_path = 'public/' . $folder . '/' . $photo_field;
        $this->_deleteFile($file_path);

        //Simpan File Original
        $image->storeAs('public/' . $folder, $filename);

        // Do Processing Magic
        $croppedImage = Image::make($image)->crop($width, $height);
        foreach ($sizes as $key => $size) {

            //Hapus file-file lama
            $file_path = 'public/' . $folder . '/' . $size . '/' . $photo_field;
            $this->_deleteFile($file_path);

            if (!File::isDirectory(storage_path('app/public/' . $folder . '/' . $size))) {
                File::makeDirectory(storage_path('app/public/' . $folder . '/' . $size));
            }

            //Simpan file-file baru
            $canvas = Image::canvas($size, $size, '#ccc');
            $resizeImage = Image::make($image)->crop($width, $height)->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
            });
            $canvas->insert($resizeImage, 'center');
            $canvas->save(storage_path('app/public/' . $folder . '/' . $size . '/' . $filename));
        }

        return $filename;
    }

    public function saveAvatar($avatar_field, $image, $filename)
    {
        $folder = config('central.path.avatar');
        $width = Image::make($image)->width();
        $height = Image::make($image)->height();
        if ($width > $height) {
            $width = $height;
        } else {
            $height = $width;
        }

        //Hapus file lama jika ada
        $file_path = 'public/' . $folder . '/' . $avatar_field;
        $this->_deleteFile($file_path);

        if (!File::isDirectory(storage_path('app/public/' . $folder))) {
            File::makeDirectory(storage_path('app/public/' . $folder));
        }

        $canvas = Image::canvas(60, 60, '#ccc');
        $resizeImage = Image::make($image)
            ->crop($width, $height)
            ->resize(60, 60, function ($constraint) {
                $constraint->aspectRatio();
            });

        $canvas->insert($resizeImage, 'center');

        $canvas->save(storage_path('app/public/' . $folder . '/' . $filename));

        return $filename;
    }


    private function _deleteFile($file_path)
    {
        if (Storage::exists($file_path)) {
            Storage::delete($file_path);
        }
    }

}

<?php

namespace App\Models\traits;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

trait SetModel
{
    private function newName($name, $extention)
    {
        return $name.'_'.time().'.'.$extention;
    }

    private function uploadFile()
    {
        $file = Input::file('image');
        if($file){

            if(null !== $this->image){
                Storage::disk($this->disk)->delete($this->image);
            }

            $extention = $file->getClientOriginalExtension();
            $this->image = $this->newName($this->disk, $extention);
            Storage::disk($this->disk)->put($this->image ,\File::get($file));
        }

        return $this->image ?? null;
    }

}
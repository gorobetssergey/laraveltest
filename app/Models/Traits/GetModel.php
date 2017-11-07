<?php

namespace App\Models\traits;

trait GetModel
{

    public function getAllData()
    {
        if(count($this->relations) > 0){
            return self::with($this->relations)->orderBy($this->orderingField, $this->ordering)->get();
        }
        return self::orderBy($this->orderingField, $this->ordering)->get();
    }

    public function getOneData(int $id)
    {
        if(count($this->relations) > 0){
            return self::with($this->relations)->where('id', $id)->first();
        }
        return self::find($id);
    }

}
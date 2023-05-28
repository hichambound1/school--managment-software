<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\Option\StoreManyOptionRequest;
use App\Http\Requests\BackOffice\Option\StoreOneOptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function getOne($id)
    {
        $this->authorize('can_view_option');
        $oneOption = Option::whereId($id)->first();
        if(isset($oneOption)){
            return response($oneOption,200);
        }else{
            return response("Option not found",404);
        }
    }
    public function getAll()
    {
        $this->authorize('can_view_option');
        $oneOption = Option::all();
        if(isset($oneOption)){
            return response($oneOption,200);
        }else{
            return response("Option not found",404);
        }
    }
    public function StoreOneOption(StoreOneOptionRequest $request)
    {
        $this->authorize('can_add_option');
        $data = $request->validated();
        $option= Option::create($data);
        return response($option,200);
    }
    public function UpdateOneOption(StoreOneOptionRequest $request)
    {
        $this->authorize('can_edit_option');
        $data = $request->validated();
        $option= Option::whereId($data["id"])->update($data);
        return response("option updated",200);
    }
    public function StoreManyOption(StoreManyOptionRequest $request)
    {
        $this->authorize('can_add_option');
        $options = $request->validated()['options'];
        Option::insert($options);
        return response($options,200);
    }
    public function deleteOption($id)
    {
        $this->authorize('can_delete_option');
        $oneOption = Option::whereId($id)->first();
        if(isset($oneOption)){
            $oneOption->delete();
            return response("option deleted succefully",200);
        }else{
            return response("Option not found",404);
        }
    }
}

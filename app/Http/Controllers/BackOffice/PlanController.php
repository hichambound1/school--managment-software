<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\Plan\DeletePlanRequest;
use App\Http\Requests\BackOffice\Plan\StorePlanRequest;
use App\Http\Requests\BackOffice\Plan\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function viewAll()
    {
        $plans_with_options= Plan::with('options')->get();

        return response($plans_with_options,200);
    }
    public function viewOne($id)
    {
        $plan= Plan::whereId($id)->first();
        if($plan){
            $plan= Plan::whereId($id)->with('options')->first();
        }else{
            return response('Plan Not Found',404);
        }

        return response($plan,200);
    }

    public function update(UpdatePlanRequest $request)
    {
        $plan_with_options= Plan::whereId($request->id)->update([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'name_fr'=>$request->name_fr,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'description_fr'=>$request->description_fr,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'per'=>$request->per,
        ]);

        return response($plan_with_options,200);
    }
    public function store(StorePlanRequest $request)
    {
        $plan_with_options= Plan::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'name_fr'=>$request->name_fr,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'description_fr'=>$request->description_fr,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'per'=>$request->per,
        ]);

        return response($plan_with_options,200);
    }
    public function delete(DeletePlanRequest $request)
    {
        Plan::whereId($request->id)->delete();
        return response("plan deleted",200);
    }
}
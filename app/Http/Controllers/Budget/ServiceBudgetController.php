<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget\ServiceBudget;
use App\Models\Budget\Budget;

class ServiceBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $budget = Budget::findOrFail($id);
      return view('budget.service', compact('budget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $serbu = new ServiceBudget();
      $serbu->budget_id = $id;
      $serbu->name_service = $request->input('name_service');
      $serbu->unique_value = $request->input('unique_value');
      $serbu->save();

      $serbu->budget->subtotal += $serbu->unique_value;
      $service_iva = $serbu->unique_value + ($serbu->unique_value * ($serbu->budget->iva / 100));
      $serbu->budget->total += $service_iva;

      $serbu->budget->update();

      return back()->with('success',trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $serbu = ServiceBudget::findOrFail($id);
      return view('budget.show', compact('serbu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // ServiceBudget::where('budget_id',$id)->where('id',$request->input('id'))->delete();
      return back()->with('success', trans('alert.delete'));
    }
}

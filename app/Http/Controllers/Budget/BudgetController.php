<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget\Budget;
use App\Models\System\User;
use App\Models\System\Client;
use App\Models\System\Company;
use App\Services\Config;
use Laravel\Ui\Presets\React;
use Rap2hpoutre\FastExcel\FastExcel;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $budgets = Budget::get();
      return view('budget.index',compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clients = Client::get();
      $status = Budget::STATE;
      return view('budget.create',compact('clients','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $bud = new Budget();
      // $bud->user_id = current_user()->id;
      $bud->user_id = current_user()->id;
      $bud->client_id = !empty($request->input('client_id')) ? $request->input('client_id') : null;
      $bud->start_date = $request->input('start_date');
      $bud->finish_date = $request->input('finish_date');
      $bud->glosa = $request->input('glosa');
      $bud->iva = Config::IVA();
      $bud->status = $request->input('status');
      $bud->count_email = 0;
      $bud->save();
      return Redirect()->route('budget.index')->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $budget = Budget::findOrFail($id);
      return view('budget.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $clients = Client::get();
      $status = Budget::STATE;
      $budget = Budget::findOrFail($id);
      return view('budget.edit',compact('budget', 'status','clients'));
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
      try {
        $budget = Budget::findOrFail($id);
        $budget->client_id = !empty($request->input('client_id')) ? $request->input('client_id') : null;
        // $budget->client_id = $request->input('client_id');
        $budget->start_date = $request->input('start_date');
        $budget->finish_date = $request->input('finish_date');
        $budget->glosa = $request->input('glosa');
        // $budget->subtotal = $request->input('subtotal');
        // $budget->iva = $request->input('iva');
        // $budget->total = $request->input('total');
        $budget->status = $request->input('status');
        // $budget->count_email = $request->input('count_email');
        $budget->update();
        return Redirect()->route('budget.index')->with('success', trans('alert.success'));
      } catch (\Throwable $th) {
        return Redirect()->route('budget.index')->with('warning', trans('alert.warning'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Budget::where('id',$id)->delete();
      return Redirect()->route('budget.index')->with('success', trans('alert.delete'));
    }

    public function recalculated(Request $request, $id)
    {
      $budget = Budget::findOrFail($request->input('id'));
      if ($budget->recalculated()){
        return back()->with('success','Hemos recalculado correctamente.');
      }

      return back()->with('danger','Error intente nuevamente.');
    }

    public function imprimir($id){
      $budget = Budget::findOrFail($id);
      $company = Company::first();
      $pdf = \PDF::loadView('pdf.budget', compact('budget','company'));
      return $pdf->download('presupuesto.pdf');
    }

    public function preview($id){
      $budget = Budget::findOrFail($id);
      $company = Company::first();
      // return view('budget.budget.show', compact('budget'));
      $pdf = \PDF::loadView('pdf.budget', compact('budget','company'));
      return $pdf->stream();
    }

    public function exportExcel()
    {
      return (new FastExcel(Budget::all()))->download('presupuesto.xlsx');
    }

}

<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice\InvoiceBill;
use App\Models\System\User;
use App\Models\Inventary\Product;
use App\Models\System\Client;
use App\Models\System\Company;
use App\Services\Config;

class InvoiceBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $invoice = InvoiceBill::get();
      return view('invoice.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clients = Client::get();
      $company = Company::get();
      $status = InvoiceBill::STATE;
      return view('invoice.create', compact('clients','company','products','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new InvoiceBill();
        $invoice->company_id = !empty($request->input('company_id')) ? $request->input('company_id') : null;
        $invoice->client_id = !empty($request->input('client_id')) ? $request->input('client_id') : null;
        $invoice->user_id = current_user()->id;
        $invoice->issue_date = $request->input('issue_date');
        $invoice->iva = Config::IVA();
        $invoice->status = $request->input('status');
        $invoice->save();
        return redirect()->route('invoice.index')->with('success','alert.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $invoice = InvoiceBill::findOrFail($id);
      return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $company = Company::get();
      $clients = Client::get();
      $invoice = InvoiceBill::findOrFail($id);
      return view('invoice.edit',compact('company','clients','invoice'));
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
        $invoice = InvoiceBill::findOrFail($id);
        $invoice->company_id = !empty($request->input('company_id')) ? $request->input('company_id') : null;
        $invoice->client_id = !empty($request->input('client_id')) ? $request->input('client_id') : null;
        $invoice->update();
        return redirect()->route('invoice.index')->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
        return back()->with('warning',trans('alert.warning'));
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
      InvoiceBill::where('id',$id)->delete();
      return back()->with('sucess',trans('alert.delete'));
    }
}

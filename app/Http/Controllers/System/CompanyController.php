<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function index(){
    $company = Company::first();
    return view('system.company.index',compact('company'));
  }

  public function edit(Request $request){
    $company = Company::first();

    $company->
    $company->update();
    return view('system.company.index',compact('company'));
  }
}

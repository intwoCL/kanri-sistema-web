<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\City;
use App\Models\System\Company;
use App\Models\System\Region;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function index(){
    $company = Company::first();
    $cities = City::get();
    $regions = Region::get();
    return view('system.company.index',compact('company','regions','cities'));
  }

  public function update(Request $request){
    try {
      $folder = 'public/photo_company';

      $company = Company::first();
      if(!empty($request->file('photo'))){
        $filename = "photo-" . time();
        $company->photo = ImportImage::save($request, 'photo', $filename, $folder);
      }

      if(!empty($request->file('logo'))){
        $filename = "logo-" . time();
        $company->logo = ImportImage::save($request, 'logo', $filename, $folder);
      }

      $company->run = $request->input('run');
      $company->name_owner = $request->input('name_owner', null);
      $company->name_company = $request->input('name_company', null);
      $company->type = $request->input('type');
      $company->address = $request->input('address');
      $company->city_id = $request->input('city_id');
      $company->city_id = $request->input('city_id');
      $company->phone = $request->input('phone');
      $company->email = $request->input('email');
      $company->web_site = $request->input('web_site');
      $company->color_company = $request->input('color_company');
      $company->update();

      session(['company' => $company]);

      return back()->with('success','Se ha actualizado correctamente.');
    } catch (\Throwable $th) {
      return $th;
    }
  }
}

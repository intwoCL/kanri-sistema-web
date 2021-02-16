<?php

namespace App\Services;

use Illuminate\Http\Request;

class ImportImage
{
  public static function save(Request $request, $inputName = 'image' ,$name = '', $folderSave = 'public/trash'){
    try {
      $request->validate([
        $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $file = $request->file($inputName);
      $filename = $name .'.'. $file->getClientOriginalExtension();
      $file->storeAs($folderSave,$filename);

      return $filename;
    } catch (\Throwable $th) {
      return $th;
    }

  }
}

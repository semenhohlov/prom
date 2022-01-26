<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Import;

class ImportController extends Controller
{
    public function importForm ()
    {
        return view('import.form');
    }
    public function saveFile (Request $request)
    {
        if ($request->hasFile('filename'))
        {
            $name = $request->filename->getClientOriginalName();
            $ext = $request->filename->extension();
            $hash = $request->filename->hashName();
            $realPath = $request->filename->getRealPath();
            $request->filename->store('import');
            Import::dispatch($hash)->onQueue('import_csv');

            return view('import.save', [
                'name' => $name,
                'ext' => $ext
            ]);
        }
        return view('import.form');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        $perPage = session('perPage', 20);
        $search = '';
        if ($request->has('perPage'))
        {
            $perPage = $request->input('perPage');
        }
        session(['perPage' => $perPage]);
        if ($request->has('search'))
        {
            $search = $request->input('search');
            $result = Product::
                where('name', 'like', '%'.$search.'%')
                ->orWhere('vendor_code', 'like', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->paginate($perPage)
                ->withQueryString();
        } else {
            $result = Product::orderBy('id', 'desc')->paginate($perPage);
        }
        return view('product.table', [
            'result' => $result,
            'perPage' => $perPage,
            'search' => $search
        ]);
    }
}

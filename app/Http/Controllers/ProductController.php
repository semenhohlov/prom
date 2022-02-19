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
        $resultFull = [];
        if ($request->has('perPage'))
        {
            $perPage = $request->input('perPage');
        }
        session(['perPage' => $perPage]);
        if ($request->has('search'))
        {
            $search = $request->input('search');
            if (!$request->has('page'))
            {
                $resultFull = Product::
                    where('name', '=', $search)
                    ->orWhere('vendor_code', '=', $search)
                    ->orderBy('id', 'desc')->get();
            }
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
            'resultFull' => $resultFull,
            'result' => $result,
            'perPage' => $perPage,
            'search' => $search
        ]);
    }

    public function item (Request $request, $id)
    {
        $item = Product::find($id);
        // dd($item);
        return view('product.item', ['item' => $item]);
    }

    public function update_item (Request $request, $id)
    {
        $item = Product::find($id);
        // dd($request->request);
        if ($item)
        {
            $item->name = $request->input('name') ?? '';
            $item->name_ukr = $request->input('name_ukr') ?? '';
            $item->description = $request->input('description') ?? '';
            $item->description_ukr = $request->input('description_ukr') ?? '';
            $item->keywords = $request->input('keywords') ?? '';
            $item->keywords_ukr = $request->input('keywords_ukr') ?? '';
            $item->html_title = $request->input('html_title') ?? '';
            $item->html_title_ukr = $request->input('html_title_ukr') ?? '';
            $item->html_description = $request->input('html_description') ?? '';
            $item->html_description_ukr = $request->input('html_description_ukr') ?? '';
            $item->html_keywords = $request->input('html_keywords') ?? '';
            $item->html_keywords_ukr = $request->input('html_keywords_ukr') ?? '';
            $item->manufacturer = $request->input('manufacturer') ?? '';
            $item->country = $request->input('country') ?? '';
            $item->gifts = $request->input('gifts') ?? '';
            $item->gifts_id = $request->input('gifts_id') ?? '';
            $item->accompany = $request->input('accompany') ?? '';
            $item->accompany_id = $request->input('accompany_id') ?? '';
            $item->weight = $request->input('weight') ?? '';
            $item->width = $request->input('width') ?? '';
            $item->height = $request->input('height') ?? '';
            $item->length = $request->input('length') ?? '';
            $item->vendor_code = $request->input('vendor_code') ?? '';
            $item->label = $request->input('label') ?? '';
            $item->personal_marks = $request->input('personal_marks') ?? '';
            $item->price = $request->input('price') ?? '';
            $item->discount = $request->input('discount') ?? '';
            $item->type = $request->input('type') ?? '';
        } else {
            return view('product.item', ['item' => $item, 'error' => 'Позиция не найдена']);
        }
        $item->save();
        return view('product.item', ['item' => $item, 'info' => 'Позиция успешно сохранена.']);
    }
}

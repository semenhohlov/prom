<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AccordanceCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryAPIController extends Controller
{
    public function save_file(Request $request)
    {
        $path = '';
        if ($request->hasFile('filename'))
        {
            $hash = $request->filename->hashName();
            $request->filename->store('import');
            $path = Storage::path('import/'.$hash);
        }
        return $path;
    }

    public function show()
    {
        return Category::all()->toJson();
    }
    
    public function upload_price(Request $request)
    {
        // return Categories, uploadedCategories + accordanceCategories
        $path = $this->save_file($request);
        $xml = simplexml_load_file($path);
        // dd($xml);
        $loaded = [];
        // $cats = Category::all();
        if ($xml->shop)
        {
            $categories = $xml->shop->categories->category;
            $suplier = (string) $xml->shop->name;
        } else
        {
            $categories = $xml->categories->category;
            $suplier = (string) $xml->name;
        }
        foreach ($categories as $category)
        {
            $group_number = '';
            $group_prom_name = '';
            $group_id = (string) $category['id'];
            $ac_cat = AccordanceCategory::where('supplier', $suplier)
                ->where('group_id', $group_id)
                ->first();
            if ($ac_cat)
            {
                $group_number = $ac_cat->group_number;
                $group_prom_name = $ac_cat->group_prom_name;
            }
            $cat = [
                'group_number' => $group_number,
                'group_prom_name' => $group_prom_name,
                'group_id' => (string) $category['id'],
                'group_name' => (string) $category,
                'group_parent_id' => (string) $category['parentId']
            ];
            array_push($loaded, $cat);
        }
        return [
            'message' => 'Price file is uploaded.',
            'supplier' => $suplier,
            // 'promCats' => $cats,
            'loaded' => $loaded
        ];
    }
    
    public function add_accordance(Request $request)
    {
        // return added / updated accordanceCategory
        $ac_cat = AccordanceCategory::where('group_id', $request->input('group_id'))
            ->where('supplier', $request->input('supplier'))->first();
        if (!$ac_cat)
        {
            $ac_cat = AccordanceCategory::create([
                'supplier' => $request->input('supplier'),
                'group_number' => $request->input('group_number'),
                'group_id' => $request->input('group_id'),
                'group_parent_id' => $request->input('group_parent_id'),
                'group_name' => $request->input('group_name'),
                'group_prom_name' => $request->input('group_prom_name')
            ]);
        } else {
            $ac_cat->group_number = $request->input('group_number');
            $ac_cat->group_prom_name = $request->input('group_prom_name');
            $ac_cat->save();
        }
        return [
            'message' => 'Accordance category is successful.',
            'data' => [
            'supplier' => $request->input('supplier'),
            'group_number' => $request->input('group_number'),
            'group_id' => $request->input('group_id'),
            'group_parent_id' => $request->input('group_parent_id'),
            'group_name' => $request->input('group_name'),
            'group_prom_name' => $request->input('group_prom_name')]
        ];
    }

    public function show_prom()
    {
        $cats = Category::all();
        $prom = DB::select('select * from prom_cats');
        return [
            'Message' => 'ok',
            'cats' => $cats,
            'prom' => $prom
        ];
    }

    public function update_prom(Request $request, $id)
    {
        if (!$id)
        {
            return [
                'Message' => 'Not found.'
            ];
        }
        $cat = Category::where('id', $id)->first();
        if (!$cat)
        {
            return [
                'Message' => 'Category '.$id.' not found.'
            ];
        }
        $cat->prom_group_id = $request->input('prom_group_id');
        $cat->prom_cat_adress = $request->input('prom_cat_adress');
        $cat->prom_cat_1 = $request->input('prom_cat_1');
        $cat->prom_cat_2 = $request->input('prom_cat_2');
        $cat->prom_cat_3 = $request->input('prom_cat_3');
        $cat->prom_cat_4 = $request->input('prom_cat_4');
        try
        {
            $cat->save();
        } catch (Error $e)
        {
            return [
                'Message' => 'Error updating category '.$id.'.',
                'Error' => $e->getMessage()
            ];
        }
        return [
            'Message' => 'ok'
        ];
    }
}

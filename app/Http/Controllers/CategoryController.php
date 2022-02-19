<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('category.category', ['categories' => $categories]);
    }
    
    public function show_tree()
    {
        $categories_tree = Category::where('group_parent_number', '=', 0)->get();
        return view('category.category', ['categories_tree' => $categories_tree]);
    }
    
    public function import(Request $request)
    {
        $rows = 0;
        if ($request->hasFile('filename'))
        {
            $name = $request->filename->getClientOriginalName();
            $ext = $request->filename->extension();
            $hash = $request->filename->hashName();
            $realPath = $request->filename->getRealPath();
            $request->filename->store('import');
            $path = Storage::path('import/'.$hash);
            if (($h = fopen($path, 'r')) !== FALSE)
            {
                $data = fgetcsv($h, 1024000); // first string
                while (($data = fgetcsv($h, 1024000)) !== FALSE)
                {
                    $cat = Category::where('group_number', intval($data[0]))->first();
                    if ($cat)
                    {
                        continue;
                    }
                    $category = Category::create([
                        'group_number' => intval($data[0]),
                        'group_name' => $data[1],
                        'group_name_ukr' => $data[2],
                        'group_id' => intval($data[3]),
                        'group_parent_number' => intval($data[4]),
                        'group_parent_id' => intval($data[5]),
                        'group_html_title' => $data[6],
                        'group_html_title_ukr' => $data[7],
                        'group_html_description' => $data[8],
                        'group_html_description_ukr' => $data[9],
                        'group_html_keywords' => $data[10],
                        'group_html_keywords_ukr' => $data[11]
                    ]);
                    $rows++;
                }
                fclose($h);
            }
        }
        return view('category.category', ['rows' => $rows]);
    }
    public function compare(Request $request)
    {
        if ($request->hasFile('filename'))
        {
            $hash = $request->filename->hashName();
            $realPath = $request->filename->getRealPath();
            $request->filename->store('import');
            $path = Storage::path('import/'.$hash);
            $xml = simplexml_load_file($path);
            // dd($xml);
            $loaded = [];
            $cats = Category::all();
            foreach ($xml->shop->categories->category as $category)
            {
                $cat = [
                    'group_id' => (string) $category['id'],
                    'group_name' => (string) $category,
                    'group_parent_id' => (string) $category['parentId']
                ];
                array_push($loaded, $cat);
            }
            return view('category.compare', ['loaded' => $loaded, 'cats' => $cats]);
        }
        return view('category.compare');
    }
}

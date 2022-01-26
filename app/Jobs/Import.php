<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Specification;

class Import implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    var $realPath = '';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($realPath)
    {
        $this->realPath = $realPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [];
        $rows = 1;
        $path = Storage::path('import/'.$this->realPath);
        if (($h = fopen($path, 'r')) !== FALSE)
        {
            $headers = fgetcsv($h, 1024000); // first row
            while (($data = fgetcsv($h, 1024000)) !== FALSE)
            {
                $product = Product::create([
                    'vendor_code' => $data[0],
                    'name' => $data[1],
                    'name_ukr' => $data[2],
                    'keywords' => $data[3],
                    'keywords_ukr' => $data[4],
                    'description' => $data[5],
                    'description_ukr' => $data[6],
                    'type' => $data[7],
                    'price' => floatval($data[8]),
                    'currency' => $data[9],
                    'measure_unit' => $data[10],
                    'min_order_units' => intval($data[11]),
                    'wholesale_price' => floatval($data[12]),
                    'min_wholesale_units' => intval($data[13]),
                    'image_ref' => $data[14],
                    'availability' => $data[15],
                    'quantity' => intval($data[16]),
                    'group_number' => intval($data[17]),
                    'group_name' => $data[18],
                    'sub_ref' => $data[19],
                    'available_delivery' => intval($data[20]),
                    'delivery_term' => $data[21],
                    'packing_type' => $data[22],
                    'packing_type_ukr' => $data[23],
                    'unique_id' => intval($data[24]),
                    'product_id' => $data[25],
                    'sub_id' => $data[26],
                    'group_id' => $data[27],
                    'manufacturer' => $data[28],
                    'country' => $data[29],
                    'discount' => $data[30],
                    'group_variations_id' => $data[31],
                    'personal_marks' => $data[32],
                    'product_url' => $data[33],
                    'discount_begin_date' => $data[34],
                    'discount_end_date' => $data[35],
                    'price_from' => $data[36],
                    'label' => $data[37],
                    'html_title' => $data[38],
                    'html_title_ukr' => $data[39],
                    'html_description' => $data[40],
                    'html_description_ukr' => $data[41],
                    'html_keywords' => $data[42],
                    'html_keywords_ukr' => $data[43],
                    'gifts' => $data[44],
                    'accompany' => $data[45],
                    'gifts_id' => $data[46],
                    'accompany_id' => $data[47],
                    'weight' => floatval($data[48]),
                    'width' => intval($data[49]),
                    'height' => intval($data[50]),
                    'length' => intval($data[51]),
                    'gtin_mark' => $data[52],
                    'mpn_number' => $data[53],
                ]);
                // specifications
                for ($i = 54; $i < count($data); $i += 3)
                {
                    if ($data[$i])
                    {
                        $spec = Specification::create([
                            'product_id' => $product->id,
                            'spec_name' => $data[$i],
                            'spec_unit' => $data[$i + 1],
                            'spec_value' => $data[$i + 2]
                        ]);
                    }
                }
                $rows++;
            }
            fclose($h);
        }
        echo "Rows: ".$rows.".\n";
    }
}

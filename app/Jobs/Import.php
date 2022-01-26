<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;

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
        // echo "DISPATCH: Real path: ".
        //     Storage::path('import/'.$this->realPath)."\n";
        if (($h = fopen($path, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($h, 1024000)) !== FALSE)
            {
                $rows++;
            }
            fclose($h);
        }
        echo "Rows: ".$rows.".\n";
    }
}

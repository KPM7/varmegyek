<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-counties {filename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument(key:'filename');
        $csvdata = $this->getCsvData($filename);
        var_dump($csvdata);
        $zips = [];

    }
    private function truncate($table){
        try{
            DB::statement("TRUNCATE TABLE $table");
            $this->info("$table has been truncated");
        }
        catch(Exception $e){
            $this->error($e->getMessage());
        }
    }

    private function getCsvData($filename, $withHeader = true)
    {
        if(file_exists($filename))
        {
            echo "$filename nem található";
            //$this -> error('A fájl nem található');
            return false;
        }
        $csvFile = fopen($filename,"r");
        $header = fgetcsv($csvFile);
        if($withHeader)
        {
            $lines[] = $header;
        }
        else{
            $lines = [];
        }
        while (!feof($csvFile))
        {
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }

        fclose($csvFile);
        return $lines;
    }
}

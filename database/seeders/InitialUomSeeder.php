<?php

namespace Database\Seeders;

use App\Models\Uom;
use App\Traits\Seedable;
use Illuminate\Database\Seeder;

class InitialUomSeeder extends Seeder
{
    use Seedable;

    public function run()
    {
        if ($this->hasSeeder($this::class)) {
            return false;
        }

        $data = $this->getData();
        $this->insertData($data);

        $this->seed($this::class);
    }

    private function getData() 
    {
        $data = [];
        $firstLine = true;
        $csvFile = fopen(base_path('database/seeders/data/uoms.csv'), 'r');

        while (($row = fgetcsv($csvFile, 2000, ',')) !== FALSE) {
            if (!$firstLine) {
                $data[] = [
                    'code' => trim($row['0']),
                    'name' => trim($row['1']),
                    'remarks' => trim($row['2'])
                ];
            }

            $firstLine = false;
        }

        fclose($csvFile);

        return $data;
    }

    protected function insertData($data)
    {
        foreach($data as $record) {
            Uom::create($record);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Traits\Seedable;
use Illuminate\Database\Seeder;

class InitialCategorySeeder extends Seeder
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
        $csvFile = fopen(base_path('database/seeders/data/categories.csv'), 'r');

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
            Category::create($record);
        }
    }
}

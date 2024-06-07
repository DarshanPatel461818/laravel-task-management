<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;

class TaskImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Task([
            "title" => $row[1],
            "description" => $row[2],
            "priority" => $row[3],
            "start_date" => $row[4],
            "end_date" => $row[5],
            "assignee" => $row[6],
            "status" => $row[7],
            "image" => $row[8],
        ]);
    }
}

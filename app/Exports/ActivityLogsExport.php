<?php

namespace App\Exports;

use App\Models\ActivityLog;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ActivityLogsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ActivityLog::all();
    }
    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Description',
            'Date Time',
        ];
    }
    public function map($activityLog): array
    {
        return [
            $activityLog->user_name,
            $activityLog->email,
            $activityLog->description,
            $activityLog->date_time,
        ];
    }
}

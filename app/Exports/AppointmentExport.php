<?php

namespace App\Exports;

use App\Models\Operational\Appointment;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AppointmentExport implements FromArray, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $headings = [];
        foreach ($this->data->toArray()[0] as $key => $value) {
            $headings[] = Appointment::HEADINGS[$key];
        }

        return $headings;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->data->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['doctor_id'],
            $row['user_id'],
            $row['level'],
            $row['date'],
            $row['time'],
            $row['status'],
        ];
    }
}

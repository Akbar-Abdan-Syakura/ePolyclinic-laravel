<?php

namespace App\Exports;

use App\Models\Operational\Transaction;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionExport implements FromArray, WithHeadings, WithMapping, ShouldAutoSize
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
        return [
            'Transaction Code',
            'Doctor',
            'Patient',
            'Fee Doctor',
            'Fee Poli Services',
            'Fee Hospital',
            'Sub total',
            'PPN',
            'Total',
        ];
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->data->toArray();
    }

    /**
     * @param mixed $row
     * @return array
     */

    public function map($row): array
    {
        return [
            $row['appointment_id'],
            $row['transaction_code'],
            $row['fee_doctor'],
            $row['fee_poli'],
            $row['fee_clinic'],
            $row['ppn'],
            $row['total'],
        ];
    }
}

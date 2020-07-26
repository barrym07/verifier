<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'isAdmin?',
            'Avatar',
            'USAF_email',
            'USAF_verification',
            'USAF_isVerified?',
            'Component',
            'Discord',
            'time_created',
            'last_updated'
        ];
    }
}

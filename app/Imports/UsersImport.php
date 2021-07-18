<?php
namespace App\Imports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToModel, WithHeadingRow
{
        
    /**
     * Method model
     *
     * @param array $row [explicite description]
     *
     * @return \App\Models\User
     */
    public function model(array $row)
    {

        return new User([
            'name'  => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'dob' => Date::excelToDateTimeObject($row['dob']),
            'anniversary'=> Date::excelToDateTimeObject($row['anniversary']),
            'password'=> bcrypt($row['phone'])
        ]);
    }

}
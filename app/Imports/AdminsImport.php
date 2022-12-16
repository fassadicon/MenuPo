<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $userCredentials = ([
            'email' => $row[0],
            'recoveryEmail' => $row[1],
            'password' => Hash::make(Str::random(8)),
            'role' => 1
        ]);
        $user = User::create($userCredentials);

        return new Admin([
            'firstName' => $row[2],
            'lastName' => $row[3],
            'middleName' => $row[4],
            'suffix' => $row[5],
            'sex' => $row[6],
            'address' => $row[7],
            'birthDate' => $row[8],
            'status' => 1,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id'),
            'user_id' => $user->id
        ]);
    }
}

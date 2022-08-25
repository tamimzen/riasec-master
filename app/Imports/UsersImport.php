<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Role;
use App\Models\ProgramStudi;
use App\Models\Tahun;
use Maatwebsite\Excel\Concerns\ToModel;


class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $check = User::create([
                'name'              => $row[1],
                'username'          => $row[2],
                'nim'               => $row[3], 
                'password'          => $row[3],
                'programstudi_id'   => ProgramStudi::where('program_studi', 'LIKE', '%'.$row[4].'%')->first()->id,
                // 'email'             => $row[5], 
                'tahun_id'          => Tahun::where('tahun', 'LIKE', '%'.substr($row[3],2,2).'%')->first()->id, 
                'slug'              => $row[2],
             ]);

        # default role = user
        $check->roles()->attach(Role::where('name', 'user')->first());

        return $check;
        // return new User([
        //     'name'              => $row[1],
        //     'username'          => $row[2],
        //     'nim'               => $row[3], 
        //     'password'          => $row[3],
        //     'programstudi_id'   => ProgramStudi::where('program_studi', 'LIKE', '%'.$row[4].'%')->first()->id,
        //     'email'             => $row[5], 
        //     'tahun_id'          => Tahun::where('tahun', 'LIKE', '%'.substr($row[3],2,2).'%')->first()->id, 
        //     'slug'              => $row[2],
        //  ]);
         
         $user_id = User::where('name', 'LIKE', '%'.$row[1].'%')->first()->id;

        //  return new RoleUser([
        //     'user_id'              => $user_id,
        //     'role_id'              => 3,
        //  ]);
    }
}

<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelUsers
{
    public function getAllUsers()
    {
        return DB::table('user')
            ->where('role_id','1')
            ->get();
    }
}

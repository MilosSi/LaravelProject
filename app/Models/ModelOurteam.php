<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelOurteam
{
    public function getAllTeam()
    {
        return DB::table('team')
            ->get();
    }
}

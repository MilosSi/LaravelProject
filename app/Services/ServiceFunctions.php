<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ServiceFunctions
{
    public static function insert($table,$data)
    {
        DB::beginTransaction();

        try {
            $ok=DB::table($table)
                ->insertGetId($data);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public static function delete($table,$id,$column="id")
    {
        DB::beginTransaction();
        try {
            $ok=DB::table($table)
                ->where($column,$id)
                ->delete();
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public static function update($table,$id,$data,$column="id")
    {
        DB::beginTransaction();
        try {
            $ok=DB::table($table)
                ->where($column,$id)
                ->update($data);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

}

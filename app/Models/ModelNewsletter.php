<?php


namespace App\Models;


use App\Http\Requests\NewsletterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModelNewsletter
{
    public function getEmail($email)
    {
        return DB::table('newsletter')
            ->where('email',$email)
            ->first();
    }

    public function insert($email)
    {
        DB::beginTransaction();

        try {
            $ok=DB::table('newsletter')
                ->insert(["email"=>$email,"created_at"=>date('Y-m-d H:i:s'),"updated_at"=>date('Y-m-d H:i:s')]);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function getAll($limit=5200,$offset=0,$order='desc')
    {
        return DB::table('newsletter')
            ->limit($limit)
            ->offset($offset)
            ->orderBy('created_at',$order)
            ->get();
    }
}

<?php


namespace App\Models;


use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class ModelAuth
{
    public function register(AuthRequest $request)
    {
        DB::beginTransaction();
        try {
            $ok=DB::table('user')
                ->insert(['username'=>$request->input('username'),'email'=>$request->input('email'),'password'=>md5($request->input('password')),"created_at"=>date('Y-m-d H:i:s'),"updated_at"=>date('Y-m-d H:i:s'),'role_id'=>1]);
            DB::commit();
            return $ok;

        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function login(LoginRequest $request)
    {
        return DB::table('user')
            ->select('id','username','role_id')
            ->where([
                'email'=>$request->input('email'),
                'password'=>md5($request->input('password'))
            ])
            ->first();
    }
}

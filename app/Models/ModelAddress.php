<?php


namespace App\Models;


use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelAddress
{

    public function getAdressesByUserId($id)
    {
        return DB::table('address')
            ->where("user_id",$id)
            ->get();
    }
    public function getAdressesById($id,$userid)
    {
        return DB::table('address')
            ->where("id",$id)
            ->where('user_id',$userid)
            ->first();
    }


    public function insert(AddressRequest $request,$id)
    {
        $city=$request->input('city');
        $san=$request->input('san');
        $zipcode=$request->input('zipcode');
        $telephone=$request->input('telephone');

        DB::beginTransaction();
        try {
            $ok=DB::table('address')
                ->insert(['city' => $city, 'street' => $san, 'post_code' => $zipcode, 'telephone' => $telephone, 'user_id' => $id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
            DB::commit();
            return $ok;
            }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function update(AddressRequest $request,$id)
    {
        $city=$request->input('city');
        $san=$request->input('san');
        $zipcode=$request->input('zipcode');
        $telephone=$request->input('telephone');
        $idAddress=$request->input('idAddress');

        DB::beginTransaction();
        try {
            $ok=DB::table('address')
                ->where([
                    ['id', '=', $idAddress],
                    ['user_id', '=', $id]])
                ->update(['city' => $city, 'street' => $san, 'post_code' => $zipcode, 'telephone' => $telephone, 'updated_at' => date('Y-m-d H:i:s')]);
            DB::commit();
            return $ok;
            }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }

    }

    public function updateMyAccount(Request $request,$id)
    {
        $data=[];
        $username=$request->input('username');
        $data['username']=$username;
        if($request->input('password')!=null)
        {
            $data['password']=md5($request->input('newpassword'));
        }

        DB::beginTransaction();
        try {
            $ok=DB::table('user')
                ->where('id',$id)
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

    public function getUserByPassword($password,$id)
    {
        return DB::table('user')
            ->where('id',$id)
            ->where('password',md5($password))
            ->first();
    }



}

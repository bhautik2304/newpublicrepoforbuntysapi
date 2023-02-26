<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @$req \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["staff" => staff::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @$req \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //

        $data =  json_decode($req->datas);
        $table = new staff;
        $table->storeid =$store = $req->header('Store');
        $table->stafftypesid =$data->stufftype;

        $table->firstname = $data->firstname;
        $table->secondname = $data->secondname;
        $table->lastname = $data->lastame;
        $table->email = $data->email;
        $table->mobaile = $data->mobaile;
        $table->whatsapp_mobaile = $data->whatmobaile;

        $table->birthday = $data->birthday;
        $table->annyversy_day = $data->marrige_anny;
        $table->gender = $data->gender;
        $table->maritial_status = $data->marit_status;

        $table->city = $data->city;
        $table->state = $data->state;
        $table->pin = $data->pin;
        $table->per_add = $data->permenentAddress;
        $table->res_add = $data->ResidentAddresses;

        $table->job_starting_time = $data->jobstart;
        $table->job_hours = $data->jobhours;
        $table->weekend = $data->Weekend;

        $table->sallery = $data->sallery;
        $table->product_sale = $data->ProductSale;
        $table->service_sale = $data->serviceSale;
        $table->service_exc = $data->serviceExicute;
        $table->pkg_sale = $data->PkgSale;

        $table->profile_img = $this->fileStore($req, 'profile_img', 'stuffprofile', );
        $table->addhar_doc_url = $this->fileStore($req, 'adhar_card', 'stuffdoc', );
        $table->pan_doc_url = $this->fileStore($req, 'pancard', 'stuffdoc', );
        $table->drl_doc_url = $this->fileStore($req, 'driving_liences', 'stuffdoc', );
        $table->bank_account_doc = $this->fileStore($req, 'bankstatement', 'stuffdoc', );

        $table->addhar_no = $data->addhar_no;
        $table->pan_no = $data->pan_no;
        $table->drl_no = $data->drl_no;
        $table->insuriuns = $data->ins;
        $table->mediclaim = $data->mediClaim;

        $table->pf = $data->pf;
        $table->bank_account_no = $data->bank_account_no;
        $table->bank_account_ifc = $data->bank_account_ifc;
        $table->bank_name = $data->bank_name;
        $table->bank_account_holder_name = $data->bank_account_holder_name;
        $table->save();
        $userlogin=false;
        if ($data->userlogin) {
            # code...Create Users
            $users = new User;
            $users->storeid = $req->header('Store');
            $users->staffid  = $table->id;
            $users->name = $data->firstname;
            $users->email = $table->email;
            $users->mobaile = $table->mobaile;
            $users->password = Hash::make($table->mobaile);
            $userlogin =$users->save();
        }
        $respo="Staff $table->firstname $table->lastname Created Succesfully ".($userlogin ? "With Login Register User" : "No login");
        return response(["msg" => $respo], 200);
    }


    // File Store Function
    protected function fileStore($req, $files, $folder)
    {
        # code...
        if ($req->has($files)) {
            return 'We are NOt Get a file';
        }
        $file = $req->file($files);
        $name = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $name);
        return url("$folder/$name");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function update(Request $req, staff $staff,$id)
    {
        //
        $dat=$req;
        if(!($req->header('UserType')=='admin')){
            return response(["msg"=>"You can't Update Staff Data"],200);
        }
        $staff->find($id)->update([
            'stafftypesid'=>$dat->stufftype,

            'firstname'=>$dat->firstname,
            'secondname'=>$dat->secondname,
            'lastname'=>$dat->lastname,
            'email'=>$dat->email,
            'mobaile'=>$dat->mobaile,
            'whatsapp_mobaile'=>$dat->whatmobaile,
            'birthday'=>$dat->birthday,
            'annyversy_day'=>$dat->marrige_anny,
            'gender'=>$dat->gender,
            'maritial_status'=>$dat->marit_status,

            'city'=>$dat->city,
            'state'=>$dat->state,
            'pin'=>$dat->pin,
            'per_add'=>$dat->permenentAddress,
            'res_add'=>$dat->ResidentAddresses,

            'job_starting_time'=>$dat->jobstart,
            'job_hours'=>$dat->jobhours,
            'weekend'=>$dat->Weekend,

            'sallery'=>$dat->sallery,
            'product_sale'=>$dat->ProductSale,
            'service_sale'=>$dat->serviceSale,
            'service_exc'=>$dat->serviceExicute,
            'pkg_sale'=>$dat->PkgSale,

            'addhar_no'=>$dat->addhar_no,
            'pan_no'=>$dat->pan_no,
            'drl_no'=>$dat->drl_no,
            'insuriuns'=>$dat->ins,
            'mediclaim'=>$dat->mediClaim,
            'pf'=>$dat->pf,

            'bank_account_no'=>$dat->bank_account_no,
            'bank_account_ifc'=>$dat->bank_account_ifc,
            'bank_name'=>$dat->bank_name,
            'bank_account_holder_name'=>$dat->bank_account_holder_name,
        ]);
       $staffs= $staff->find($id);
        return response(["msg"=>"$staffs->firstname Updated Successfully"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function destroy(Request $req,staff $staff,$id)
    {
        //
        if(!($req->header('UserType')=='admin')){
            return response(["msg"=>"You can't Deleted Staff Data"],200);
        }

        $stafss=$staff->find($id);
        $staff->find($id)->delete();
        return response(["msg"=>"$stafss->firstname Deleted Successfully"],200);
    }

    public function userCreate($user,$store,$data)
    {
        # code...
        $users = new User;
        $users->storeid = $store;
        $users->role_id  = 1;
        $users->staff_id  = $user->id;
        $users->email = $user->email;
        $users->mobaile = $user->mobaile;
        $users->password = Hash::make($user->mobaile);
        $users->save();

        return $user->save();
    }
}

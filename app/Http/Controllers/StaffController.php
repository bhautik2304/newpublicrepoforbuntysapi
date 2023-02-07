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
     * Show the form for creating a new resource.
     *
     * @$req \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = json_decode($req->datas);
        $table = new staff;
        $table->storeid =$store = $req->header('store');
        $table->stafftypesid =$data->stufftype;


        $table->name = $data->middelname;
        $table->lastname = $data->lastname;
        $table->firstname = $data->firstname;
        $table->email = $data->email;
        $table->mobaile = $data->mobaile;
        $table->whatsapp_mobaile = $data->whatmobaile;


        $table->birthday = $data->birthday;
        $table->annyversy_day = $data->marrige_anny;


        $table->gender = $data->gender;
        $table->maritial_status = 1; //$data->marit_status;


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

        $this->userCreate($table,$data, $store);

        return response(["msg" => "Staff $table->firstname $table->lastname Created Succesfully"], 200);
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
     * Display the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function update(Request $req, staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function destroy(staff $staff,$id)
    {
        //
        $staff->find($id)->delete();
        return response(["msg"=>"delated Service"],200);
    }

    public function userCreate($user,$store,$data)
    {
        # code...
        $user = new User;
        $user->storeid = $store;
        $user->role_id  = 1;
        $user->staff_id  = $user->id;
        $user->email = $user->email;
        $user->mobaile = $user->mobaile;
        $user->password = Hash::make(123456);
        $user->save();

        return $user->save();
    }
}

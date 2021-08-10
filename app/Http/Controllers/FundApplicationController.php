<?php

namespace App\Http\Controllers;

use App\Models\FundApplication;
use App\Models\User;
use App\Shared\Cast\MoneyFactory;
use Illuminate\Http\Request;
use DateTime;
use FundApplicationStatus;
use Ramsey\Uuid\Uuid;

class FundApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fundapp = new FundApplication([
            'id'                    => Uuid::uuid4(),
            'application_number'    => $request->application_number,
            'about'                 => $request->about,
            'item_description'      => $request->item_description,
            'quantity'              => $request->quantity,
        ]);

        $fundapp->application_date  = date_format(new DateTime($request->application_date), 'Y-m-d');
        $fundapp->unitPrice         = MoneyFactory::create($request->unit_price_amount);
        //query aritmatika
        $fundapp->total             = MoneyFactory::create($request->unit_price_amount * $request->quantity);
        $fundapp->status            = FundApplicationStatus::PENDING;

        $user = User::findOrFail($request->user_id); //$user dicari id nya untuk dimasukan ke user_id
        $fundapp->user()->associate($user); //membuat relasi dengan fungsi user di traits untuk $user


        $fundapp->save();
        return $fundapp;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fundapp = FundApplication::findOrFail($id);
        return $fundapp;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fundapp = FundApplication::findOrFail($id);

        $fundapp->application_date      = $request->application_date;
        $fundapp->application_number    = $request->application_number;
        $fundapp->about                 = $request->about;
        $fundapp->item_description      = $request->item_description;
        $fundapp->quantity              = $request->quantity;
        $fundapp->status                = $request->status;

        $user = User::findOrFail($request->user_id);
        $fundapp->user()->associate($user);


        $fundapp->application_date  = date_format(new DateTime($request->application_date), 'Y-m-d');
        $fundapp->unitPrice         = MoneyFactory::create($request->unit_price_amount);
        $fundapp->total             = MoneyFactory::create($request->unit_price_amount * $request->quantity);

        $user = User::findOrFail($request->user_id);
        $fundapp->user()->associate($user);

        $fundapp->save();
        return $fundapp;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fundapp = FundApplication::findOrFail($id);

        $fundapp->delete();
        return $fundapp;
    }

    public function reject($id) //approval belum
    {
        $this->middleware('role:')
        $fundapp = FundApplication::findOrFail($id);
        $fundapp->status = FundApplicationStatus::REJECTED;

        $fundapp->save();
        return $fundapp;
    }

    public function approve($id)
    {
        $fundapp = FundApplication::findOrFail($id);
        $fundapp->status = FundApplicationStatus::APPROVED;

        $fundapp->save();
        return $fundapp;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\FundApplication;
use App\Models\User;
use App\Shared\Cast\MoneyFactory;
use Illuminate\Http\Request;
use Money\Currency;
use Money\Money;
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
            'id'                => Uuid::uuid4(),
            'application_date'  => $request->application_date,
            'no_fund'           => $request->no_fund,
            'about'             => $request->about,
            'item_description'  => $request->item_description,
            'quantity'          => $request->quantity,
            'status'            => $request->status

        ]);

        $fundapp->total = MoneyFactory::create($request->unit_price * $request->quantity, $request->currency);
        $fundapp->unitPrice = MoneyFactory::create($request->unit_price, $request->currency);
       // $fundapp->unitPrice = new Money($request->unit_price, new Currency($request->currency));
        //$fundapp->total = new Money($request->unit_price * $request->quantity, new Currency($request->currency));

        $user = User::findOrFail($request->user_id);
        $fundapp->user()->associate($user);

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

        $fundapp->application_date = $request->application_date;
        $fundapp->no_fund = $request->no_fund;
        $fundapp->about = $request->about;
        $fundapp->item_description = $request->item_description;
        $fundapp->unit_price = $request->unit_price;
        $fundapp->quantity = $request->quantity;
        $fundapp->total = $request->total;
        $fundapp->status = $request->status;

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
}

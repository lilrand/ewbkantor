<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Division;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
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
        $user = new User([
            'id' => Uuid::uuid4(),
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => "ACTIVE",

        ]);

        $branch = Branch::findOrFail($request->branch_id);
        $division = Division::findOrFail($request->division_id);
        $level = Level::findOrFail($request->level_id);

        $user->branch()->associate($branch);
        $user->division()->associate($division);
        $user->level()->associate($level);

        $user->save();

        return $user;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return $user;
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
        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;

        $branch = Branch::findOrFail($request->branch_id);
        $division = Division::findOrFail($request->division_id);
        $level = Level::findOrFail($request->level_id);

        $user->branch()->associate($branch);
        $user->division()->associate($division);
        $user->level()->associate($level);

        $user->save();

        return $user;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueRole;
use Illuminate\Http\Request;

class HistoriqueRoleController extends Controller
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
            $data=$request->session()->all();
            $name=$data['name'][0];

            HistoriqueRole::create([
                "role" => $request->role,
                "username" => $name,
                "direction" => $request->direction,
            ]);
            
            $historique= HistoriqueRole::all();

            return $historique;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriqueRole  $historiqueRole
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriqueRole $historiqueRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoriqueRole  $historiqueRole
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriqueRole $historiqueRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoriqueRole  $historiqueRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriqueRole $historiqueRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoriqueRole  $historiqueRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoriqueRole $historiqueRole)
    {
        //
    }
}

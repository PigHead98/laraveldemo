<?php

namespace App\Http\Controllers;

use App\ql_khachhang;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ql_khachhang  $user
     * @return \Illuminate\Http\Response
     */
    public function show(ql_khachhang $user, Request $request)
    {
        $data = $user::all();
        $search = $request->all();
        if (!empty($search))
        {
            $data = $user::where('MaPhong','like',$search['searchUser'])
                ->orwhere('TenKH','like','%'.$search['searchUser'].'%')
                ->orwhere('CMND','like',$search['searchUser'])
                ->orwhere('SoDienThoai','like',$search['searchUser'])
                ->get();
        }
        return view('main', [
            'name'      => 'an',
            'number'    =>  '1',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'user.tat-ca',
            'type-room' => '',
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ql_khachhang  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(ql_khachhang $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ql_khachhang  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ql_khachhang $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ql_khachhang  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(ql_khachhang $user)
    {
        //
    }
}

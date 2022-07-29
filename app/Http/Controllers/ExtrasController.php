<?php

namespace App\Http\Controllers;

use App\Models\Extras;
use App\Service\UploadService;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.extras.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,UploadService $service)
    {

        $data=$request->except('_token','image');
        $extras=Extras::create($data);


        if($request->image){
            $attachment['name']=$service->upload($request->image,'images');

            $extras->attachment()->create($attachment);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function show(Extras $extras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function edit(Extras $extras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extras $extras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extras $extras)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Message::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function($data){
                    return $data->user->name;
                })

                ->addColumn('email', function($data){
                    return $data->user->email;
                })
                ->addColumn('phone', function($data){
                    return $data->user->phone;
                })
                ->addColumn('content', function($data){
                    $contentTag = "<a class='img-thumbnail'   href=".asset("images")."/".$data->id."> <i class='fa fa-eye'></i> <a> " ;
                    return $contentTag;
                })
                ->addColumn('time', function($data){
                    return $data->created_at->diffForHumans();
                })
                ->addColumn('attachment', function($data){
                    $attachmentTag = "<a class='img-thumbnail'   href=".asset("images")."/".$data->id.">";
                    return $attachmentTag;
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['user_name','email','phone','content','time','attachment','action'])
                ->make(true);
        }


        return  view('dashboard.messages.index');
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

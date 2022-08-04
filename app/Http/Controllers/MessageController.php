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
                ->addColumn('user_name', function ($data) {
                    return $data->user->name;
                })

                ->addColumn('email', function ($data) {
                    return $data->user->email;
                })
                ->addColumn('phone', function ($data) {
                    return $data->user->phone;
                })
                ->addColumn('content', function($data){
                    $time=$data->created_at->diffForHumans();
                    $contentTag = "<a   class='btn btn-primary' style='width:100%' data-toggle='modal'   data-target='#showMessage'

                    data-time='$time'
                    data-attachment=asset('images')/$data->id
                    data-content='$data->content'
                    data-send-name='{$data->user->name}'

                    > <i class='fa fa-envelope'></i> <a> " ;
                    return $contentTag;
                })
                ->addColumn('time', function ($data) {
                    return $data->created_at->diffForHumans();
                })
                ->addColumn('attachment', function($data){
                    $attachmentTag = "<a class=' btn btn-success ' style='width:100%'  download  href=".asset("images")."/".$data->id."> <i class='fa fa-arrow-down'></i> </a>";
                    return $attachmentTag;
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a  data-id='.$data->id.' style="width:100%" class="delete btn btn-danger btn-bg"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['user_name', 'email', 'phone', 'content', 'time', 'attachment', 'action'])
                ->make(true);
        }


        return  view('dashboard.messages.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $nameAttach = $message->attachment->name;
        return  view('dashboard.messages.show', ['nameAttach' => $nameAttach, 'message' => $message]);
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
      $message->delete();
      return  response()->json(['status'=>'success']);

    }
}

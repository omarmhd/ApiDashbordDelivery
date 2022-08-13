<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Driver;
use App\Models\Role;
use App\Models\User;
use App\Service\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {



        if ($request->ajax()) {

            $data = User::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role',function ($data){
                    return '<span class="bg-blue">'.$data->roles[0]->name.'</span>';

                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('user.edit', $data) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['role','action'])
                ->make(true);
        }

        return  view('dashboard.users.index');
    }

    public function indexDrivers(Request  $request){
        if ($request->ajax()) {
            $data = User::whereHas(
                'roles', function($q){

                $q->where('name', 'driver');

            }
            )->latest()->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('user.edit', $data) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function dataTable()
    {

        $data = User::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('index.user') . '" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $user = new User();
        return  view('dashboard.users.create', ['roles' => $roles, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request, UploadService $service)
    {
        $data = $request->except(['password', 'role', 'image']);



        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->attachRole($request->role);
        if ($user->hasRole('driver')){
            Driver::create(['user_id'=>$user->id]);
        }

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $user->attachment()->create($attachment);
        }



        return redirect()->route('user.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return  view('dashboard.users.edit', ['roles' => $roles, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, UploadService $service)
    {
        $data = $request->except(['password', 'image']);

        if ($request->getPassword()) {
            $data['password'] = bcrypt($request->getPassword());
        } else {
            unset($data['password']);
        }


        $user->syncRoles([$request->role]);
        if($request->role!=="driver" and $user->hasRole('driver')){
                $user->driver->delete;
        }

        $user->update($data);



        if ($request->image) {
            $name = $service->upload($request->image, 'images');
            $user->attachment()->UpdateOrCreate(['name' => $name]);
        }

        Session::flash('success', 'تم الإضافة بنجاح');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}

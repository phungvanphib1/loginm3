<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::search()->paginate(4);;
        $users= User::get();
        $param = [
            'groups' => $groups,
            'users' => $users
        ];
        return view('admin.group.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
        $group=new Group();
        $group->name=$request->name;
        $group->save();
        return redirect()->route('group.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('admin.group.edit', compact('group') );
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
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('group.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.detail',$params);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function group_detail(Request $request,$id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return redirect()->route('group.index')->with($notification);;
    }
}

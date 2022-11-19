<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequet;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{


    public function index(){
        $this->authorize('viewAny', User::class);
        $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }

    public function showAdmin(){

        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('admin.user.admin', $param);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.user.add', $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();
        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];


        // $productshow-> show();
        return view('admin.user.profile',  $param );
    }

    public function edit($id)
    {
        $this->authorize('view', User::class);
        $user = User::find($id);
        $groups=Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.user.edit' , $param);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    // hiển thị form đổi mật khẩu
    public function editpass($id){
        $this->authorize('view', User::class);
        $user = User::find($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.user.editpass', $param);
    }

     // hiển thị form đổi mật khẩu
     public function adminpass($id){
        $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.user.adminpass', $param);
    }

    // chỉ có superAdmin mới có quyền đổi mật khẩu người kh
    public function adminUpdatePass(Request $request, $id){
        $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        if($request->renewpassword==$request->newpassword)
        {
            $item = User::find($id);
            $item->password= bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);

        }else{
            $notification = [
                'sainhap' => 'Bạn nhập mật khẩu không trùng khớp!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function updatepass(UserRequet $request)
    {
        if($request->renewpassword==$request->newpassword)
        {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item=User::find(Auth()->user()->id);
                $item->password= bcrypt($request->newpassword);
                $item->save();
                $notification = [
                    'message' => 'Đổi mật khẩu thành công!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.index')->with($notification);
            }else{
                // dd($request);
                $notification = [
                    'saipass' => '!',

                ];
                return back()->with($notification);
            }
        }else{
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $notification = [
            'sainhap' => '!',
        ];

        $user = User::find($id);
        if($user->group->name!='Supper Admin'){
            $user->delete();
        }
        else{
            return dd(__METHOD__);
        }
    }
    //Hiển Thị Đăng Nhập
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.home');
        } else {
            return view('auth.login');
        }
    }

    //xử lí đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // dd($request->all());
            $request->session()->regenerate();

            return redirect()->route('dashboard.home');
        }
        $notification = [
            'message' => 'error',
        ];
        return back()->with($notification);

    }

    //Hiển Thị Đăng Ký
    public function viewRegister()
    {
        return view('auth.register');
    }
    //xử lí đăng ký
    public function register(UserRequet $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error("message:" . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}

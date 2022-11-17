<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequet;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(){
        $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function store(UserRequet $request)
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
        // $product->image = $request->image;
        // try {
        //     $user->save();
        //     return redirect()->route('login');
        // } catch (\Exception $e) {
        //     Log::error("message:" . $e->getMessage());
        // }
        $user->save();
        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function show($id)
    {

        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];


        // $productshow-> show();
        return view('admin.user.profile',  $param );
    }

    public function edit($id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
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
        $error = [
            'message' => 'error',
        ];
        return back()->with($error);
        // ->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
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


    //api

    protected $user;

    public function __construct( User  $user )
    {
        // $customer = new Customer();
        // or
        $this->user = $user;
    }
    public function api_index(){
        $user = $this->user->get();

        return response()->json($user, 200);
    }

    public function api_show($id){
        $user = $this->user->find($id);
        $status = 200;
        if(!$user){
            $status = 404;
        }
        return response()->json($user , $status);
    }

    public function api_update(Request $request, $id){
        $this->user->where('id',$id)->update([
            'name'=> $request->	name,
            'email '=> $request->email ,
            'phone'=> $request->phone,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'birthday'=> $request->birthday
        ]);
        $user = $this->user->find($id);
        $status = 200;
        if(!$user){
            $status = 404;
        }
        return response()->json($user , $status);

    }

}

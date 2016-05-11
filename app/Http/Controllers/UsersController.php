<?php

namespace App\Http\Controllers;

use App\Districts;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            $model = Users::where('username','<>','minhtran')
                ->where('username','<>','huongvu')
                ->get();

            return view('system.users.index')
                ->with('model',$model)
                ->with('pageTitle','Danh sách tài khoản');

        }else
            return view('errors.notlogin');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('admin')) {
            return view('system.users.create')
                ->with('pageTitle','Thêm mới tài khoản');

        }else
            return view('errors.notlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {

            $insert = $request->all();
            $model = new Users();
            $model->name = $insert['name'];
            $model->phone = $insert['phone'];
            $model->email = $insert['email'];
            $model->username = $insert['user'];
            $model->password = md5($insert['password']);
            $model->status = $insert['status'];
            $model->level = 'H';
            $model->mahuyen = $insert['mahuyen'];
            $model->save();

            return redirect('user');

        }else
            return view('errors.notlogin');
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
        if (Session::has('admin')) {

            $model = Users::findOrFail($id);
            return view('system.users.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin tài khoản');

        }else
            return view('errors.notlogin');
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
        if (Session::has('admin')) {

            $update = $request->all();
            $model = Users::findOrFail($id);
            $model->name = $update['name'];
            $model->phone = $update['phone'];
            $model->email = $update['email'];
            $model->status = $update['status'];
            $model->mahuyen = $update['mahuyen'];
            $model->level = $update['level'];

            $model->save();

            return redirect('user');

        }else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::has('admin')) {

            $model = Users::findOrFail($id);
            $model->delete();
            return redirect('user');

        }else
            return view('errors.notlogin');
    }

    public function login()
    {
        return view('system.users.login')
            ->with('pageTitle','Đăng nhập hệ thống');
    }

    public function signin(Request $request)
    {
        $check = Users::where('username','=',$request->all()['username'])->count();
        if($check == 0)
            return view('errors.invalid-user');
        else
            $ttuser = Users::where('username','=',$request->all()['username'])->first();

        if(md5($request->all()['password'])== $ttuser->password){
            if($ttuser->status == "Kích hoạt"){
                Session::put('admin', $ttuser);
                return redirect('')
                    -> with('pageTitle', 'Tổng quan');
            }else
                return view('errors.lockuser');

        }else
            return view('errors.invalid-pass');
    }

    public function lockuser($id){

        $arrayid = explode('-', $id);
        foreach ($arrayid as $id) {
            $model = Users::findOrFail($id);
            $model->status = "Vô hiệu";
            $model->save();
        }
        return redirect('user');

    }

    public function unlockuser($id){

        $arrayid = explode('-', $id);

        foreach ($arrayid as $id) {
            $model = Users::findOrFail($id);
            $model->status = "Kích hoạt";
            $model->save();
        }
        return redirect('user');

    }

    public function logout() {

        if (Session::has('admin'))
        {
            Session::flush();
            return redirect('/login');

        }else {
            dd('Bạn chưa đăng nhập! ');
        }
    }

    public function cp(){

        if(Session::has('admin')){

            return view('system.users.change-password')
                ->with('pageTitle','Thay đổi mật khẩu');

        }else
            return view('errors.notlogin');

    }

    public function cpw(Request $request){

        $update = $request->all();

        $username = session('admin')->username;

        $password = session('admin')->password;

        $newpass2 = $update['newpassword2'];

        $currentPassword = $update['current-password'];

        if(md5($currentPassword) == $password){
            $ttuser = Users::where('username','=',$username)->first();
            $ttuser->password = md5($newpass2);
            if($ttuser->save()){
                Session::flush();
                return redirect('/login');
            }
        }else{
            dd('Mật khẩu cũ không đúng???');
        }
    }

    public function permission($id){
        if (Session::has('admin')) {

            $model = Users::where('id','=',$id)->first();

            //$permission = $model->permission;
            $permission = !empty($model->permission)  ? $model->permission : getPermissionDefault($model->level);
            //dd(json_decode($permission));
            return view('system.users.perms')
                ->with('permission',json_decode($permission))
                ->with('model',$model)
                ->with('pageTitle','Phân quyền cho tài khoản');

        }else
            return view('errors.notlogin');
    }

    public function uppermission(Request $request){
        if (Session::has('admin')) {
            $update = $request->all();
            $id = $request['id'];

            $model = Users::findOrFail($id);
            //dd($model);
            if(isset($model)){

                $update['roles'] = isset($update['roles']) ? $update['roles'] : null;
                $model->permission = json_encode($update['roles']);
                $model->save();
                return redirect('user');

            }else
                dd('Tài khoản không tồn tại');

        }else
            return view('errors.notlogin');

    }
}

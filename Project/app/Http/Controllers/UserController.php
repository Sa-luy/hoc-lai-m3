<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Roles;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        // $roles = $this->role->all();
        return view('admin.users.add',);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8',],
        ]);
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->day_of_birth = $request->day_of_birth;
            $user->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                // $product->image = $newFileName;// cột image gán bằng tên file mới
                $request->file('image')->storeAs('public/images/user', $newFileName); //lưu file vào mục public/images với tê mới là $newFileName
                $user->image = $newFileName;
            }
            $user->save();
            // $user->roles()->attach($request->role_id);
            DB::commit();
            Session::flash('success', 'Thêm  thành công');

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        // $roles = $this->role->all();
        $user = $this->user->findOrFail($id);
        // $rolesUser = $user->roles;
        // echo '<pre>';
        // print_r($rolesUser);
        // die();

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        dd($request);
        try {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $file = $request->file;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                // $product->image = $newFileName;// cột image gán bằng tên file mới
                $request->file('image')->storeAs('public/images/user', $newFileName); //lưu file vào mục public/images/user với tê mới là $newFileName
                $user->image = $newFileName;
            }

            // $users = $this->user->findOrFail($id);
            // $users->roles()->sync($request->role_id);
            DB::commit();
            Session::flash('messages', 'Update thành công');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }

    public function trashed()
    {
        try {
            $users = $this->user->onlyTrashed()->paginate(5);
            return view('admin.users.recycle', compact('users'));
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->delete();
            Session::flash('success', 'Đã chuyển vào thùng rác');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            abort(403);
            Log::eror('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }



    //khôi phục thùng rác
    public function restore($id)
    {
        try {
            $user = $this->user->withTrashed()->where('id', $id)->restore();;

            Session::flash('success', 'Phục Hồi thành công');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
    //focre delete
    // public function delete(Request $request){

    // $validated = $request->validate(
    //     [
    //         'ids' => 'required',
    //     ],
    //     [
    //         'ids.required' => 'Bạn phải chọn ô',
    //     ],
    // );
    //    $id=$request->post;
    //    $this->user::whereIn('id', $id)->delete();
    //    return redirect()->route('users.index')->with('messages', 'Xóa user thành công');
    // }

}

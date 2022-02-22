<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UsersRequest;
use Gate;

class UsersController extends Controller
{

    public function index()
    {
        if (Gate::none(['users_allow', 'users_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Users::orderByDesc("id")->get();
        return view("admin.users.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index"));
        }
        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.users.store");
        
        
		$roles1_all = Users::ROLES1_CONS;
        return view("admin.users.manage")->with(compact('admiko_data','roles1_all'));
    }

    public function store(UsersRequest $request)
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index"));
        }
        $data = $request->all();
        
        $Users = Users::create($data);
        
        return redirect(route("admin.users.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Users = Users::find($id);
        if (Gate::none(['users_allow', 'users_edit']) || !$Users) {
            return redirect(route("admin.users.index"));
        }

        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.users.update", [$Users->id]);
        
        
		$roles1_all = Users::ROLES1_CONS;
        $data = $Users;
        return view("admin.users.manage")->with(compact('admiko_data', 'data','roles1_all'));
    }

    public function update(UsersRequest $request,$id)
    {
        if (Gate::none(['users_allow', 'users_edit'])) {
            return redirect(route("admin.users.index"));
        }
        $data = $request->all();
        $Users = Users::find($id);
        $Users->update($data);
        
        return redirect(route("admin.users.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index"));
        }
        Users::destroy($request->idDel);
        return back();
    }
    
    
    
}

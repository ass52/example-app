<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin\Application;
use App\Http\Controllers\Controller;
use App\Models\Admin\Application\Add;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Application\AddRequest;
use Gate;

class AddController extends Controller
{

    public function index()
    {
        if (Gate::none(['add_allow', 'add_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Add::where("admiko_application_id",Request()->admiko_application_id)->orderByDesc("id")->get();
        return view("admin.application.add.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['add_allow'])) {
            return redirect(route("admin.add.index",[Request()->admiko_application_id]));
        }
        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.add.store",[Request()->admiko_application_id]);
        
        
        return view("admin.application.add.manage")->with(compact('admiko_data'));
    }

    public function store(AddRequest $request)
    {
        if (Gate::none(['add_allow'])) {
            return redirect(route("admin.add.index",[Request()->admiko_application_id]));
        }
        $data = $request->all();
        
		$data["admiko_application_id"] = Request()->admiko_application_id;
        $Add = Add::create($data);
        
        return redirect(route("admin.add.index",[Request()->admiko_application_id]));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($admiko_application_id,$id)
    {
        $Add = Add::find($id);
        if (Gate::none(['add_allow', 'add_edit']) || !$Add) {
            return redirect(route("admin.add.index",[$admiko_application_id]));
        }

        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.add.update", [$admiko_application_id,$Add->id]);
        
        
        $data = $Add;
        return view("admin.application.add.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(AddRequest $request,$admiko_application_id,$id)
    {
        if (Gate::none(['add_allow', 'add_edit'])) {
            return redirect(route("admin.add.index",[$admiko_application_id]));
        }
        $data = $request->all();
        $Add = Add::find($id);
        $Add->update($data);
        
        return redirect(route("admin.add.index",[$admiko_application_id]));
    }

    public function destroy(Request $request,$admiko_application_id)
    {
        if (Gate::none(['add_allow'])) {
            return redirect(route("admin.add.index",[$admiko_application_id]));
        }
        Add::destroy($request->idDel);
        return back();
    }
    
    
    
}

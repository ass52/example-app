<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Application;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ApplicationRequest;
use Gate;

class ApplicationController extends Controller
{

    public function index()
    {
        if (Gate::none(['application_allow', 'application_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Application::$admiko_file_info;
        $tableData = Application::orderBy("id")->get();
        return view("admin.application.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['application_allow'])) {
            return redirect(route("admin.application.index"));
        }
        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.application.store");
        $admiko_data["fileInfo"] = Application::$admiko_file_info;
        
        return view("admin.application.manage")->with(compact('admiko_data'));
    }

    public function store(ApplicationRequest $request)
    {
        if (Gate::none(['application_allow'])) {
            return redirect(route("admin.application.index"));
        }
        $data = $request->all();
        
        $Application = Application::create($data);
        
        return redirect(route("admin.application.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Application = Application::find($id);
        if (Gate::none(['application_allow', 'application_edit']) || !$Application) {
            return redirect(route("admin.application.index"));
        }

        $admiko_data['sideBarActive'] = "application";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.application.update", [$Application->id]);
        $admiko_data["fileInfo"] = Application::$admiko_file_info;
        
        $data = $Application;
        return view("admin.application.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(ApplicationRequest $request,$id)
    {
        if (Gate::none(['application_allow', 'application_edit'])) {
            return redirect(route("admin.application.index"));
        }
        $data = $request->all();
        $Application = Application::find($id);
        $Application->update($data);
        
        return redirect(route("admin.application.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['application_allow'])) {
            return redirect(route("admin.application.index"));
        }
        Application::destroy($request->idDel);
        return back();
    }
    
    
    
}

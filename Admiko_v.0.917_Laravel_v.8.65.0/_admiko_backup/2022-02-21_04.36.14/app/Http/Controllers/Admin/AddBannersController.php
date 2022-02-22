<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AddBanners;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AddBannersRequest;
use Gate;

class AddBannersController extends Controller
{

    public function index()
    {
        if (Gate::none(['add_banners_allow', 'add_banners_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "add_banners";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = AddBanners::orderByDesc("id")->get();
        return view("admin.add_banners.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['add_banners_allow'])) {
            return redirect(route("admin.add_banners.index"));
        }
        $admiko_data['sideBarActive'] = "add_banners";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.add_banners.store");
        
        
		$status_all = AddBanners::STATUS_CONS;
        return view("admin.add_banners.manage")->with(compact('admiko_data','status_all'));
    }

    public function store(AddBannersRequest $request)
    {
        if (Gate::none(['add_banners_allow'])) {
            return redirect(route("admin.add_banners.index"));
        }
        $data = $request->all();
        
        $AddBanners = AddBanners::create($data);
        
        return redirect(route("admin.add_banners.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $AddBanners = AddBanners::find($id);
        if (Gate::none(['add_banners_allow', 'add_banners_edit']) || !$AddBanners) {
            return redirect(route("admin.add_banners.index"));
        }

        $admiko_data['sideBarActive'] = "add_banners";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.add_banners.update", [$AddBanners->id]);
        
        
		$status_all = AddBanners::STATUS_CONS;
        $data = $AddBanners;
        return view("admin.add_banners.manage")->with(compact('admiko_data', 'data','status_all'));
    }

    public function update(AddBannersRequest $request,$id)
    {
        if (Gate::none(['add_banners_allow', 'add_banners_edit'])) {
            return redirect(route("admin.add_banners.index"));
        }
        $data = $request->all();
        $AddBanners = AddBanners::find($id);
        $AddBanners->update($data);
        
        return redirect(route("admin.add_banners.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['add_banners_allow'])) {
            return redirect(route("admin.add_banners.index"));
        }
        AddBanners::destroy($request->idDel);
        return back();
    }
    
    
    
}

<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdInterstaitals;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdInterstaitalsRequest;
use Gate;

class AdInterstaitalsController extends Controller
{

    public function index()
    {
        if (Gate::none(['ad_interstaitals_allow', 'ad_interstaitals_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "ad_interstaitals";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = AdInterstaitals::orderByDesc("id")->get();
        return view("admin.ad_interstaitals.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['ad_interstaitals_allow'])) {
            return redirect(route("admin.ad_interstaitals.index"));
        }
        $admiko_data['sideBarActive'] = "ad_interstaitals";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ad_interstaitals.store");
        
        
		$status_all = AdInterstaitals::STATUS_CONS;
        return view("admin.ad_interstaitals.manage")->with(compact('admiko_data','status_all'));
    }

    public function store(AdInterstaitalsRequest $request)
    {
        if (Gate::none(['ad_interstaitals_allow'])) {
            return redirect(route("admin.ad_interstaitals.index"));
        }
        $data = $request->all();
        
        $AdInterstaitals = AdInterstaitals::create($data);
        
        return redirect(route("admin.ad_interstaitals.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $AdInterstaitals = AdInterstaitals::find($id);
        if (Gate::none(['ad_interstaitals_allow', 'ad_interstaitals_edit']) || !$AdInterstaitals) {
            return redirect(route("admin.ad_interstaitals.index"));
        }

        $admiko_data['sideBarActive'] = "ad_interstaitals";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ad_interstaitals.update", [$AdInterstaitals->id]);
        
        
		$status_all = AdInterstaitals::STATUS_CONS;
        $data = $AdInterstaitals;
        return view("admin.ad_interstaitals.manage")->with(compact('admiko_data', 'data','status_all'));
    }

    public function update(AdInterstaitalsRequest $request,$id)
    {
        if (Gate::none(['ad_interstaitals_allow', 'ad_interstaitals_edit'])) {
            return redirect(route("admin.ad_interstaitals.index"));
        }
        $data = $request->all();
        $AdInterstaitals = AdInterstaitals::find($id);
        $AdInterstaitals->update($data);
        
        return redirect(route("admin.ad_interstaitals.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['ad_interstaitals_allow'])) {
            return redirect(route("admin.ad_interstaitals.index"));
        }
        AdInterstaitals::destroy($request->idDel);
        return back();
    }
    
    
    
}

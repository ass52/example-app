<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdRewards;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdRewardsRequest;
use Gate;
use App\Models\Admin\AdInterstaitals;
use App\Models\Admin\Application;

class AdRewardsController extends Controller
{

    public function index()
    {
        if (Gate::none(['ad_rewards_allow', 'ad_rewards_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "ad_rewards";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = AdRewards::orderByDesc("id")->get();
        return view("admin.ad_rewards.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['ad_rewards_allow'])) {
            return redirect(route("admin.ad_rewards.index"));
        }
        $admiko_data['sideBarActive'] = "ad_rewards";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ad_rewards.store");
        
        
		$ad_interstaitals_all = AdInterstaitals::all()->sortBy("appname")->pluck("appname", "id");
		$application_all = Application::all()->sortBy("app_name")->pluck("app_name", "id");
		$verstion_check_all = AdRewards::VERSTION_CHECK_CONS;
        return view("admin.ad_rewards.manage")->with(compact('admiko_data','ad_interstaitals_all','application_all','verstion_check_all'));
    }

    public function store(AdRewardsRequest $request)
    {
        if (Gate::none(['ad_rewards_allow'])) {
            return redirect(route("admin.ad_rewards.index"));
        }
        $data = $request->all();
        
        $AdRewards = AdRewards::create($data);
        
        return redirect(route("admin.ad_rewards.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $AdRewards = AdRewards::find($id);
        if (Gate::none(['ad_rewards_allow', 'ad_rewards_edit']) || !$AdRewards) {
            return redirect(route("admin.ad_rewards.index"));
        }

        $admiko_data['sideBarActive'] = "ad_rewards";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ad_rewards.update", [$AdRewards->id]);
        
        
		$ad_interstaitals_all = AdInterstaitals::all()->sortBy("appname")->pluck("appname", "id");
		$application_all = Application::all()->sortBy("app_name")->pluck("app_name", "id");
		$verstion_check_all = AdRewards::VERSTION_CHECK_CONS;
        $data = $AdRewards;
        return view("admin.ad_rewards.manage")->with(compact('admiko_data', 'data','ad_interstaitals_all','application_all','verstion_check_all'));
    }

    public function update(AdRewardsRequest $request,$id)
    {
        if (Gate::none(['ad_rewards_allow', 'ad_rewards_edit'])) {
            return redirect(route("admin.ad_rewards.index"));
        }
        $data = $request->all();
        $AdRewards = AdRewards::find($id);
        $AdRewards->update($data);
        
        return redirect(route("admin.ad_rewards.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['ad_rewards_allow'])) {
            return redirect(route("admin.ad_rewards.index"));
        }
        AdRewards::destroy($request->idDel);
        return back();
    }
    
    
    
}

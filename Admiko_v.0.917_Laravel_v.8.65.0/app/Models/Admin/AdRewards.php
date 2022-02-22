<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AdInterstaitals;
use App\Models\Admin\Application;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class AdRewards extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'ad_rewards';
    
    
	const VERSTION_CHECK_CONS = ["yes"=>"yes","No"=>"No"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"app_name",
		"app_pkg",
		"app_platform",
		"applicense_apk",
		"applicense_playstore",
		"is_app_suspend",
		"verstion_check",
    ];
    public function app_platform_id()
    {
        return $this->belongsTo(AdInterstaitals::class, 'app_platform');
    }
	public function is_app_suspend_id()
    {
        return $this->belongsTo(Application::class, 'is_app_suspend');
    }
}
<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\Admin\AdmikoCascadeDeleteTrait;

class Application extends Model
{
    use AdmikoFileUploadTrait,SoftDeletes,AdmikoCascadeDeleteTrait;

    public $table = 'application';
    static $admikoCascadeDelete = ["admiko_application_id"=>['Add']];
    
	const VERSTION_FORCE_UPDATE1_CONS = ["yes"=>"yes","no"=>" no"];
	static $admiko_file_info = [
		"appicon"=>[
			"original"=>["folder"=>"upload/"]
		],
		"appwidelog"=>[
			"original"=>["folder"=>"upload/"]
		],
		"apptv_binner"=>[
			"original"=>["folder"=>"upload/"]
		],
		"appsplashimage"=>[
			"original"=>["folder"=>"upload/"]
		],
		"appbackground"=>[
			"original"=>["folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"app_name",
		"appdescrption",
		"app_pkg",
		"appicon",
		"appicon_admiko_delete",
		"appwidelog",
		"appwidelog_admiko_delete",
		"apptv_binner",
		"apptv_binner_admiko_delete",
		"appsplashimage",
		"appsplashimage_admiko_delete",
		"appbackground",
		"appbackground_admiko_delete",
		"adprimary_colour",
		"adsecoundry_colur",
		"appthiredcolur",
		"verstion_code",
		"verstion_name",
		"verstion_force_update1",
    ];
    public function setAppiconAttribute()
    {
        if (request()->hasFile('appicon')) {
            $this->attributes['appicon'] = $this->fileUpload(request()->file("appicon"), Application::$admiko_file_info["appicon"], $this->getOriginal('appicon'));
        }
    }
    public function setAppiconAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('appicon') && request()->appicon_admiko_delete == 1) {
            $this->attributes['appicon'] = $this->fileUpload('', Application::$admiko_file_info["appicon"], $this->getOriginal('appicon'), $value);
        }
    }
	public function setAppwidelogAttribute()
    {
        if (request()->hasFile('appwidelog')) {
            $this->attributes['appwidelog'] = $this->fileUpload(request()->file("appwidelog"), Application::$admiko_file_info["appwidelog"], $this->getOriginal('appwidelog'));
        }
    }
    public function setAppwidelogAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('appwidelog') && request()->appwidelog_admiko_delete == 1) {
            $this->attributes['appwidelog'] = $this->fileUpload('', Application::$admiko_file_info["appwidelog"], $this->getOriginal('appwidelog'), $value);
        }
    }
	public function setApptvBinnerAttribute()
    {
        if (request()->hasFile('apptv_binner')) {
            $this->attributes['apptv_binner'] = $this->fileUpload(request()->file("apptv_binner"), Application::$admiko_file_info["apptv_binner"], $this->getOriginal('apptv_binner'));
        }
    }
    public function setApptvBinnerAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('apptv_binner') && request()->apptv_binner_admiko_delete == 1) {
            $this->attributes['apptv_binner'] = $this->fileUpload('', Application::$admiko_file_info["apptv_binner"], $this->getOriginal('apptv_binner'), $value);
        }
    }
	public function setAppsplashimageAttribute()
    {
        if (request()->hasFile('appsplashimage')) {
            $this->attributes['appsplashimage'] = $this->fileUpload(request()->file("appsplashimage"), Application::$admiko_file_info["appsplashimage"], $this->getOriginal('appsplashimage'));
        }
    }
    public function setAppsplashimageAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('appsplashimage') && request()->appsplashimage_admiko_delete == 1) {
            $this->attributes['appsplashimage'] = $this->fileUpload('', Application::$admiko_file_info["appsplashimage"], $this->getOriginal('appsplashimage'), $value);
        }
    }
	public function setAppbackgroundAttribute()
    {
        if (request()->hasFile('appbackground')) {
            $this->attributes['appbackground'] = $this->fileUpload(request()->file("appbackground"), Application::$admiko_file_info["appbackground"], $this->getOriginal('appbackground'));
        }
    }
    public function setAppbackgroundAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('appbackground') && request()->appbackground_admiko_delete == 1) {
            $this->attributes['appbackground'] = $this->fileUpload('', Application::$admiko_file_info["appbackground"], $this->getOriginal('appbackground'), $value);
        }
    }
	public function getVerstionCodeAttribute($value)
    {
        return $value ? round($value, 2) : null;
    }
}
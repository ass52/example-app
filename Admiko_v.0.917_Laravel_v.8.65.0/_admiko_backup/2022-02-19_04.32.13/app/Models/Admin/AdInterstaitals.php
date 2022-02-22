<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class AdInterstaitals extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'ad_interstaitals';
    
    
	const STATUS_CONS = ["yes"=>"yes","no"=>"no"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"appname",
		"ad_id",
		"status",
		"interval1",
		"click",
		"place_holdername",
		"place_holder_descrption",
    ];
    public function getInterval1Attribute($value)
    {
        return $value ? round($value, 2) : null;
    }
	public function getClickAttribute($value)
    {
        return $value ? round($value, 2) : null;
    }
}
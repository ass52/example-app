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

class AddBanners extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'add_banners';
    
    
	const STATUS_CONS = ["Status"=>"Yes","Status"=>"No"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"app_name",
		"ad_id",
		"status",
		"interval",
		"click",
		"place_holder_name",
    ];
    public function getIntervalAttribute($value)
    {
        return $value ? round($value, 2) : null;
    }
	public function getClickAttribute($value)
    {
        return $value ? round($value, 2) : null;
    }
}
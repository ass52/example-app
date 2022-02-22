<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Add extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'application_add';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"app_name",
		"adid",
		"interval",
		"click",
		"place_holder_name",
		"place_holder_descrption",
		"admiko_application_id",
    ];
    public function setClickAttribute($value)
    {
        $this->attributes['click'] = Str::slug($value);
    }
	public function getPlaceHolderNameAttribute($value)
    {
        return $value ? round($value, 2) : null;
    }
}
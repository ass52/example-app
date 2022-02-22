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

class Users extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'users';
    
    
	static $admiko_file_info = [
		"file"=>[
			"original"=>["folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"title",
		"file",
		"file_admiko_delete",
		"admiko_order",
    ];
    public function setFileAttribute()
    {
        if (request()->hasFile('file')) {
            $this->attributes['file'] = $this->fileUpload(request()->file("file"), Users::$admiko_file_info["file"], $this->getOriginal('file'));
        }
    }
    public function setFileAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('file') && request()->file_admiko_delete == 1) {
            $this->attributes['file'] = $this->fileUpload('', Users::$admiko_file_info["file"], $this->getOriginal('file'), $value);
        }
    }
}
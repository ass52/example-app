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
    
    
	const ROLES1_CONS = ["Admin"=>"Admin","CustomLogin"=>"CustomLogin"];
	const STATUS1_CONS = ["Status"=>"Active","Status"=>"invited","Status"=>"Wating for permistion"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"email",
		"roles1",
		"status1",
		"name",
    ];
    
}
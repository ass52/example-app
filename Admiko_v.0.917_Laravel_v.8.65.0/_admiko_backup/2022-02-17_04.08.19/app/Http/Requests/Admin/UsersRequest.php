<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class UsersRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("users") ?? null;
		return [
            "email"=>[
				"email",
				"unique:users,email,".$id.",id,deleted_at,NULL",
				"required"
			],
			"roles1"=>[
				"nullable"
			],
			"status1"=>[
				"nullable"
			],
			"name"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "email"=>"Email",
			"roles1"=>"Roles",
			"status1"=>"Status",
			"name"=>"Name"
        ];
    }
    
    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}
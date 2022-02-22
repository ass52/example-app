<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin\Application;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class AddRequest extends FormRequest
{
    public function rules()
    {
        return [
            "app_name"=>[
				"string",
				"nullable"
			],
			"adid"=>[
				"string",
				"nullable"
			],
			"interval"=>[
				"integer",
				"nullable"
			],
			"click"=>[
				"string",
				"nullable"
			],
			"place_holder_name"=>[
				"numeric",
				"nullable"
			],
			"place_holder_descrption"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "app_name"=>"App Name",
			"adid"=>"Adid",
			"interval"=>"interval",
			"click"=>"Click",
			"place_holder_name"=>"place holder name",
			"place_holder_descrption"=>"place holder descrption"
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
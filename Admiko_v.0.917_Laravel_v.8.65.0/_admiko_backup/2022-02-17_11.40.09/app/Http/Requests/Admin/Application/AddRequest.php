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
			"place_holder_descrption"=>[
				"string",
				"nullable"
			],
			"place_holder_name"=>[
				"numeric",
				"nullable"
			],
			"click1"=>[
				"numeric",
				"min:1",
				"max:100",
				"nullable"
			],
			"interval1"=>[
				"numeric",
				"min:1",
				"max:100",
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
			"place_holder_descrption"=>"place holder descrption",
			"place_holder_name"=>"place holder name",
			"click1"=>"Click",
			"interval1"=>"interval"
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
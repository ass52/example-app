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

class AdInterstaitalsRequest extends FormRequest
{
    public function rules()
    {
        return [
            "appname"=>[
				"string",
				"nullable"
			],
			"ad_id"=>[
				"string",
				"nullable"
			],
			"status"=>[
				"nullable"
			],
			"interval1"=>[
				"numeric",
				"min:-100",
				"max:100",
				"nullable"
			],
			"click"=>[
				"numeric",
				"min:100",
				"max:100",
				"nullable"
			],
			"place_holdername"=>[
				"string",
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
            "appname"=>"AppName",
			"ad_id"=>"Ad id",
			"status"=>"Status",
			"interval1"=>"interval",
			"click"=>"click",
			"place_holdername"=>"place holdername",
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
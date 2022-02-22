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

class AddBannersRequest extends FormRequest
{
    public function rules()
    {
        return [
            "app_name"=>[
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
			"interval"=>[
				"numeric",
				"min:-100",
				"max:50",
				"nullable"
			],
			"click"=>[
				"numeric",
				"min:-100",
				"max:100",
				"nullable"
			],
			"place_holder_name"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "app_name"=>"App Name",
			"ad_id"=>"Ad id",
			"status"=>"Status",
			"interval"=>"interval",
			"click"=>"click",
			"place_holder_name"=>"Place holder name"
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
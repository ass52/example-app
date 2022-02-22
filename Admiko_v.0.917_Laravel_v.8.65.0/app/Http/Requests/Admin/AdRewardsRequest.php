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

class AdRewardsRequest extends FormRequest
{
    public function rules()
    {
        return [
            "app_name"=>[
				"string",
				"nullable"
			],
			"app_pkg"=>[
				"string",
				"nullable"
			],
			"app_platform"=>[
				"nullable"
			],
			"applicense_apk"=>[
				"string",
				"nullable"
			],
			"applicense_playstore"=>[
				"string",
				"nullable"
			],
			"is_app_suspend"=>[
				"nullable"
			],
			"verstion_check"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "app_name"=>"App Name",
			"app_pkg"=>"App pkg",
			"app_platform"=>"App platform",
			"applicense_apk"=>"AppLicense Apk",
			"applicense_playstore"=>"AppLicense playstore",
			"is_app_suspend"=>"is App Suspend",
			"verstion_check"=>"Verstion check"
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
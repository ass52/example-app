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

class ApplicationRequest extends FormRequest
{
    public function rules()
    {
        return [
            "app_name"=>[
				"string",
				"nullable"
			],
			"appdescrption"=>[
				"nullable"
			],
			"app_pkg"=>[
				"string",
				"nullable"
			],
			"appicon"=>[
				"file",
				"nullable"
			],
			"appwidelog"=>[
				"file",
				"nullable"
			],
			"apptv_binner"=>[
				"file",
				"nullable"
			],
			"appsplashimage"=>[
				"file",
				"nullable"
			],
			"appbackground"=>[
				"file",
				"nullable"
			],
			"adprimary_colour"=>[
				"string",
				"nullable"
			],
			"adsecoundry_colur"=>[
				"string",
				"nullable"
			],
			"appthiredcolur"=>[
				"string",
				"nullable"
			],
			"verstion_code"=>[
				"numeric",
				"min:-50",
				"max:100",
				"nullable"
			],
			"verstion_name"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "app_name"=>"App Name",
			"appdescrption"=>"AppDescrption",
			"app_pkg"=>"App Pkg",
			"appicon"=>"Appicon",
			"appwidelog"=>"AppWidelog",
			"apptv_binner"=>"AppTv binner",
			"appsplashimage"=>"AppSplashImage",
			"appbackground"=>"AppBackground",
			"adprimary_colour"=>"Adprimary colour",
			"adsecoundry_colur"=>"Adsecoundry Colur",
			"appthiredcolur"=>"AppthiredColur",
			"verstion_code"=>"verstion code",
			"verstion_name"=>"verstion name"
        ];
    }
    public function messages()
    {
        return [
            "appicon.required_without"=>trans("validation.required"),
			"appwidelog.required_without"=>trans("validation.required"),
			"apptv_binner.required_without"=>trans("validation.required"),
			"appsplashimage.required_without"=>trans("validation.required"),
			"appbackground.required_without"=>trans("validation.required")
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
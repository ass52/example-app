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
        return [
            "title"=>[
				"string",
				"nullable"
			],
			"file"=>[
				"file",
				"max:30840",
				"file_extension:doc",
				"mimes:doc",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "title"=>"Title",
			"file"=>"File"
        ];
    }
    public function messages()
    {
        return [
            "file.required_without"=>trans("validation.required")
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
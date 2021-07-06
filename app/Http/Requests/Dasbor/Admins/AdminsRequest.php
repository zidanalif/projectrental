<?php
/** Manage roles for CMS users. **/
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Dasbor\Admins;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class AdminsRequest extends FormRequest
{
    public function rules()
    {
        $id = request()->route("admins")->id ?? null;
        return [
            "name"    => [
                "string"
            ],
            "email"   => [
                "email",
                "unique:admins,email," . $id . ",id,deleted_at,NULL",
                'required'
            ],
            "role_id" => [
                'required'
            ]
        ];
    }

    public function attributes()
    {
        return [
            "name"    => trans('global.admins_name'),
            "email"   => trans('global.admins_email'),
            "role_id" => trans('global.admins_role')
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

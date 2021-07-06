<?php
/** Request for roles. **/
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Dasbor\Admins;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class AdminRolesRequest extends FormRequest
{
    public function rules()
    {
        $id = request()->route("admin_roles")->id ?? null;
        return [
            "title" => [
                "string",
                "unique:admins_roles,title," . $id . ",id,deleted_at,NULL",
                'required'
            ]
        ];
    }

    public function attributes()
    {
        return [
            "title"      => trans('global.roles_title'),
            "permission" => trans('global.roles_permission')
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

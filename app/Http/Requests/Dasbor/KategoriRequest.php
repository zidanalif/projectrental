<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Dasbor;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class KategoriRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("kategori") ?? null;
		return [
            "kategori"=>[
				"string",
				"unique:kategori,kategori,".$id.",id,deleted_at,NULL",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "kategori"=>"Kategori"
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

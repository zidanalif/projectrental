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

class KlienRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("klien") ?? null;
		return [
            "nik"=>[
				"string",
				"nullable"
			],
			"nama"=>[
				"string",
				"unique:klien,nama,".$id.",id,deleted_at,NULL",
				"required"
			],
			"no_telp"=>[
				"string",
				"unique:klien,no_telp,".$id.",id,deleted_at,NULL",
				"required"
			],
			"alamat"=>[
				"nullable"
			],
			"jenis_kelamin"=>[
				"nullable"
			],
			"foto_diri"=>[
				"image",
				"required_without:foto_diri_admiko_current",
				"max:2056",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg"
			],
			"foto_ktp"=>[
				"image",
				"required_without:foto_ktp_admiko_current",
				"max:2056",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg"
			],
			"perusahaan"=>[
				"string",
				"nullable"
			],
			"email"=>[
				"email",
				"unique:klien,email,".$id.",id,deleted_at,NULL",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nik"=>"NIK",
			"nama"=>"Nama",
			"no_telp"=>"No. Telp",
			"alamat"=>"Alamat",
			"jenis_kelamin"=>"Jenis Kelamin",
			"foto_diri"=>"Foto Diri",
			"foto_ktp"=>"Foto KTP",
			"perusahaan"=>"Perusahaan",
			"email"=>"Email"
        ];
    }
    public function messages()
    {
        return [
            "foto_diri.required_without"=>trans("validation.required"),
			"foto_ktp.required_without"=>trans("validation.required")
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

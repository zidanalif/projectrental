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

class MobilRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("mobil") ?? null;
		return [
            "nama_mobil"=>[
				"string",
				"nullable"
			],
			"merek"=>[
				"required"
			],
			"kategori"=>[
				"required"
			],
			"tanggal_pajak"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"required"
			],
			"plat_nomor"=>[
				"string",
				"unique:mobil,plat_nomor,".$id.",id,deleted_at,NULL",
				"required"
			],
			"no_mesin"=>[
				"string",
				"unique:mobil,no_mesin,".$id.",id,deleted_at,NULL",
				"required"
			],
			"kapasitas_silinder"=>[
				"integer",
				"nullable"
			],
			"bahan_bakar"=>[
				"required"
			],
			"kursi_penumpang"=>[
				"integer",
				"required",
				"min:2",
				"max:16"
			],
			"tahun"=>[
				"string",
				"required"
			],
			"fitur"=>[
				"array"
			],
			"harga_sewa"=>[
				"numeric",
				"required"
			],
			"foto"=>[
				"image",
				"required_without:foto_admiko_current",
				"max:2056",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nama_mobil"=>"Nama Mobil",
			"merek"=>"Merek",
			"kategori"=>"Kategori",
			"tanggal_pajak"=>"Tanggal Pajak",
			"plat_nomor"=>"Plat Nomor",
			"no_mesin"=>"No. Mesin",
			"kapasitas_silinder"=>"Kapasitas Silinder",
			"bahan_bakar"=>"Bahan Bakar",
			"kursi_penumpang"=>"Kursi Penumpang",
			"tahun"=>"Tahun",
			"fitur"=>"Fitur",
			"harga_sewa"=>"Harga Sewa",
			"foto"=>"Foto"
        ];
    }
    public function messages()
    {
        return [
            "foto.required_without"=>trans("validation.required")
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

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

class SewaRequest extends FormRequest
{
    public function rules()
    {
        return [
            "klien"=>[
				"nullable"
			],
			"mobil"=>[
				"nullable"
			],
			"tempat_antar"=>[
				"nullable"
			],
			"sewa_mulai"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"hingga"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"total_sewa"=>[
				"numeric",
				"nullable"
			],
			"tujuan"=>[
				"string",
				"nullable"
			],
			"status_sewa"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "klien"=>"Klien",
			"mobil"=>"Mobil",
			"tempat_antar"=>"Tempat Antar",
			"sewa_mulai"=>"Sewa Mulai",
			"hingga"=>"Hingga",
			"total_sewa"=>"Total Sewa",
			"tujuan"=>"Tujuan",
			"status_sewa"=>"Status Sewa"
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

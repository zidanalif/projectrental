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

class TestimoniRequest extends FormRequest
{
    public function rules()
    {
        return [
            "klien"=>[
				"nullable"
			],
			"komentar"=>[
				"nullable"
			],
			"rating"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "klien"=>"Klien",
			"komentar"=>"Komentar",
			"rating"=>"Rating"
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

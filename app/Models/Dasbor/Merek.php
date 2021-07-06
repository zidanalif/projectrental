<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Dasbor;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Dasbor\AdmikoFileUploadTrait;


class Merek extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'merek';


	const MANUFAKTUR_CONS = ["audi"=>"Audi","bmw"=>"BMW","daihatsu"=>"Daihatsu","honda"=>"Honda Motors","hyundai"=>"Hyundai Motors","kia"=>"KIA Motors","mazda"=>"Mazda","mercedes"=>"Mercedes","mitsubhisi"=>"Mitsubishi Motors","nissan"=>"Nissan Motors","suzuki"=>"Suzuki Indomobil","toyota"=>"Toyota Motors","wuling"=>"Wuling Motors Corp."];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"merek",
		"manufaktur",
    ];

}

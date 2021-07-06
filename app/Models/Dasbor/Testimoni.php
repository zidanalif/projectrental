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
use App\Models\Dasbor\Klien;
use Illuminate\Support\Str;

class Testimoni extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'testimoni';


	const RATING_CONS = ["1"=>"★","2"=>"★★","3"=>"★★★","4"=>"★★★★","5"=>"★★★★★"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"klien",
		"komentar",
		"rating",
    ];
    public function klien_id()
    {
        return $this->belongsTo(Klien::class, 'klien');
    }
}

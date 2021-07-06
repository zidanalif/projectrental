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
use App\Models\Dasbor\Mobil;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Sewa extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'sewa';


	const STATUS_SEWA_CONS = ["pesan"=>"Pesan","sewa"=>"Sewa","kembali"=>"Kembali"];
    protected $dates = [
		"sewa_mulai",
		"hingga",
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"klien",
		"mobil",
		"tempat_antar",
		"sewa_mulai",
		"hingga",
		"total_sewa",
		"tujuan",
		"status_sewa",
    ];
    public function klien_id()
    {
        return $this->belongsTo(Klien::class, 'klien');
    }
	public function mobil_id()
    {
        return $this->belongsTo(Mobil::class, 'mobil');
    }
	public function getSewaMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setSewaMulaiAttribute($value)
    {
        $this->attributes['sewa_mulai'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getHinggaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setHinggaAttribute($value)
    {
        $this->attributes['hingga'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getTotalSewaAttribute($value)
    {
        return $value ? round($value, 0) : null;
    }
}

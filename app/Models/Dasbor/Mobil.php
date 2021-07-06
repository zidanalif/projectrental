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
use App\Models\Dasbor\Merek;
use App\Models\Dasbor\Kategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Mobil extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'mobil';


	const BAHAN_BAKAR_CONS = ["B"=>"Bensin","S"=>"Solar"];
	const FITUR_CONS = ["AC"=>"AC","AUDIO"=>"AUDIO","GPS"=>"GPS","WIFI"=>"WIFI"];
	static $admiko_file_info = [
		"foto"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"],
			"thumbnail"=>[
				["action"=>"resize","width"=>200,"height"=>200,"folder"=>"upload/","prefix"=>"thb_"]
			]
		]
	];
    protected $dates = [
		"tanggal_pajak",
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nama_mobil",
		"merek",
		"kategori",
		"tanggal_pajak",
		"plat_nomor",
		"no_mesin",
		"kapasitas_silinder",
		"bahan_bakar",
		"kursi_penumpang",
		"tahun",
		"harga_sewa",
		"foto",
		"foto_admiko_delete",
    ];
    public function merek_id()
    {
        return $this->belongsTo(Merek::class, 'merek');
    }
	public function kategori_id()
    {
        return $this->belongsTo(Kategori::class, 'kategori');
    }
	public function getTanggalPajakAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setTanggalPajakAttribute($value)
    {
        $this->attributes['tanggal_pajak'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function fitur_many()
    {
        return $this->belongsToMany(Mobil::class, 'mobil_fitur_many', 'parent_id', 'selected_id');
    }
    public function fitur_many_select()
    {
        return DB::table('mobil_fitur_many')->where('parent_id',$this->id)->pluck('selected_id');
    }
	public function getHargaSewaAttribute($value)
    {
        return $value ? round($value, 0) : null;
    }
	public function setFotoAttribute()
    {
        if (request()->hasFile('foto')) {
            $this->attributes['foto'] = $this->imageUpload(request()->file("foto"), Mobil::$admiko_file_info["foto"], $this->getOriginal('foto'));
        }
    }
    public function setFotoAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('foto') && $value == 1) {
            $this->attributes['foto'] = $this->imageUpload('', Mobil::$admiko_file_info["foto"], $this->getOriginal('foto'), $value);
        }
    }
}

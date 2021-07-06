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
use Illuminate\Support\Str;

class Klien extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'klien';


	const JENIS_KELAMIN_CONS = ["L"=>"Pria","P"=>"Wanita"];
	static $admiko_file_info = [
		"foto_diri"=>[
			"original"=>["action"=>"resize","width"=>1024,"height"=>768,"folder"=>"upload/"],
			"thumbnail"=>[
				["action"=>"resize","width"=>200,"height"=>200,"folder"=>"upload/","prefix"=>"thb_"]
			]
		],
		"foto_ktp"=>[
			"original"=>["action"=>"resize","width"=>1024,"height"=>768,"folder"=>"upload/"],
			"thumbnail"=>[
				["action"=>"resize","width"=>200,"height"=>200,"folder"=>"upload/","prefix"=>"thb_"]
			]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nik",
		"nama",
		"no_telp",
		"alamat",
		"jenis_kelamin",
		"foto_diri",
		"foto_diri_admiko_delete",
		"foto_ktp",
		"foto_ktp_admiko_delete",
		"perusahaan",
		"email",
		"sandi",
    ];
    public function setFotoDiriAttribute()
    {
        if (request()->hasFile('foto_diri')) {
            $this->attributes['foto_diri'] = $this->imageUpload(request()->file("foto_diri"), Klien::$admiko_file_info["foto_diri"], $this->getOriginal('foto_diri'));
        }
    }
    public function setFotoDiriAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('foto_diri') && $value == 1) {
            $this->attributes['foto_diri'] = $this->imageUpload('', Klien::$admiko_file_info["foto_diri"], $this->getOriginal('foto_diri'), $value);
        }
    }
	public function setFotoKtpAttribute()
    {
        if (request()->hasFile('foto_ktp')) {
            $this->attributes['foto_ktp'] = $this->imageUpload(request()->file("foto_ktp"), Klien::$admiko_file_info["foto_ktp"], $this->getOriginal('foto_ktp'));
        }
    }
    public function setFotoKtpAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('foto_ktp') && $value == 1) {
            $this->attributes['foto_ktp'] = $this->imageUpload('', Klien::$admiko_file_info["foto_ktp"], $this->getOriginal('foto_ktp'), $value);
        }
    }
	public function setSandiAttribute($value)
    {
        if($value != ''){
            $this->attributes['sandi'] = bcrypt($value);
        }
    }
}

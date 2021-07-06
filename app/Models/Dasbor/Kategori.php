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


class Kategori extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'kategori';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"kategori",
    ];

}

<?php
/** Helper for cascade delete files or soft delete. **/

/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Traits\Dasbor;

use Illuminate\Database\Eloquent\Model;

trait AdmikoCascadeDeleteTrait
{
    public static function bootAdmikoCascadeDeleteTrait()
    {
        static::deleted(function (Model $model) {
            if (method_exists($model, 'runSoftDelete')) {
                self::admikoSoftDeleteCascade(get_class($model), [$model->id]);
            }
        });
    }

    protected static function admikoSoftDeleteCascade($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'admikoCascadeDelete')) {
            $cascade = $modelPath::$admikoCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'admikoCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            self::admikoSoftDeleteCascade($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                    $getModel::destroy($deleteIdArray);
                }
            }
        }
    }

}

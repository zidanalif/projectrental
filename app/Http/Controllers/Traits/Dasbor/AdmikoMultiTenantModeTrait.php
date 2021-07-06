<?php
/** Helper trait for Multi-Tenancy functionality. **/

/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Traits\Dasbor;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait AdmikoMultiTenantModeTrait
{
    public static function bootAdmikoMultiTenantModeTrait()
    {
        static::creating(function (Model $model) {
            $model->created_by = auth()->id();
        });

        static::updating(function (Model $model) {
            $model->updated_by = auth()->id();
        });

        static::deleted(function (Model $model) {
            if (method_exists($model, 'runSoftDelete')) {
                $model->deleted_by = auth()->id();
                $model->saveQuietly();
                self::admikoSoftDeleteCascadeUpdate(get_class($model), [$model->id]);
            }
        });

        if(auth()->user()->role_id != 1){
            static::addGlobalScope('created_by', function (Builder $builder) {
                $builder->whereIn('created_by', auth()->user()->multi_tenancy_access->pluck('id'))->orWhereNull('created_by');
            });
        }
    }

    protected static function admikoSoftDeleteCascadeUpdate($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'admikoCascadeDelete')) {
            $cascade = $modelPath::$admikoCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'admikoCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            self::admikoSoftDeleteCascadeUpdate($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $getModel::whereIn($key_id, $deleteId)->update(['deleted_by' => auth()->id()]);
                }
            }
        }
    }

}

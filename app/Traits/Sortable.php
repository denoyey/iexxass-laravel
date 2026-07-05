<?php

namespace App\Traits;

trait Sortable
{
    /**
     * Boot the sortable trait for a model.
     *
     * @return void
     */
    public static function bootSortable()
    {
        static::creating(function ($model) {
            if (empty($model->order_column)) {
                $model->order_column = static::max('order_column') + 1;
            }
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabrication extends Model
{
    protected $primaryKey = ['product_id', 'matiere_id'];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('product_id', '=', $this->getAttribute('product_id'))
            ->where('matiere_id', '=', $this->getAttribute('matiere_id'));
        return $query;
    }
}

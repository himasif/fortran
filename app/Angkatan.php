<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idAngkatan
 * @property string $namaAngkatan
 * @property Kelompok[] $kelompoks
 */
class Angkatan extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idAngkatan';

    /**
     * @var array
     */
    protected $fillable = ['namaAngkatan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelompoks()
    {
        return $this->hasMany('App\Kelompok', 'idAngkatan', 'idAngkatan');
    }
}

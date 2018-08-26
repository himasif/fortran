<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nim
 * @property string $nama
 * @property int $idKelompok
 * @property int $nilaiAkhir
 * @property Kelompok $kelompok
 * @property Nilai[] $nilais
 */
class Mahasiswa extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'nim';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nama', 'idKelompok', 'nilaiAkhir'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelompok()
    {
        return $this->belongsTo('App\Kelompok', 'idKelompok', 'idKelompok');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais()
    {
        return $this->hasMany('App\Nilai', 'nim', 'nim');
    }
}

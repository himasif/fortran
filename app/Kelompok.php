<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idKelompok
 * @property string $namaKelompok
 * @property int $idAngkatan
 * @property Angkatan $angkatan
 * @property Mahasiswa[] $mahasiswas
 */
class Kelompok extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idKelompok';

    /**
     * @var array
     */
    protected $fillable = ['namaKelompok', 'idAngkatan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function angkatan()
    {
        return $this->belongsTo('App\Angkatan', 'idAngkatan', 'idAngkatan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswas()
    {
        return $this->hasMany('App\Mahasiswa', 'idKelompok', 'idKelompok');
    }
}

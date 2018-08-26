<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nim
 * @property int $idNilai
 * @property int $idKategori
 * @property string $tanggal
 * @property string $keterangan
 * @property int $nilai
 * @property string $updated_at
 * @property string $created_at
 * @property Mahasiswa $mahasiswa
 */
class Nilai extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idNilai';

    /**
     * @var array
     */
    protected $fillable = ['nim', 'idKategori', 'tanggal', 'keterangan', 'nilai', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }
}

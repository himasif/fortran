<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idKategori
 * @property string $kategori
 * @property int $nilai_kategori
 * @property boolean $kategori_wajib
 */
class Kategori extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idKategori';

    /**
     * @var array
     */
    protected $fillable = ['kategori', 'nilai_kategori', 'kategori_wajib'];

}

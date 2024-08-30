<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'isi',
        'artis_id',
        'kategori_berita_id',
        'penulis_id',
    ];

    public function artis()
    {
        return $this->belongsTo(Artis::class);
    }

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class);
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
}
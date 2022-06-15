<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'categoria_id';
    protected $fillable = ['nome'];

    public function categoria_produto()
    {
        return $this->hasOne(Produto::class, 'categoria_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primaryKey = 'produto_id';
    protected $fillable = ['nome', 'preco', 'categoria_id'];

    public function produto_categoria()
    {
        return $this->belongsTo(categoria::class, 'categoria_id');
    }
}

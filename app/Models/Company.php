<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    /**
     * Relacionamento: Uma empresa pode ter muitos documentos.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

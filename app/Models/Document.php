<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'file_path',
        'company_id',
    ];

    /**
     * Relacionamento: Um documento pertence a uma empresa.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

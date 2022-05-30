<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentRemis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consultation_id',
        'medicament_id',
        'quantite',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'consultation_id' => 'integer',
        'medicament_id' => 'integer',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
}

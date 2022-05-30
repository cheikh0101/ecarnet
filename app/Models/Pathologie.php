<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pathologie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dossier_id',
        'symptomes',
        'medicament_prescrits',
        'historique_maladie',
        'tension_arterielle',
        'temperature',
        'pouls',
        'frequence_respiratoire',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dossier_id' => 'integer',
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}

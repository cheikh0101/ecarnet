<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologieConsultation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pathologie_id',
        'consultation_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pathologie_id' => 'integer',
        'consultation_id' => 'integer',
    ];

    public function pathologie()
    {
        return $this->belongsTo(Pathologie::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

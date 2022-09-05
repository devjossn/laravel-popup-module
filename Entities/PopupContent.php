<?php

namespace Modules\Popup\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupContent extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'popup_id', 'content'
    ];
}

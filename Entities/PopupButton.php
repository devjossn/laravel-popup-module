<?php

namespace Modules\Popup\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupButton extends Model
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
        'popup_id', 'bt_name'
    ];
}

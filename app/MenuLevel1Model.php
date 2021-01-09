<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuLevel1Model extends Model
{

    protected $table = 'tb_menu_level_1';
    protected $primaryKey = 'menu_level_1_id';
    protected $fillable = [
        'menu_level_1_nama',
        'menu_level_1_router',
        'menu_level_1_icon',
    ];
    public $timestamp = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emoji extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'character',
        'unicode_name',
        'code_point',
        'group',
        'subgroup',
    ];
}

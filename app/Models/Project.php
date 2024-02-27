<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['titolo', 'autore', 'slug', 'cover_image', 'descrizione', 'fine_progetto'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExMovie extends Model
{
    use HasFactory;
    	
	protected $fillable = [
		'movie_name',
		'genre_name',
		'director_id',
		'actor_id',
		'info',
		'movie_image',
		'movie_url'
	];
}

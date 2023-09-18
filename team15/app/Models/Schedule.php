<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'run_date',
		'movie_id',
		'room_id',
		'runtime_id',
	];
}

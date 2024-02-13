<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

		protected $fillable = [
			'content',
			'user_id',
		];

		protected $withCount = [
			'likes'
		];

		protected $with = [
			'user',
			'comments.user'
		];

		public function comments() {
			return $this->hasMany(Comment::class);
		}

		public function user() {
			return $this->belongsTo(User::class);
		}

		public function likes() {
			return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
		}

		public function scopeSearch(Builder $query, string $search = '') {
			$query->where('content', 'like', "%$search%");
		}
}

<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'hidden',
    ];


    public function employer():BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }



    public function tags()
    {
        // return $this->tag->pluck('name');
        return $this->belongsToMany(Tag::class);
    }
}

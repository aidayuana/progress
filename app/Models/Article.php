<?php

namespace App\Models;

use App\Models\MasterData\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function routeNotification()
        {
            return route('article.index', ['id' => $this->id, 'ref' => 'notification']);
        }
    
}

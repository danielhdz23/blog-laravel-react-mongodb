<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\User;
use App\Models\Article;

class Comments extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'comments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id', 
        'created_at', 
        'updated_at', 
        'user_id',
        'name',
        'message',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'article_id' => 'string',
    ];

    /**
     * A Article belongs to a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * A Comment belongs to an Article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
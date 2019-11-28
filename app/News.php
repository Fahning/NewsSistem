<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable= ['id', 'title', 'message', 'type', 'user_id',  'created_at', 'updated_at'];

    public function autor($id)
    {
        $autor = User::find($id);
        return $autor;
    }
}

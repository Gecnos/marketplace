<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medias';

    protected $fillable = [
        'mediable_id',
        'mediable_type',
        'collection_name',
        'file_name',
        'disk',
        'mime_type',
        'path',
        'url',
        'size',
        'order_column',
    ];

    /**
     * Get the parent mediable model (user, category, etc.).
     */
    public function mediable()
    {
        return $this->morphTo();
    }
}
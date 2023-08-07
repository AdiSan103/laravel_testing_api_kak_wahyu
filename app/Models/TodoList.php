<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todo_list';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'date',
        'time'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // const DELETED_AT = 'deleted_at';
}
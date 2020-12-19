<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart',
        'user_id',
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'U';

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    // protected $connection = 'mysql';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    // protected $attributes = [
    //     //
    // ];

    /**
     * Get the user that the order belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

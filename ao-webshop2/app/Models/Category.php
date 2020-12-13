<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /* 
        If you need to customize the names of the columns used to store the timestamps,
         you may define CREATED_AT and UPDATED_AT constants on your model:
    */

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    public $timestamps = false;

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
    //     'delayed' => false,
    // ];
    
    /**
     * Get the products that belong to the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

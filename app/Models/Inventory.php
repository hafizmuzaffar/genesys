<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id_inventory',
        'nama_barang',
        'harga',
        'stock',
        'created_by',
        'updated_by',
    ];
    public function CreatedBy()
    {
        return $this->belongsTo(User::class,  'created_by');
    }
    public function UpdatedBy()
    {
        return $this->belongsTo(User::class,  'created_by');
    }
    // public function user()
    // {
    //     return $this->belongsToMany(User::class, 'user_id');
    // }
}

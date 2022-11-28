<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group_approve;

class Approve extends Model
{
    use HasFactory;

    public function ap_group ()
    {
        return $this->hasMany(Group_approve::class, 'book_number','book_number');
    }
}

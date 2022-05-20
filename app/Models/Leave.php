<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Leave\LeaveResource;
use App\Http\Resources\Leave\LeaveCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;

    public $oneItem = LeaveResource::class;
    public $allItems = LeaveCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function operator()
    {
        return $this->belongsTo(User::class);
    }
}

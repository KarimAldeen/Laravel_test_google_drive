<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends BaseModel
{
    use HasFactory;

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    
    
}
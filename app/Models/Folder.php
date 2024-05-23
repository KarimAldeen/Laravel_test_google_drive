<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends BaseModel
{
    use HasFactory;


    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id')->with("parent");
    }

    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'folder_id');
    }
    
    
}

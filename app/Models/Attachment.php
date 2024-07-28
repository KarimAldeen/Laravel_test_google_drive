<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends BaseModel
{
    use HasFactory;

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function url(): Attribute
    {
         $app_base_url = config('appSetting.app_base_url');
        return Attribute::get(fn (string $value) => $app_base_url . $value);
    }
}
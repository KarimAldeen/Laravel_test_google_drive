<?php

namespace App\Http\Requests\Folder;

use App\Http\Requests\Base\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditFolderRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            
            'name' => 'nullable|string|max:255',
            'order' => "required|integer|unique:folders,order,NULL,id,parent_id,{$this->parent_id}",
            'parent_id' => 'nullable|exists:folders,id',
            'user_id' => 'nullable|exists:users,id',
            'level' => 'nullable|integer|min:0', 

        ];
    }
}

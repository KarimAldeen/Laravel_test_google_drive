<?php

namespace App\Http\Requests\Folder;

use App\Http\Requests\Base\BaseFormRequest;
class AddFolderRequest extends BaseFormRequest
{   
     public function rules(): array
     {
         return [
            'name' => 'required|string|max:255',
            'order' => "required|integer|unique:folders,order,NULL,id,parent_id,{$this->parent_id}",
            'parent_id' => 'nullable|exists:folders,id',
            'user_id' => 'required|exists:users,id',
            'level' => 'required|integer|min:0', 
         ];
     }
}

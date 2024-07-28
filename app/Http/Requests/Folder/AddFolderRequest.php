<?php

namespace App\Http\Requests\Folder;

use App\Http\Requests\Base\BaseFormRequest;
class AddFolderRequest extends BaseFormRequest
{   
     public function rules(): array
     {
         return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id',
            'user_id' => 'required|exists:users,id',
         ];
     }
}

<?php

namespace App\Http\Requests\Attachment;


use App\Http\Requests\Base\BaseFormRequest;
use App\Rules\FileOrImage;

class AddAttachmentRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'folder_id' => 'required|numeric',
            
            'url' => 'required|file|mimes:jpg,jpeg,png,bmp,gif,svg,pdf,doc,docx,txt,zip|max:10240', // 10MB max size, adjust as needed
        ];
    }
}

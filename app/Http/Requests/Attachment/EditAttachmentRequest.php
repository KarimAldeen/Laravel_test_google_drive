<?php

namespace App\Http\Requests\Attachment;

use App\Http\Requests\Base\BaseFormRequest;

class EditAttachmentRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'folder_id' => 'requierd|numeric',
            'url' => 'requierd|file|image',
        ];
    }
}

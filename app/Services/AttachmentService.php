<?php



namespace App\Services;

use App\Models\Attachment;
use App\Services\Base\BaseService;


class AttachmentService  extends BaseService {

    public function __construct() { parent::__construct(Attachment::class); }


    public function create($data)
    {   
        $attachment  =  ImageService::upload_image($data['url'], "attachment");

        parent::create([
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'url' => $attachment
        ]);

    }


    public function update($id ,$data)
    {
        if (isset($data['url']) && !empty($data['url'])) {
            $updated_attachment = ImageService::update_image($data['url'], 'attachment');
             parent::update($id,array_merge($data, ['attachment' => $updated_attachment]));
        }

         parent::update($id,$data);
   }


}

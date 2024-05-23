<?php



namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Folder;
use App\Services\Base\BaseService;


class FolderService  extends BaseService {

    public function __construct() { parent::__construct(Folder::class); }



    public function show($id)
    {
        $folder = Folder::whereId($id)->with("parent");
        return $folder->get();
        return $folder;
       }

    public function create($data)
    {
        parent::create([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
            'order' => $data['order'],
            'user_id' => $data['user_id'],

            
        ]);
 
   }

   public function destroy($id)
   {
       $className = $this->className;
       $deleted = $className::where("id", $id)->first()->delete();
       if (!$deleted){
           throw new CustomException(404);
       }
   }
 


}

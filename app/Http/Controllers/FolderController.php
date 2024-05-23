<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\AddFolderRequest;
use App\Http\Requests\Folder\EditFolderRequest;
use App\Http\Resources\FolderResource;
use App\Services\FolderService;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    
    public function __construct(private FolderService $service) {}

    public function index(){
        $data = $this->service->index();
        $resorse = FolderResource::collection($data);
        return $this->sendResponse(["data"=>$resorse]);

    }
    public function show($id){
        $data = $this->service->show($id);
        $resorse = new FolderResource($data);
        return $this->sendResponse(["data"=>$resorse]);

    }
    public function create(AddFolderRequest $request ){
        $validatedData = $request->validated();
        $this->service->create($validatedData);
        return $this->sendResponse();


    }
    public function update($id,EditFolderRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse();


    }
    public function destroy($id){
        $this->service->destroy($id);
        return $this->sendResponse();

    }


}

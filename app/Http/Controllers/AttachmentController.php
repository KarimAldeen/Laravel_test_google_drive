<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attachment\AddAttachmentRequest;
use App\Http\Requests\Attachment\EditAttachmentRequest;
use App\Http\Resources\AttachmentResource;
use App\Services\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    
    public function __construct(private AttachmentService $service) {}

    public function index(){
        $data = $this->service->index();
        $resorse = AttachmentResource::collection($data);
        return $this->sendResponse(["data"=>$resorse]);

    }
    public function show($id){
        $data = $this->service->show($id);
        $resorse = new AttachmentResource($data);
        return $this->sendResponse(["data"=>$resorse]);

    }
    public function create(AddAttachmentRequest $request ){

        $validatedData = $request->validated();

        $this->service->create($validatedData);
        return $this->sendResponse();


    }
    public function update($id,EditAttachmentRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse();


    }
    public function destroy($id){
        $this->service->delete_with_image($id,"url");
        return $this->sendResponse();

    }



}

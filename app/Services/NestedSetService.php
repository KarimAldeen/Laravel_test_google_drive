<?php

namespace App\Services;

use App\Models\Folder;
use Illuminate\Support\Facades\DB;
use Exception;

class NestedSetService
{
    
    public function create($data)
    {
        $rightmostNode = Folder::orderByDesc('rgt')->first();

        $newNodeData = [
            'name' => $data['name'],
            'order' => $data['order'],
            'user_id' => $data['user_id'],
            'level' => $data['level'],
            'parent_id' => $data['parent_id'] ?? null,
            'lft' => null,
            'rgt' => null
        ];
        if (!isset($newNodeData['parent_id'])) {
            $newNodeData['lft'] = $rightmostNode ? $rightmostNode->rgt + 1 : 1;
            $newNodeData['rgt'] = $newNodeData['lft'] + 1;
        } else {
            $parent = Folder::find($newNodeData['parent_id']);
            $newNodeData['lft'] = $parent->rgt;
            $newNodeData['rgt'] = $newNodeData['lft'] + 1;
    
            Folder::where('rgt', '>=', $parent->rgt)->increment('rgt', 2);
            Folder::where('lft', '>', $parent->rgt)->increment('lft', 2);
        }
        $newNodeId = Folder::insertGetId($newNodeData); 
        return true;
    }

    public function destroy($data)
    {
        $width = $data->right - $data->left + 1;

        Folder::where('right', '>', $data->right)->decrement('right', $width);
        Folder::where('left', '>', $data->right)->decrement('left', $width);
    }
}

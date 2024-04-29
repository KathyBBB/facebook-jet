<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Http\Resources\ContentResource;

class ContentController extends Controller
{
    public function index()
    {
        return ContentResource::collection(Content::with('user:id,name,profile_photo_path')->with('issue:id,title')->latest()->get());
    }
   
}

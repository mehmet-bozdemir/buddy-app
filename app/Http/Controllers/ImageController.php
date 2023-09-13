<?php

namespace App\Http\Controllers;

use App\Models\Buddy;
use App\Models\BuddyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create(Buddy $buddy)
    {
        $buddy->load(['images']);
        return inertia(
            'Buddy/Image/Create',
            ['buddy'=> $buddy]
        );
    }

    public function store(Buddy $buddy, Request $request)
    {
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $buddy->images()->save(new BuddyImage([
                    'filename' => $path
                ]) );
            }
        }
        return redirect()->route('buddy.show', $buddy->id)->with('success', 'images uploaded');
    }

    public function destroy(Buddy $buddy, BuddyImage $image){
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}

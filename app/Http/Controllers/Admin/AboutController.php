<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Http\Requests\AboutMeRequest;

class AboutController extends Controller
{
    public function edit()
    {
        $about = AboutMe::firstOrCreate();
        return view('admin.about.edit', compact('about'));
    }

    public function update(AboutMeRequest $request)
    {
        try {
            $about = AboutMe::firstOrCreate();
            $validated = $request->validated();

            if (isset($validated['biography'])) {
                $about->biography = $validated['biography'];
                $about->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Özgeçmiş başarıyla güncellendi.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hata: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addHobby(Request $request)
    {
        $request->validate([
            'hobby' => 'required|string|max:50'
        ]);

        $about = AboutMe::first();
        $hobbies = $about->hobbies ?? [];
        $hobbies[] = $request->hobby;

        $about->update(['hobbies' => $hobbies]);

        return response()->json(['success' => true, 'hobbies' => $hobbies]);
    }

    public function removeHobby($index)
    {
        $about = AboutMe::first();
        $hobbies = $about->hobbies;

        if (isset($hobbies[$index])) {
            unset($hobbies[$index]);
            $about->update(['hobbies' => array_values($hobbies)]);
        }

        return response()->json(['success' => true, 'hobbies' => array_values($hobbies)]);
    }

    public function addPhobia(Request $request)
    {
        $request->validate([
            'phobia' => 'required|string|max:50'
        ]);

        $about = AboutMe::first();
        $phobias = $about->phobias ?? [];
        $phobias[] = $request->phobia;

        $about->update(['phobias' => $phobias]);

        return response()->json(['success' => true, 'phobias' => $phobias]);
    }

    public function removePhobia($index)
    {
        $about = AboutMe::first();
        $phobias = $about->phobias;

        if (isset($phobias[$index])) {
            unset($phobias[$index]);
            $about->update(['phobias' => array_values($phobias)]);
        }

        return response()->json(['success' => true, 'phobias' => array_values($phobias)]);
    }
}

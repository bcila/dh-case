<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $contactInfo = ContactInfo::firstOrCreate();
        $contactInfo->update($validated);

        return redirect()
            ->back()
            ->with('success', 'İletişim bilgileri güncellendi.');
    }
}

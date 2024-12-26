<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use App\Models\ContactMessage;
use App\Models\AboutMe;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Requests\ContactMessageRequest;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        $about = AboutMe::first();
        return view('pages.about', compact('about'));
    }

    public function portfolio()
    {
        $schools = Portfolio::where('type', 'school')->get();
        $projects = Portfolio::where('type', 'project')->get();
        return view('pages.portfolio', compact('schools', 'projects'));
    }

    public function contact()
    {
        $contactInfo = ContactInfo::first();
        return view('pages.contact', compact('contactInfo'));
    }

    public function storeContact(ContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Mesajınız başarıyla gönderildi!');
    }
}

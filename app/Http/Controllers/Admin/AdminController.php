<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $portfolioCount = Portfolio::count();
        $messagesCount = ContactMessage::count();

        return view('admin.dashboard', compact('portfolioCount', 'messagesCount'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:school,project'
        ]);

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolyo başarıyla eklendi.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:school,project'
        ]);

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolyo başarıyla güncellendi.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolyo başarıyla silindi.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobHistory;
use App\Models\Language;
use App\Models\PortfolioItem;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    /**
     * Display the about page.
     */
    public function about(): Response
    {
        return Inertia::render('About');
    }

    /**
     * Display the resume page.
     */
    public function resume(): Response
    {
        return Inertia::render('Resume', [
            'jobHistory' => JobHistory::all(),
            'languages' => Language::all(),
            'skills' => Skill::all()
        ]);
    }

    /**
     * Display the portfolio page.
     */
    public function portfolio(): Response
    {
        return Inertia::render('Portfolio', [
            'portfolioItems' => PortfolioItem::orderByDesc('published_at')->get()
        ]);
    }

    /**
     * Display the portfolio show page.
     */
    public function portfolioShow(PortfolioItem $portfolioItem): Response
    {
        return Inertia::render('PortfolioShow', [
            'portfolioItem' => $portfolioItem
        ]);
    }
}

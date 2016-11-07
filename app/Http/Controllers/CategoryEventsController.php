<?php
namespace App\Http\Controllers;

use App\CategoryEvent;
use App\Repositories\CategoryEventsRepository;
use App\Repositories\EventRepository;

class CategoryEventsController extends Controller
{
    /**
     * @var CategoriesEvents
     */
    protected $category_events;

    /**
     * CategoriesController constructor.
     * @param CategoriesEvents $categoryRepository
     */
    public function __construct(CategoryEventsRepository $categoryEvents)
    {
        $this->category_events = $categoryEvents;
    }

    /**
     * Show action for category_events.
     * 
     * @param CategoryEvent $category_events
     * @return $this
     */

    public function index()
    {
        $category_events = $this->category_events->getPublic();
        return view('event.index', compact('category_events'));
    }
}
<?php
namespace App\Http\Controllers;

use App\CategoryNews;
use App\Repositories\CategoryNewsRepository;
use App\Repositories\NewsRepository;

class CategoryNewsController extends Controller
{
    /**
     * @var CategoryTrainings
     */
    protected $category_news;

    /**
     * CategoriesController constructor.
     * @param CategoryTrainings $categoryRepository
     */
    public function __construct(CategoryNewsRepository $categoryNews)
    {
        $this->category_news = $categoryNews;
    }

    /**
     * Show action for category_news.
     * 
     * @param CategoryAntrenament $category_news
     * @return $this
     */

    public function index()
    {
        $category_news = $this->category_news->getPublic();
        return view('news.index', compact('category_news'));
    }
}
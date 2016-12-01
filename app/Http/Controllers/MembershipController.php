<?php
namespace App\Http\Controllers;

use App\CategoryEvent;
use App\Repositories\CategoryMembershipRepository;
use App\Repositories\PrivilegeRepository;
use App\Repositories\FaqRepository;
use App\Repositories\SlidesRepository;
class MembershipController extends Controller
{
    /**
     * @var CategoriesEvents
     */
    protected $category_membership;
    protected $privilege;
    protected $faq;
    protected $slides;

    /**
     * CategoriesController constructor.
     * @param CategoriesEvents $categoryRepository
     */
    public function __construct(CategoryMembershipRepository $categoryMembership, PrivilegeRepository $privilege, FaqRepository $faq, SlidesRepository $slides)
    {
        $this->category_membership = $categoryMembership;
        $this->privilege = $privilege;
        $this->faq = $faq;
        $this->slides = $slides;
    }

    /**
     * Show action for category_events.
     * 
     * @param CategoryEvent $category_events
     * @return $this
     */

    public function index()
    {
        $category_membership = $this->category_membership->getPublic();
        $privilege           = $this->privilege->getPublic();
        $faq                 = $this->faq->getPublicLatest($count = 5);
        $slides              = $this->slides->getPublic($type='membership');
        return view('membership.index', compact('category_membership','privilege','faq','slides'));
    }
}
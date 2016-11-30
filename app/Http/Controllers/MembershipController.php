<?php
namespace App\Http\Controllers;

use App\CategoryEvent;
use App\Repositories\CategoryMembershipRepository;
use App\Repositories\PrivilegeRepository;
class MembershipController extends Controller
{
    /**
     * @var CategoriesEvents
     */
    protected $category_membership;
    protected $privilege;

    /**
     * CategoriesController constructor.
     * @param CategoriesEvents $categoryRepository
     */
    public function __construct(CategoryMembershipRepository $categoryMembership,PrivilegeRepository $privilege)
    {
        $this->category_membership = $categoryMembership;
        $this->privilege = $privilege;
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
        return view('membership.index', compact('category_membership','privilege'));
    }
}
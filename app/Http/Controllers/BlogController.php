<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogController extends Controller
{    
    /**
     * blogRepository
     *
     * @var mixed
     */
    private $blogRepository;
    
    /**
     * __construct
     *
     * @param  mixed $blogRepository
     * @return void
     */
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $blogs = $this->blogRepository->all();

        return view('blog')->with($blogs);
    }

    /**
     * detail
     *
     * @param  mixed $id
     * @return void
     */
    public function detail($id)
    {
        $user = User::find($id);
        $blogs = $this->blogRepository->getByUser($user);

        return view('blog')->with($blogs);
    }
}

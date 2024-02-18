<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\User;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Routing\Route;
use Illuminate\Auth\Events\Registered;
use Illuminate\Pagination\LengthAwarePaginator;


class Home extends Controller
{
    public function index()
    {
        return view("home", [
            "judul" => 'Halaman Home',
            'AllBlog' => Post::latest()->Filterring(request(['search']))->paginate(3)->withQueryString(),
            'AllCategory' => category::all(),
            'RecentPost' => Post::latest()->paginate(3)
        ]);
    }


    public function DetailBlogHome(Post $post)
    {
        return view('Halaman_Detail_Blog_Home', [
            'judul' => 'Detail Blog',
            'detailbloghome' => Post::where('slug', $post->slug)->first(),
            'AllCategory' => Category::all(),
            'RecentPost' => Post::latest()->paginate(3)
        ]);
    }

    public function CategoryBlogHome(category $categoryblog)
    {
        $posts = Post::where('slug_category', $categoryblog->category_slug);

        if (request('search')) {
            $posts->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('published_at', 'like', '%' . request('search') . '%');
            });
        }

        $posts = $posts->paginate(7)->withQueryString();

        return view('Halaman_Category_Blog', [
            'judul' => 'Halaman Category ' . $categoryblog->name,
            'Category' => $posts,
            'AllCategory' => category::all(),
            'CategoryBlog' => category::where('name', $categoryblog->name)->get(),
            'OneCategory' => category::where('category_slug', $categoryblog->category_slug)->first(),
            'RecentPost' => Post::latest()->paginate(3)->withQueryString()
        ]);
    }



    public function MadeBy()
    {
        return view('Halaman_Made_By', [
            'judul' => 'Made By',
            'AllCategory' => category::all(),
            'RecentPost' => Post::latest()->paginate(3),
            'AllCategory' => category::all(),
        ]);
    }
}

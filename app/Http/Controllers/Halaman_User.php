<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\category;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Route;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class Halaman_User extends Controller
{

    public function index()
    {
        return view("Halaman_Dashboard_User", [
            "judul" => 'Dashboard',
            'jumlahtotalpostinganbloguser' => Post::where('user_id', auth()->user()->id)->count(),
            'categorybloguser' => category::all()
        ]);
    }


    public function Profile()
    {
        return view('Halaman_Profile_User', [
            'judul' => 'Halaman Profile User'
        ]);
    }


    public function PostProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'kode_pos' => 'required|numeric',
            'no_telepon' => 'required|numeric',
        ]);


        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'kota' => $request->input('kota'),
            'negara' => $request->input('negara'),
            'kode_pos' => $request->input('kode_pos'),
            'tentang_saya' => $request->input('tentang_saya'),
        ]);

        $post = Post::where('user_id', auth()->user()->id);

        $post->update([
            'name' => $request->input('name'),
        ]);

        return back()->with('sukses', 'Update Profile Berhasil');
    }


    public function PostEditFotoProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|file|max:1024',
        ]);

        if ($request->file('image')) {

            $image['image'] = $request->file('image')->store('profile');
        } else {

            $image['image'] = 'default.jpg';
        }

        $user = User::find(auth()->user()->id);

        $user->update([
            'image' => $image['image'],
        ]);


        $postimage = Post::where('user_id', auth()->user()->id);

        $postimage->update([
            'image' => $image['image'],
        ]);

        return back()->with('suksess', 'Update Foto Profile Berhasil');
    }


    public function MyPost()
    {
        $mypost = Post::where('user_id', auth()->user()->id);

        if (request('search')) {
            $search = '%' . request('search') . '%';
            $mypost->where(function ($query) use ($search) {
                $query->where('title', 'like', $search)
                    ->orwhere('slug_category', 'like', $search)
                    ->orwhere('published_at', 'like', $search);
            });
        }
        return view('Halaman_Post', [
            'judul' => 'Halaman Post',
            'datablog' => $mypost->latest()->paginate(5)->withQueryString()
        ]);
    }


    public function TambahBlogPostingan()
    {
        if (empty(auth()->user()->name) || empty(auth()->user()->no_telepon) || empty(auth()->user()->alamat) || empty(auth()->user()->kota) || empty(auth()->user()->negara) || empty(auth()->user()->kode_pos)) {
            return redirect('/Post')->with('lengkapi', 'Silahkan Lengkapi Biodata Anda Terlebih Dahulu Di Halaman Profile, Agar Bisa Menambah Postingan Blog');
        } else {
            return view('Halaman_Tambah_Postingan_Blog', [
                'judul' => 'Halaman Tambah Postingan Blog',
                'category' => category::all()
            ]);
        }
    }

    public function Slugcheck(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }


    public function TambahPostinganBaru(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts',
            'slug_category' => 'required',
            'body' => 'required',
            'published_at' => 'required',
            'blog_image' => 'required|image|file|max:1024',

        ]);

        if ($request->file('blog_image')) {

            $blog_image['blog_image'] = $request->file('blog_image')->store('blog_image');
        }

        $createpost = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'slug_category' => $request->input('slug_category'),
            'body' => $request->input('body'),
            'published_at' => $request->input('published_at'),
            'blog_image' => $blog_image['blog_image'],
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'image' => auth()->user()->image,
            'negara' => auth()->user()->negara
        ];

        Post::create($createpost);

        return redirect('/Post')->with('blog_sukses', 'Tambah Postingan Blog Berhasil');
    }


    public function DeleteBlog(Post $dtblg)
    {
        Post::where('slug', $dtblg->slug)->delete();

        return redirect('/Post')->with('hapus_blog', 'Hapus Blog Berhasil');
    }


    public function DetailBlog(Post $post)
    {
        return view('Halaman_Detail_Blog', [
            'judul' => 'Halaman Detail Blog',
            'detailblog' => $post
        ]);
    }


    public function editblog(Post $post)
    {
        return view('Halaman_Edit_Blog', [
            'judul' => 'Halaman Edit Postingan Blog',
            'datablog' => $post,
            'category' => category::all()
        ]);
    }

    public function PostEditHeaderBlog(Request $request, Post $post)
    {
        $request->validate([
            'slug_category' => 'required',
            'published_at' => 'required',
        ]);

        Post::where('slug', $post->slug)->update([
            'slug_category' => $request->input('slug_category'),
            'published_at' => $request->input('published_at'),
            'negara' => auth()->user()->negara
        ]);

        $redirectURL = '/EditBlog/' . $post->slug;
        return redirect($redirectURL)->with('editheaderblog', 'Edit Header Blog Berhasil');
    }


    public function PostEditJudulBlog(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
        ]);

        Post::where('slug', $post->slug)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ]);


        return redirect('/Post')->with('editjudulblog', 'Edit Judul Blog Berhasil');
    }


    public function PostEditFotoBlog(Request $request, Post $post)
    {
        $request->validate([
            'blog_image' => 'required|image|file|max:1024',
        ]);

        if ($request->file('blog_image')) {

            $blog_image['blog_image_update'] = $request->file('blog_image')->store('blog_image_update');
        }

        Post::where('slug', $post->slug)->update([

            'blog_image' => $blog_image['blog_image_update'],
        ]);


        $redirectURL = '/EditBlog/' . $post->slug;
        return redirect($redirectURL)->with('editfotoblog', 'Edit Foto Postingan Blog Berhasil');
    }


    public function PostEditBodyTeksBlog(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        Post::where('slug', $post->slug)->update([
            'body' => $request->input('body'),
        ]);


        $redirectURL = '/EditBlog/' . $post->slug;
        return redirect($redirectURL)->with('editbodyteksblog', 'Edit Body Teks Postingan Blog Berhasil');
    }


    public function UpdateProfilePostUser(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:1025',
        ]);

        if ($request->file('image')) {

            $image['profile'] = $request->file('image')->store('profile');
        } else {

            $image['profile'] = 'default.jpg';
        }

        $posts = Post::where('slug', $post->slug);

        $posts->update([
            'name' => $request->input('name'),
            'image' => $image['profile'],
        ]);

        return redirect('/Post')->with('success', '');
    }

    public function DataPostinganBlogUser(category $category)
    {

        return view('Halaman_Detail_Data_Postingan_Blog_User', [
            'judul' => 'Halaman Data Postingan Blog User',
            'judul2' => 'Data Postingan Blog User',
            'judul3' => 'Data Postingan Blog User',
            'categorypostuser' => Post::where('slug_category', $category->category_slug)->where('user_id', auth()->user()->id)->latest()->paginate(7)->withQueryString(),
            'countcategorypostuser' => Post::where('slug_category', $category->category_slug)->where('user_id', auth()->user()->id)->count(),
            'rowcategorypostuser' => $category
        ]);
    }


    public function HapusCategoryPostBlogUser(Post $post)
    {
        Post::where('slug', $post->slug)->delete();

        return redirect('/Dashboard')->with('Hapus', 'Hapus Postingan Blog Berhasil');
    }


    public function EditCategoryPostBlogUser(Post $post)
    {
        return view('Halaman_Edit_Category_Post_Blog_User', [
            'judul' => 'Halaman Edit Data Postingan Blog User',
            'judul2' => 'Edit Postingan Blog User',
            'judul3' => 'Edit Postingan Blog User',
            'editcategorypostuser' => Post::where('slug', $post->slug)->first(),
            'categorybloguser' => category::all()
        ]);
    }


    public function EditCategoryHeaderBlog(Post $post, Request $request)
    {
        $request->validate([
            'slug_category' => 'required',
            'published_at' => 'required',
        ]);

        Post::where('slug', $post->slug)->update([
            'slug_category' => $request->input('slug_category'),
            'published_at' => $request->input('published_at'),
        ]);

        $redirectURL = '/editcategorypostbloguser/' . $post->slug;

        return redirect($redirectURL)->with('editsukses', 'Edit Data Blog Berhasil');
    }


    public function EditPostJudulBlogUser(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        Post::where('slug', $post->slug)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ]);

        return redirect('/Dashboard')->with('editsukses', 'Edit Data Blog Berhasil');
    }


    public function EditPostFotoBlogUser(Post $post, Request $request)
    {
        $request->validate([
            'blog_image' => 'required|image|file|max:1025',
        ]);

        if ($request->file('blog_image')) {
            $blog_image['blog_image_update'] = $request->file('blog_image')->store('blog_image_update');
        }

        Post::where('slug', $post->slug)->update([
            'blog_image' => $blog_image['blog_image_update'],
        ]);


        $redirectURL = '/editcategorypostbloguser/' . $post->slug;
        return redirect($redirectURL)->with('success', '');
    }


    public function EditPostBodyTeksBlogUser(Post $post, Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        Post::where('slug', $post->slug)->update([
            'body' => $request->input('body'),
        ]);

        $redirectURL = '/editcategorypostbloguser/' . $post->slug;
        return redirect($redirectURL)->with('success', '');
    }


    public function PetunjukPenggunaanBlog()
    {
        return view('Halaman_Petunjuk_Penggunaan_Blog', [
            'judul' => 'Halaman Petunjuk Penggunaan Blog',
            'judul2' => 'Petunjuk Penggunaan Blog',
            'judul3' => 'Petunjuk Penggunaan Blog'
        ]);
    }


    public function EditProfilePostBlogUser(Post $post)
    {
        return view('Halaman_Edit_Profile_Post_Blog_User', [
            'judul' => 'Halaman Edit Profile Postingan Blog User',
            'judul2' => 'Edit Profile Postingan Blog User',
            'judul3' => 'Edit Profile Postingan Blog User',
            'datapost' => Post::where('slug', $post->slug)->first(),
        ]);
    }


    public function PostEditProfileBlogUser(Post $post, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Post::where('slug', $post->slug)->update([
            'name' => $request->input('name'),
        ]);

        $redirectURL = '/editprofilepostbloguser/' . $post->slug;
        return redirect($redirectURL)->with('PostEditProfileBlogUser', 'Edit Nama Berhasil');
    }


    public function PostEditFotoProfileBlogUser(Post $post, Request $request)
    {
        $request->validate([
            'image' => 'required|image|file|max:1025',
        ]);

        if ($request->file('image')) {
            $image['profile'] = $request->file('image')->store('profile');
        }

        Post::where('slug', $post->slug)->update([
            'image' => $image['profile']
        ]);


        $redirectURL = '/editprofilepostbloguser/' . $post->slug;
        return redirect($redirectURL)->with('PostEditFotoProfileBlogUser', 'Edit Foto Post Berhasil');
    }

    public function DeletePostEditFotoProfileBlogUser(Post $post)
    {

        $post = Post::where('slug', $post->slug)->first();

        $post->update([
            'image' => 'default.jpg',
        ]);

        $post->save();

        return redirect('/Dashboard')->with('', '');
    }


    public function PostDeleteFotoProfileUser($id)
    {
        User::where('id', $id)->update([
            'image' => 'default.jpg',
        ]);

        return redirect('/profile')->with('', '');
    }

    public function TambahDataCategoryPostBlogUser(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts',
            'slug_category' => 'required',
            'body' => 'required',
            'published_at' => 'required',
            'blog_image' => 'required|image|file|max:1024',
        ]);

        if ($request->file('blog_image')) {

            $image['blog_image'] = $request->file('blog_image')->store('blog_image');
        }


        $create = [
            'title' => $request->title,
            'slug' => $request->slug,
            'slug_category' => $request->slug_category,
            'body' => $request->body,
            'published_at' => $request->published_at,
            'blog_image' => $image['blog_image'],
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'image' => auth()->user()->image,
            'negara' => auth()->user()->negara
        ];

        Post::create($create);

        return redirect('/Dashboard')->with('tambahdatacategorypostbloguser', 'Tambah Data Blog Berhasil');
    }
}

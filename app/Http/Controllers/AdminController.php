<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\category;
use Symfony\Component\Routing\Route;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminController extends Controller
{

    public function index()
    {
        return view("Admin.Halaman_Dashboard_Admin", [
            'judul' => "Halaman Dashboard Admin",
            'jumlahsemuauser' => User::where('role', 0)->count(),
            'jumlahsemuauseradmin' => User::where('role', 1)->count(),
            'jumlahsemuakategoriblog' => category::all()->count(),
            'jumlahsemuapostinganblog' => Post::all()->count(),
            'jumlahsemuapostinganblogkategori' => category::all(),
        ]);
    }


    public function DataUser()
    {
        $user = DB::table('users')->where('role', 0);

        if (request('searchdatauser')) {
            $searchTerm = '%' . request('searchdatauser') . '%';
            $user->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
            });
        }

        $usersbiasa = $user->paginate(5)->withQueryString();

        return view('Admin.Halaman_Data_User', [
            'judul' => 'Halaman Data User',
            'datausers' => $usersbiasa
        ]);
    }


    public function DataUserAdmin()
    {
        $useradmin = User::where('role', 1);

        if (request('search')) {
            $search = '%' . request('search') . '%';
            $useradmin->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orwhere('email', 'like', $search)
                    ->orwhere('created_at', 'like', $search);
            });
        }

        $usersadmin = $useradmin->paginate(5)->withQueryString();

        return view('Admin.Halaman_Data_User_Admin', [
            'judul' => 'Halaman Data User Admin',
            'datausersadmin' => $usersadmin
        ]);
    }


    public function DeleteDataUser($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/datauser')->with('hapusdatauser', 'Hapus Data User Berhasil');
    }


    public function DetailDataUser(User $users)
    {
        return view("Admin.Halaman_Detail_Data_User", [
            'judul' => 'Halaman Detail Data User',
            'judul2' => 'Detail Data User',
            'judul3' => 'Detail Data User',
            'datausers' => $users
        ]);
    }


    public function DetailDataPostinganUser(User $users)
    {
        $user = User::where('email', $users->email)->firstOrFail();

        $posts = Post::where('user_id', $user->id);

        if (request('search')) {
            $search = '%' . request('search') . '%';
            $posts->where(function ($query) use ($search) {
                $query->where('title', 'like', $search)
                    ->orWhere('name', 'like', $search)
                    ->orwhere('slug_category', 'like', $search)
                    ->orwhere('published_at', 'like', $search)
                    ->orwhere('negara', 'like', $search);
            });
        }

        $postsuser = $posts->paginate(5)->withQueryString();

        return view("Admin.Halaman_Detail_Data_Postingan_User", [
            'judul' => 'Halaman Detail Data Postingan User',
            'judul2' => 'Detail Data Postingan User',
            'judul3' => 'Detail Data Postingan User',
            'datapostinganusers' => $postsuser,
            'firstdatapostinganusers' => $user
        ]);
    }


    public function DetailPostinganBlogUser(Post $post)
    {
        $postslugblog = Post::where('slug', $post->slug);

        if (request('search')) {
            $search = '%' . request('search') . '%';
            $postslugblog->where(function ($query) use ($search) {
                $query->where('body', 'like', $search);
            });
        }

        $postslug = $postslugblog->firstOrFail();

        return view("Admin.Halaman_Detail_Slug_Postingan_Blog_User", [
            'judul' => 'Halaman Detail Data Postingan User',
            'judul2' => 'Detail Data Postingan User',
            'judul3' => 'Detail Data Postingan User',
            'dataslug' => $postslug,
        ]);
    }


    public function HapusPostinganBlogUser(Post $post)
    {
        Post::where('slug', $post->slug)->delete();

        return redirect('/datauser')->with('delete', 'Hapus Data Postingan Berhasil');
    }


    public function EditRoleUser($id)
    {
        return view('Admin.Halaman_Edit_Role_User', [
            'judul' => 'Halaman Edit Role User',
            'judul2' => 'Edit Role User',
            'judul3' => 'Edit Role User',
            'user' => User::where('id', $id)->first()
        ]);
    }


    public function UpdateRoleUser(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'role' => $request->role
        ]);

        return redirect('/Dashboard_Admin')->with('success', '');
    }


    public function ProfileUserAdmin()
    {
        return view('Admin.Halaman_Profile_User_Admin', [
            'judul' => 'Halaman Profile User Admin',
            'judul2' => 'Profile User Admin',
            'judul3' => 'Profile User Admin',
        ]);
    }


    public  function UpdateProfileUserAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'kode_pos' => 'required|numeric',
        ]);

        User::where('id', auth()->user()->id)->update([
            'name' => $request->input('name'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'kota' => $request->input('kota'),
            'negara' => $request->input('negara'),
            'kode_pos' => $request->input('kode_pos'),
        ]);


        Post::where('user_id', auth()->user()->id)->update([
            'name' => $request->input('name'),
            'negara' => $request->input('negara'),
        ]);

        return redirect('/profileuseradmin')->with('updateprofileadmin', 'Ubah Profile Berhasil');
    }


    public function PostEditFotoProfileAdmin(Request $request)
    {
        $request->validate([
            'image' => 'required|image|file|max:1025',
        ]);

        if ($request->File('image')) {

            $image['profile'] = $request->file('image')->store('profile');
        } else {
            $image['profile'] = 'default.jpg';
        }


        User::where('id', auth()->user()->id)->update([
            'image' => $image['profile']
        ]);

        Post::where('user_id', auth()->user()->id)->update([
            'image' => $image['profile']
        ]);

        return redirect('/profileuseradmin')->with('updatefotoprofileadmin', 'Update Foto Profile Berhasil');
    }


    public function DeleteDataUserAdmin($id)
    {
        User::where('id', $id)->delete();

        return redirect('/datauseradmin')->with('deleteuseradmin', 'Hapus User Admin Berhasil');
    }


    public function DetailDataUserAdmin($id)
    {
        return view('Admin.Halaman_Detail_Data_User_Admin', [
            'judul' => 'Halaman Detail Data User Admin',
            'judul2' => 'Detail Data User Admin',
            'judul3' => 'Detail Data User Admin',
            'datauseradmindetail' => User::where('id', $id)->first()
        ]);
    }


    public function DetailDataPostinganUserAdmin($id)
    {

        $post = Post::where('user_id', $id);

        if (request('search')) {
            $searching = '%' . request('search') . '%';
            $post->where(function ($query) use ($searching) {
                $query->where('title', 'like', $searching)
                    ->orwhere('name', 'like', $searching)
                    ->orWhere('published_at', 'like', $searching)
                    ->orwhere('slug_category', 'like', $searching)
                    ->orwhere('negara', 'like', $searching);
            });
        }

        $postadmin = $post->paginate(5)->withQueryString();

        return view('Admin.Halaman_Detail_Data_Postingan_User_Admin', [
            'judul' => 'Halaman Detail Data Postingan User Admin',
            'judul2' => 'Detail Data PostinganUser Admin',
            'judul3' => 'Detail Data Postingan User Admin',
            'detaildatapostinganuseradmin' => $postadmin,
            'detaildatapostinganuseradminid' => User::where('id', $id)->first()
        ]);
    }


    public function HapusPostinganBlogUserAdmin(Post $post)
    {
        Post::where('slug', $post->slug)->delete();

        return redirect('/datauseradmin')->with('', '');
    }


    public function DetailDataPostinganBlogUserAdmin(Post $post)
    {
        return view('Admin.Halaman_Detail_Slug_Blog_Admin', [
            'judul' => 'Halaman Detail Postingan Blog Admin',
            'judul2' => 'Detail Postingan Blog Admin',
            'judul3' => 'Detail Postingan Blog Admin',
            'dataslugblogadmin' => Post::where('slug', $post->slug)->first()
        ]);
    }


    public function EditRoleUserAdmin($id)
    {
        return view('Admin.Halaman_Edit_Role_User_Admin', [
            'judul' => 'Halaman Edit Role User Admin',
            'judul2' => 'Edit Role User Admin',
            'judul3' => 'Edit Role User Admin',
            'roleuseradmin' => User::where('id', $id)->first()
        ]);
    }


    public function UpdateRoleUserAdmin(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'role' => $request->input('role'),
        ]);

        return redirect('/Dashboard_Admin')->with('', '');
    }


    public function DataPostinganBlog()
    {
        $post = DB::table('posts');

        if (request('search')) {
            $post->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('slug_category', 'like', '%' . request('search') . '%')
                ->orwhere('name', 'like', '%' . request('search') . '%')
                ->orwhere('published_at', 'like', '%' . request('search') . '%')
                ->orwhere('negara', 'like', '%' . request('search') . '%');
        }
        return view('Admin.Halaman_Data_Postingan_Blog_User', [
            'judul' => 'Halaman Data Postingan Blog User',
            'judul2' => 'Data Postingan Blog User',
            'judul3' => 'Data Postingan Blog User',
            'datablogpostingan' => $post->paginate(5)->withQueryString()
        ]);
    }


    public function DeletePostinganBlogUser(Post $post)
    {
        Post::where('slug', $post->slug)->delete();

        return redirect('/datapostinganblog')->with('', '');
    }


    public function DetailProfilePostBlogUser($user_id)
    {
        return view('Admin.Halaman_Detail_Profile_Postingan_Blog_User', [
            'judul' => 'Halaman Detail Profile Postingan Blog User',
            'judul2' => 'Detail Profile Postingan Blog User',
            'judul3' => 'Detail Profile Postingan Blog User',
            'profilepostuser' => User::where('id', $user_id)->first()
        ]);
    }


    public function DetailDataPostBlogUser(Post $post)
    {
        return view('Admin.Halaman_Detail_Data_Post_Blog_User', [
            'judul' => 'Halaman Detail Postingan Blog User',
            'judul2' => 'Detail Postingan Blog User',
            'judul3' => 'Detail Postingan Blog User',
            'detaildatapostbloguser' => Post::where('slug', $post->slug)->first()
        ]);
    }


    public function DataCategoryBlog()
    {
        $category = DB::table('categories');

        if (request('search')) {
            $category->where('id', 'like', '%' . request('search') . '%')
                ->orwhere('name', 'like', '%' . request('search') . '%')
                ->orwhere('category_slug', 'like', '%' . request('search') . '%');
        }

        return view('Admin.Halaman_Data_Category_Blog', [
            'judul' => 'Halaman Data Category Blog',
            'judul2' => 'Data Category Blog',
            'judul3' => 'Data Category Blog',
            'datacategoryblog' => $category->paginate(15)->withQueryString()
        ]);
    }


    public function DeleteDataCategoryBlog($id)
    {
        category::where('id', $id)->delete();

        return redirect('/datacategoryblog')->with('', '');
    }


    public function EditDataCategoryBlog($id)
    {
        return view('Admin.Halaman_Edit_Data_Category_Blog', [
            'judul' => 'Halaman Edit Data Category Blog',
            'judul2' => 'Edit Data Category Blog',
            'judul3' => 'Edit Data Category Blog',
            'editdatablogcategory' => category::where('id', $id)->first()
        ]);
    }


    public function UpdateDataBlogCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_slug' => 'required|max:255'
        ]);

        category::where('id', $id)->update([
            'name' => $request->name,
            'category_slug' => $request->category_slug,
        ]);

        return redirect('/datacategoryblog')->with('', '');
    }


    public function TambahCategoryBlog()
    {
        return view('Admin.Halaman_Tambah_Data_Category_Blog', [
            'judul' => 'Halaman Tambah Data Category Blog',
            'judul2' => 'Tambah Category Blog',
            'judul3' => 'Tambah Category Blog',
        ]);
    }


    public function PostTambahDataCategoryBlog(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_slug' => 'required|max:255'
        ]);


        category::insert([
            'name' => $request->name,
            'category_slug' => $request->category_slug,
        ]);


        return redirect('/datacategoryblog')->with('', '');
    }
}

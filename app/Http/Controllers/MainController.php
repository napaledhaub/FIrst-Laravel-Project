<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Article;
use Auth;
use Session;

class MainController extends Controller {
    //Guest Controller---------------------------------------------------------------------------
    public function showArticle() {
        $articleList = Article::with('category')->get();
        $categoryList = Category::all();
        return view('guest.home', compact('articleList', 'categoryList'));
    }

    public function showCategory($id) {
        $articleList = Article::where('category_id', $id)->get();
        $articleCategory = Category::where('id', $id)->first();
        $categoryList = Category::all();
        return view('guest.category', compact('articleList', 'articleCategory', 'categoryList'));
    }

    public function detail($id) {
        $article = Article::find($id);
        $categoryList = Category::all();
        return view('guest.story', compact('article', 'categoryList'));
    }


    //Login Controller---------------------------------------------------------------------------
    public function login() {
        $categoryList = Category::all();
        return view('guest.login', compact('categoryList'));
    }

    public function loginAttempt(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user != null) {
            if($request->password == $user->password) {
                Auth::login($user);
                if($user->role == 'admin') return redirect()->intended('showUsers');
                else if($user->role == 'user') return redirect()->intended('userHome');
            }
            else return redirect()->back();
        }
        else return redirect()->back();
    }

    
    //Register Controller---------------------------------------------------------------------------
    public function register() {
        $categoryList = Category::all();
        return view('guest.register', compact('categoryList'));
    }
    
    public function registerAttempt(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => "user",
            'password' => $request->password
        ]);
        return redirect('/');
    }


    //User Controller---------------------------------------------------------------------------
    public function greet(Request $request) {
        $user = User::where('id', $request->user()->id)->first();
        return view('user.greeting', compact('user'));
    }

    public function destroyBlog($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back();
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('id', $request->user()->id)->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password
        ]);
        return redirect()->back();
    }

    public function showBlog(Request $request) {
        $articleList = Article::where('user_id', $request->user()->id)->get();
        return view('user.blog', compact('articleList'));
    }

    public function showProfile(Request $request) {
        $user = User::where('id', $request->user()->id)->first();
        return view('user.profile', compact('user'));
    }

    public function createBlog() {
        $categoryList = Category::all();
        return view('user.create', compact('categoryList'));
    }

    public function storeBlog(Request $request) {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('image'), $imageName);
        Article::create([
            'user_id' => $request->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);
        return redirect()->back();
    }

    public function blogDetail($id) {
        $article = Article::find($id);
        return view('user.fullStory', compact('article'));
    }


    //Admin Controller---------------------------------------------------------------------------
    public function showUsers() {
        $userList = User::where('role', 'user')->get();
        return view('admin.userMenu', compact('userList'));
    }


    public function showStuff() {
        $articleList = Article::all();
        $user = User::All();
        return view('admin.articleMenu', compact('articleList'));
    }

    public function destroyArticle($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back();
    }

    public function destroyUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function articleDetail($id) {
        $article = Article::find($id);
        return view('admin.fullArticle', compact('article'));
    }

    public function storeCategory(Request $request) {
        $request->validate(['name' => 'required']);
        Category::create(['name' => $request->name]);
        return redirect()->back();
    }

    public function showMemes() {
        $categoryList = Category::All();
        return view('admin.categoryMenu', compact('categoryList'));
    }


    //Logout Controller---------------------------------------------------------------------------
    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}

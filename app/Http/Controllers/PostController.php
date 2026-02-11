<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
  {
    // بنجيب المقالات مرتبة من الأحدث للأقدم
    $posts = Post::latest()->get(); 
    
    // بنبعت المتغير $posts لصفحة الداشبورد
    return view('dashboard.index', compact('posts'));
}
    // عرض صفحة الإضافة
    public function create() {
        return view('dashboard.create_post');
    }
    public function destroy($id)
{
    // 1. بندور على المقال بالـ ID بتاعه
    $post = Post::findOrFail($id);

    // 2. بنحذف المقال من الداتابيز
    $post->delete();

    // 3. بنرجع المستخدم للداشبورد مع رسالة نجاح
    return redirect()->route('dashboard')->with('success', 'تم حذف المقال بنجاح!');
}
    // حفظ المقال في الداتابيز
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // بناخد ID الشخص اللي مسجل دخول حالياً
        ]);

        return redirect()->route('dashboard')->with('success', 'تم نشر المقال بنجاح!');
    }
    // 1. عرض صفحة التعديل ومعاها بيانات المقال
public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('dashboard.edit_post', compact('post'));
}

// 2. استقبال البيانات الجديدة وحفظها
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('dashboard')->with('success', 'تم تحديث المقال بنجاح!');
}
public function show($id) {
    $post = Post::findOrFail($id);
    return view('dashboard.show_post', compact('post'));
}
}

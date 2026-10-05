<?php
namespace App\Http\Controllers;

use App\Models\{Article, Gallery, Message, Product};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'articles' => Article::published()->latest('published_at')->take(3)->get(),
            'galleries' => Gallery::latest()->take(6)->get(),
            'products' => Product::latest()->take(4)->get(),
        ]);
    }
    public function about() { return view('about'); }
    public function contact() { return view('contact'); }
    public function send(Request $r)
    {
        $d = $r->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|in:Informasi PPDB,Kerja Sama,Lainnya',
            'body' => 'required|string|max:2000',
            'agree' => 'accepted',
        ]);
        unset($d['agree']);
        Message::create($d);
        return back()->with('ok', 'Pesan terkirim. Kami akan membalas dalam 1–2 hari kerja.');
    }
}

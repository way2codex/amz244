<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Store;
use App\Models\ArticleCampaign;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (store_data()['home_blade'] != "") {
            session()->put('article_campaign_redirect', false);
            $data = Article::limit(1)->inRandomOrder()->first();
            $url = "https://syndication.exdynsrv.com/splash.php?cat=&idzone=4943802&type=8&p=https%3A%2F%2Fwww.indiality.shop%2&sub=&tags=&el=&cookieconsent=true&scr_info=cmVtb3RlfHBvcHVuZGVyanN8MjYyMjU2NjY%3D";
            // $url = "https://syndication.exdynsrv.com/splash.php?cat=&idzone=4945728&type=8&p=https%3A%2F%2Fwww.beautifulstuff.online%2Farticle%2F" . $data['id'] . "%2F" . $data['slug'] . "&sub=&tags=&el=&cookieconsent=true&scr_info=cmVtb3RlfHBvcHVuZGVyanN8MjYyMjU2NjY%3D";

            return redirect()->away($url);
            // return view(store_data()['home_blade']);
        } else {
            $data = Article::with('category')->latest()->paginate(18);
            return view('welcome', compact('data'));
        }
    }
    public function article_campaign($id)
    {
        $camp = ArticleCampaign::where('campaign_id', $id)->where('status', 'active')->first();
        $article = Article::limit(1)->inRandomOrder()->first();
        if ($camp) {
            session()->put('article_campaign_redirect', true);

        } else {
            session()->put('article_campaign_redirect', false);
            session(['article_campaign_redirect' => 'false']);
        }
        return redirect()->route('article', ['id' => $article['id'], 'slug' => $article['slug']]);
    }
    public function page($page)
    {
        $store_data = [];
        $view = 'page.' . $page;
        if (view()->exists($view)) {
            $store_id = store_id();
            $store_data = Store::where('id', $store_id)->first();
        } else {
            $view = '404';
        }
        return view($view, compact('store_data'));
    }
    public function category($category_id)
    {
        $data = Article::with('category')
            ->where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->latest()
            ->paginate(18);
        return view('welcome', compact('data'));
    }
    public function article($id)
    {

        $data = Article::with(['category', 'article_widget'])
            ->where('id', $id)
            ->first();

        if (session('article_campaign_redirect') === true) {
            session()->put('article_campaign_redirect', false);
            $url = "https://syndication.exdynsrv.com/splash.php?cat=&idzone=4945728&type=8&p=https%3A%2F%2Fwww.beautifulstuff.online%2Farticle%2F" . $data['id'] . "%2F" . $data['slug'] . "&sub=&tags=&el=&cookieconsent=true&scr_info=cmVtb3RlfHBvcHVuZGVyanN8MjYyMjU2NjY%3D";

            return redirect()->away($url);
        } else {
            $related_data = Article::with('category')
                ->where('category_id', $data['category_id'])
                ->limit(16)
                ->get();
            $prev_next_data = Article::limit(2)->inRandomOrder()->get();
            return view('article', compact('data', 'related_data', 'prev_next_data'));
        }
    }
}

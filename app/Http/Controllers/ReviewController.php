<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use App\Models\Form;
use App\Models\Like;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Collection; //追記
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth'); //ユーザーとしてログイン済みかどうか
    }

    public function layout() {
        return view('review.index');
    } 

    public function item() {
        return view('review.item');
    } 

    public function layout_admin() {
        return view('review.admin');
    } 

    public function update() {
        return view('review.update');
    } 

    public function review_admin() {
        return view('review.review');
    } 

    
    
    /*
    @param int $id
    */

    public function update2($id) {

        $itemid = Shop::find($id);

        return view('review.update2',['itemid' => $itemid]);
    }

    public function admin() {

        $items = DB::table('items')->select('id', 'image','item_name', 'comment')->get();
        return view('review.update ',['items' => $items]);
    } 

    public function index() {
        
        $items = DB::table('items')->select('id', 'image','item_name', 'comment')->get();
        return view('review.item',['items' => $items]);

    }

    


    public function form() {

        $forms = DB::table('forms')->select('id', 'text_title','text', 'created_at')->get();
        $formInputs = Session::get('form_inputs');

        return view('review.form', compact('forms', 'formInputs'));

        //return view('review.form',['forms' => $forms]);
    } 

    public function review(Request $request) {
        $reviews = DB::table('forms')->select('id', 'text_title','text','created_at')->get();
        return view('review.review',['reviews' => $reviews]);

    } 

    //public function review_admin($id) {
        //$reviewad = DB::table('forms')->select('id', 'text_title','text','created_at')->get();
        //return view('review.review_admin',['reviewsad' => $reviewad]);
       
       // //$reviews = Form::find($id);
        //return view('review.review_admin',['reviews' => $reviews]);

    //} 


    // バリデーション
    public function confirm(Request $request)
    {

        
        $inputs = $request->validate([
            'text_title' => 'required',
            'text' => 'required',
        ]);
        try {
            Form::create([
                'user_id' => $request->input('user_id'),
                'item_id' => $request->input('item_id'),
                'text_title'=>$inputs['text_title'],
                'text'=>$inputs['text'],
                'created_at' => now(),
        
        ]);
        }catch(\Exception $e){dd($e->getMessage());}

        Session::put('form_inputs', $inputs); // フォームの入力値をセッションに保存

        return redirect()->route('review');
        //return view('review.confirm', ['inputs' => $inputs]);
        
       // $inputs = $request->all();
       // return view('review.confirm', [
       // 'inputs' => $inputs,
       // ]);
    }

    public function item00(Request $request)
    {
        $inputs = $request->validate([

            'item_name'=> 'required',
            'comment' => 'required',
        
        ]);
        try {
            Shop::create([
                'image' => $request->input('image'),
                'item_name' => $request->input('item_name'),
                'comment'=>$inputs['comment'],
                'created_at' => now(),
        
        ]);
        }catch(\Exception $e){dd($e->getMessage());}

        Session::put('shop_inputs', $inputs); // フォームの入力値をセッションに保存

        return redirect()->route('update');
    }


    public function confirm_admin(Request $request)
    {
        $inputs = $request->validate([
            'text_title' => 'required',
            'text' => 'required',
        ]);
        try {
            Form::create([
                'item_id' => $request->input('item_id'),
                'text_title'=>$inputs['text_title'],
                'text'=>$inputs['text'],
                'created_at' => now(),
        
        ]);
        }catch(\Exception $e){dd($e->getMessage());}

        Session::put('form_inputs', $inputs); // フォームの入力値をセッションに保存

        return redirect()->route('update');
        //return view('review.confirm', ['inputs' => $inputs]);
        
       // $inputs = $request->all();
       // return view('review.confirm', [
       // 'inputs' => $inputs,
       // ]);
    }

    public function send(Request $request) {
        //フォームから受け取ったactionの値を取得
            $action = $request->input('action');
        // フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');
        // actionの値で分岐
         if($action !== 'send'){
            // 戻るボタンで入力画面にデータを渡して戻る
             return redirect()
                     ->route('form')
                     ->withInput($inputs);
        } else {
            // データベースへ登録
            Form::create([
                'text_tit' => $inputs['title'],
                'text' => $inputs['text'],
                'created_at' => C
            ]);
            return view('review.form');
        }
    }

    public function like(Request $request)
{
    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $review_id = $request->review_id; //2.投稿idの取得
    $already_liked = Like::where('user_id', $user_id)->where('review_id', $review_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->review_id = $review_id; //Likeインスタンスにreview_id,user_idをセット
        $like->user_id = $user_id;
        $like->save();
    } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
        Like::where('review_id', $review_id)->where('user_id', $user_id)->delete();
    }
    //5.この投稿の最新の総いいね数を取得
    $review_likes_count = Review::withCount('likes')->findOrFail($review_id)->likes_count;
    $param = [
        'review_likes_count' => $review_likes_count,
    ];
    return response()->json($param); //6.JSONデータをjQueryに返す
}


    

    

    
    public function form2(Request $request) {
        
        // フォームからの入力値をDBに登録
        $contacts = Form::find($request->id);
        $contacts->update([
        'id' => $request->id,
        'text_title' => $request->text_title,
        'text' => $request->text
        ]);
        return view('review.form');

    } 
    

    

    public function review2() {
        \Session::flash('err_msg','投稿しました。');
        return redirect('review/review');
    } 

    

    

    //public function complete() {
        //return view('review.complete');
    //} 



     // 編集 get
     public function edit(Request $request) {
        $id = $request->id;
        $items = Contact::find($id);
        return view('review.edit',['items' => $items]);
    }

    public function comment() {
        $contacts = Shop::all();
        //dd($contacts);
        return view('shop.comment',compact('contacts'));
        
        
    } 


    //削除
    public function delete(Request $request){
        $id = $request->id;
        Shop::where('id', $id)->delete();
        return redirect()->route('update');
    }

    public function delete2(Request $request){
        $id = $request->id;
        Form::where('id', $id)->delete();
        return redirect()->route('update');
    }


}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HashTag;
use App\HashTagCrawl;
use Carbon\Carbon;

class StepsController extends Controller
{
    const HASHTAG_ID_1 = 1;
    const HASHTAG_ID_2 = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countHastag1()
    {
        $total_tweets_1 = HashTagCrawl::where('hashtag_id', self::HASHTAG_ID_1)->count();
        
        return [
          'laravel' => $total_tweets_1,
        ];
    }

    public function countHastag2()
    {
        $total_tweets_2 = HashTagCrawl::where('hashtag_id', self::HASHTAG_ID_2)->count();
        
        return [
          'vue' => $total_tweets_2,
        ];
    }

    public function latestTweet(Request $request){
        $hashtag_id = $request->get('hashtag_id');
      $latestTweet = HashTagCrawl::where('hashtag_id', $hashtag_id)->orderBy('created_at', 'desc')->first();
      if($latestTweet != null){
        $latestTweet->username = '@'.$latestTweet->username;
        return [
          'username' => $latestTweet->username,
          'tweet' => $latestTweet->tweet,
        ];
      }
      return [
        'username' => '',
        'tweet' => '',
      ];
    }

    public function names(){
      $names = HashTagCrawl::where('hashtag_id', self::HASHTAG_ID_1)->pluck('username')->toArray();
      return $names;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Console\Commands;

use App\HashTag;
use App\HashTagCrawl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use TwitterStreamingApi;

class ListenForTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:listen {tag}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store tweets to database';
    /**
     * @var HashTag
     */
    private $hashtags;

    /**
     * Create a new command instance.
     *
     * @param HashTag $hashtags
     */
    public function __construct()
    {
        parent::__construct();
        $this->hashtags = new HashTag();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Starting process:";

        $tag =  $this->hashtags
            ->where('id', $this->argument('tag'))
            ->first();

        //well no tag so let's abort
        if(!$tag) {
            $this->abort('This hashtag was not found!');
        }

        $this->startListeningTo($tag);

    }

    /**
     * @param $hashTag
     */
    public function startListeningTo($hashTag)
    {
        TwitterStreamingApi::publicStream()
            ->whenFrom([], function() {})
            ->whenTweets(null, function() {})
            ->whenHears("#".$hashTag->hashtag, function (array $tweet) use ($hashTag) {
                $this->onTweetHeard($tweet, $hashTag);
            })->startListening();
    }

    /**
     * $event
     * @param $tweet
     * @param $tag
     */
    private function onTweetHeard($tweet, $tag)
    {
        //update the db
        (new HashTagCrawl([
            'hashtag'       => $tag->hashtag,
            'hashtag_id'    => $tag->id,
            'username'      => $tweet['user']['screen_name'],
            'tweet'         => $tweet['text']
        ]))->save();

        DB::table('hashtag')->whereId($tag->id)->increment('total');

    }

    /**
     * @param $message
     * @throws \Exception
     */
    private function abort($message)
    {
        throw new \Exception($message);
    }
}

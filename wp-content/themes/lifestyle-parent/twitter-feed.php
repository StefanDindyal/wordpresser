<?php
require_once(get_template_directory() . '/TwitterAPIExchange.php');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "HIDDEN FOR STACK ASSIST",
    'oauth_access_token_secret' => "HIDDEN FOR STACK ASSIST",
    'consumer_key' => "HIDDEN FOR STACK ASSIST",
    'consumer_secret' => "HIDDEN FOR STACK ASSIST"
);
// Your specific requirements
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=#trekconspringfield&result_type=recent';



$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                   ->performRequest();

$response = json_decode($response, true); //tried with and without true - throws class error without it.

foreach($response as $tweet)
{
   $url = $tweet['entities']['urls'];
    $hashtag = $tweet['entities']['hashtags'];
    $text = $tweet['text'];

    echo "$url <br />";
    echo "$hashtag <br />";
    echo "$text <br />";
    echo "<br /><br />";

}
echo "<pre>". var_dump($response) ."</pre>";
?>
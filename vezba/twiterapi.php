<?php
require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey="r7XEqSVTxGNjQ1Lr06iWkvaVG";
$consumersecret="zRiZaXQVOKRBeNHgZhbl0yZntwhbkBKFTniIMQuxhVbKf8k6VP";

$access_token="81144425-Bi5SBR9aMWzdViMlKtT8IErk30Ts27jVSXdRilSqu";
$access_token_secret="zKChn7lY6Cz1MUz6gUjmeCDLqo0zyrRVVY4hSwGPsG6xV";
$connection = new TwitterOAuth($consumerkey, $consumersecret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

foreach($statuses as $tweet){


        $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);

  //  print_r($status);
        $twit=file_get_contents("https://twitter.com/TechCrunch/status/800013275035336704");
   // print_r($twit);


    }

?>

<div style="width:250px; height:250px;"><?php print_r($twit);?></div>


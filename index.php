<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laatst getwitterde Correspondentlinks</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<h3><i class="fa fa-twitter fa-2x"></i>Een lijst met de laatst getwitterde Correspondentlinks:</h3>
</body>	
<ul class="list-group">
<?php
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "271834358-iSGh3lG6slDVL0kmcMOm1AZloi4l4OMLh01AxXVC",
    'oauth_access_token_secret' => "rGPEkKlNkBnORWFjVU4he5CK7HfqFm8iC90AACASCzMVs",
    'consumer_key' => "Yy9ZaFhL1WHBbkseSqMyOEqkC",
    'consumer_secret' => "xCgtep2IKBYbqZcPxQdyj8jobLTd2vXJV8T07CBzsb6JHAzvpx"
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?f=realtime&q=decorrespondent.nl%2F&src=typd';
$twitter = new TwitterAPIExchange($settings);    
$api_response = $twitter ->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();


$response = json_decode($api_response);


foreach($response->statuses as $tweet)
{
  echo '<li class="list-group-item">';
  echo "<a href={$tweet->entities->urls[0]->expanded_url} target=blank>{$tweet->entities->urls[0]->expanded_url}</a>\n ";
echo '</li>';
}
?>
</ul>
<footer class="footer">
<div class="container">
	<p class="text-muted">Disclaimer: Dit is niet bedoeld voor commercieel gebruik maar als oefening om te programmeren.</p>
</div>

</html>
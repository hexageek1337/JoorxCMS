<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socialstats {
    /* Social Share
    * using file_get_contents and curl method
    */
    function get_tweets( $url )
    {
        $url = urlencode($url);
        $json_string = file_get_contents( 'http://opensharecount.com/count.json?url=' . $url );
        $json = json_decode($json_string, true);
        return intval( $json['count'] );
    }

    function get_fb_shares( $url )
    {
        $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
    	$json = json_decode($json_string, true);
        return intval( $json[$url]['share']['share_count']);
    }

    function get_plusones( $url )
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $curl_results = curl_exec ($curl);
        curl_close ($curl);
        $json = json_decode($curl_results, true);
        return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
    }

    function get_pins( $url )
    {
        $url = urlencode($url);
        $json_string = file_get_contents( 'http://api.pinterest.com/v1/urls/count.json?callback=pinterest&url=' . $url );
        $json_string = preg_replace('/^pinterest\((.*)\)$/', "\\1", $json_string);
        $json = json_decode($json_string, true);
        return intval( $json['count'] );
    }

    function get_in_shares( $url )
    {
        $url = urlencode($url);
        $json_string = file_get_contents( 'http://www.linkedin.com/countserv/count/share?format=json&url=' . $url );
        $json = json_decode($json_string, true);
        return intval( $json['count'] );
    }

    function get_stumble_views( $url )
    {
        $url = urlencode($url);
        $json_string = file_get_contents( 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $url );
        $json = json_decode($json_string, true);
        return intval( $json['result']['views'] );
    }

     function get_tumblr_shares($url)
    {
        $url = urlencode($url);
        $json_string = file_get_contents( 'https://api.tumblr.com/v2/share/stats?url=' . $url );
        $json = json_decode($json_string, true);
        return intval( $json['response']['note_count'] );
    }

}
/* End of file socialstats.php */

<?php

/**
 * CodeIgniter helper for generate share url and buttons (Twitter, Facebook, Buzz, VKontakte)
 *
 * @version 1.0
 * @author Ibragimov Renat <info@mrak7.com> www.mrak7.com
 */

if( !function_exists('share_check') ){
	/**
	 * Check type of share and return $URL or FALSE
	 * 
	 * @param	string $type	type of share
	 * @return	string|bool
	 */
	function share_check( $type='' ){
		$url = array(
			'twitter'	=> 'http://twitter.com/share',
			'facebook'	=> 'http://facebook.com/sharer.php',
			'buzz'		=> 'http://www.google.com/buzz/post',
			'vkontakte'	=> 'http://vkontakte.ru/share.php',
		);
		return (isset($url[$type])) ? $url[$type] : FALSE;
	}
}

if( !function_exists('share_url') ){
	/**
	 * Generate url for share at some social networks
	 *
	 * @param	string $type	type of share
	 * @param	array $args		parameters for share
	 * @return	string
	 */
	function share_url( $type='', $args=array() ){
		$url = share_check( $type );
		if( $url === FALSE ){
			log_message( 'debug', 'Please check your type share_url('.$type.')' );
			return "#ERROR-check_share_url_type";
		}

		$params = array();
		if( $type == 'twitter' ){
			foreach( explode(' ', 'url via text related count lang counturl') as $v ){
				if( isset($args[$v]) ) $params[$v] = $args[$v];
			}
		}elseif( $type == 'facebook' ){
			$params['u']		= $args['url'];
			$params['t']		= $args['text'];
		}elseif( $type == 'buzz'){
			$params['url']		= $args['url'];
			$params['imageurl']	= $args['image'];
			$params['message']	= $args['text'];
		}elseif( $type == 'vkontakte'){
			$params['url']		= $args['url'];
		}

		$param = '';
		foreach( $params as $k=>$v ) $param .= '&'.$k.'='.urlencode($v);
		return $url.'?'.trim($param, '&');
	}
}

if( !function_exists('share_button') ){
	/**
	 * Generate buttons for share at some social networks
	 *
	 * @param	string $type	type of share
	 * @param	array $args		parameters for share
	 * @return string
	 */
	function share_button( $type='', $args=array() ){
		$url = share_check( $type );
		if( $url === FALSE ){
			log_message( 'debug', 'Please check your type share_button('.$type.')' );
			return "#ERROR-check_share_button_type";
		}

		$params = array();
		$param	= '';

		if( $type == 'twitter'){
			if( isset($args['iframe']) ){
				$url = share_url( $type, $args );
				list($url, $param) = explode('?', $url);
				$button = <<<DOT
				<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:130px; height:50px;"
				src="http://platform.twitter.com/widgets/tweet_button.html?{$param}"></iframe>
DOT;
			}else{
				foreach( explode(' ', 'url via text related count lang counturl') as $v ){
					if( isset($args[$v]) ) $params[] = 'data-'.$v.'="'.$args[$v].'"';
				}
				$param = implode( ' ', $params );
				$button = <<<DOT
				<a href="http://twitter.com/share" class="twitter-share-button" {$param}>Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
DOT;
			}
		}elseif( $type == 'facebook' ){
			if( !isset($args['type']) ) $args['type'] = 'button_count';
			if( isset($args['fb']) ){
				$params = array( 'type'=>'type', 'href'=>'url', 'class'=>'class' );
				foreach( $params as $k=>$v ){
					if( isset($args[$v]) ) $param .= $k.'="'.$args[$v].'"';
				}
				$button = "<fb:share-button {$param}></fb:share-button>";
			}else{
				$params = array( 'type'=>'type', 'share_url'=>'url' );
				foreach( $params as $k=>$v ){
					if( isset($args[$v]) ) $param .= $k.'="'.$args[$v].'"';
				}
				if( !isset($args['button_text']) ) $args['button_text'] = 'Share to Facebook';
				$button = <<<DOT
				<a name="fb_share" {$param}>{$args['button_text']}</a>
				<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
DOT;
			}
		}elseif( $type == 'buzz' ){
			$params = array( 'button-style'=>'type', 'local'=>'lang', 'url'=>'url', 'imageurl'=>'image');
			foreach( $params as $k=>$v ){
				if( isset($args[$v]) ) $param .= ' data-'.$k.'="'.$args[$v].'"';
			}
			if( !isset($args['title']) ) $args['title'] = 'Share to Google Buzz';
			$button = <<<DOT
			<a title="{$args['title']}" class="google-buzz-button" href="http://www.google.com/buzz/post" {$param}></a>
			<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>
DOT;
		}elseif( $type == 'vkontakte' ){
			$url = isset($args['url']) ? '{url: "'.$args['url'].'"}' : 'false';
			foreach( explode(' ', 'type text') as $v ){
				if( isset($args[$v]) ) $param[] = $k.': "'.urlencode($args[$v]).'"';
			}
			$param = implode( ', ', $params );
			if( !empty($param) ) $param = ', {'.$param.'}';
			$button = <<<DOT
			<script type="text/javascript" src="http://vkontakte.ru/js/api/share.js?9" charset="windows-1251"></script>
			<script type="text/javascript">document.write(VK.Share.button({$url}{$param}));</script>
DOT;
		}
		return $button;
	}
}
?>
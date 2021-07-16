<?php

defined('JPATH_PLATFORM') or die;

use Joomla\Registry\Registry;

class JFormRuleMagicSiteUrl extends JFormRule
{
  public function test(SimpleXMLElement $element, $value, $group = null, Registry $input = null, JForm $form = null) {
    if(strlen($value)) {
      $message = $this->getMagicSiteUrl($value);
      if (strlen($message)) {
        $element->attributes()->message = $message;

        return false;
      }
    }

    return true;
  }

  private function getMagicSiteUrl($uri) {
    $uri = trim($uri);
    preg_match('/^(https?:\/\/)?/', $uri, $proto);
    if (!isset($proto[1])) {
      return 'Необходимо указать протокол https:// или http://';
    }

    $url = parse_url($uri);
    if (!isset($url['host'])) {
      return 'Введенное значение не похоже на адрес сайта';
    }

    if (isset($url['path']) && $url['path'] != '/') {
      return 'Поле должно содержать только адрес сайта';
    }

    if (checkdnsrr($url['host'], "A") && gethostbyname($url['host']) == gethostbyname('edusite.ru')) {
      $output = $url['scheme'] . '://';
      $output .= $url['host'];
      if (isset($url['port'])) {
        $output .= ':' . $url['port'];
      }
      if (isset($url['path'])) {
        $output .= $url['path'];
      }
      $res = $this->getMagicSitePage($output, 1);

      if ($res['response_code'] == 200) {
        return '';
      }
    }

    return 'Введенный адрес не является корректным URL сайта в ИС MagicSite';
  }

  private function getMagicSitePage( $uri, $header = FALSE ) {
    $response = [];
    $url = parse_url( $uri );
    $curlInit = curl_init( $uri );
    curl_setopt( $curlInit, CURLOPT_CONNECTTIMEOUT, 20 );
    if ( $header ) {
      curl_setopt( $curlInit, CURLOPT_HEADER, true );
      curl_setopt( $curlInit, CURLOPT_NOBODY, true );
    }
    if ( $url['scheme'] == 'https' ) {
      curl_setopt( $curlInit, CURLOPT_SSL_VERIFYHOST  , 2 );
    }
    curl_setopt( $curlInit, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $curlInit, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $curlInit, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $curlInit, CURLOPT_COOKIEJAR, '-' );
    curl_setopt( $curlInit, CURLOPT_REFERER, $_SERVER['SERVER_NAME'] );
    curl_setopt( $curlInit, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)" );
    $response['response']      = curl_exec( $curlInit );
    $response['effective_url'] = curl_getinfo( $curlInit, CURLINFO_EFFECTIVE_URL );
    $response['response_code'] = intval(curl_getinfo( $curlInit, CURLINFO_HTTP_CODE ) );
    curl_close( $curlInit );
    return $response;
  }
}

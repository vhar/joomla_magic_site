<?php

defined('_JEXEC') or exit();

class MagicSiteModelItem extends JModelItem
{
  protected $item;

  protected function populateState() {
    $input = JFactory::getApplication()->input;
    $id = $input->get('id', 1, 'INT');
    $this->setState('item.id', $id);
  }

  public function getItem() {
    $id = $this->getState('item.id');

    $db = JFactory::getDbo();
    $query = $db
      ->getQuery(TRUE)
      ->select('`id`, `title`, `category`, `alias`')
      ->from('#__magicsite')
      ->where('id = ' . (int)$id);
    $db->setQuery($query);

    $this->item = $db->loadObject();

    $params = JComponentHelper::getParams('com_magicsite');
    $uri = $params->get('magicsite_url');

    if (strlen($uri)) {
      $url = parse_url($uri);
      if (!isset($url['path'])) {
        $uri .= '/';
      }
    }

    if ($this->item) {
      if (strlen($uri)) {
        $this->item->url = $uri;
        $this->item->body = $this->getMagicSitePageContent($this->item->url, $this->item->category,  $this->item->alias);
      } else {
        $this->item->body = 'Компонент MagicSite не настроен';
      }
    }

    return $this->item;
  }

  private function getMagicSitePageContent($url, $category, $alias) {
    $uri = $url . $category . '/' . $alias . '.html';
    $content = '';
    $response = $this->getMagicSitePage($uri);
    if ($response['response_code'] == 200) {
      $dom = new DOMDocument();
      $dom->preserveWhiteSpace = false;
      libxml_use_internal_errors(true);
      $dom->loadHTML($response['response']);
      $xpath = new DOMXPath($dom);

      $ls_ads = $xpath->query('//a');
      foreach ($ls_ads as $ad) {
        if ($ad->hasAttribute('href')) {
          $ad_url = $ad->getAttribute('href');
          $f = parse_url($ad_url);
          if (!isset($f['scheme']) && !isset($f['host']) && isset($f['path'])) {
            $ad->setAttribute('href', $url . $f['path']);
          }
        }
      }

      $images = $dom->getElementsByTagName('img');
      foreach ($images as $image) {
        $src = $image->getAttribute('src');
        $f = parse_url($src);
        if (!isset($f['scheme']) && !isset($f['host']) && isset($f['path'])) {
          $image->setAttribute('src', $url . $f['path']);
        }
      }

      $categorys = $xpath->query("//*[contains(@class, 'inner-page-block')]");
      foreach ($categorys as $category) {
        $content .= $dom->saveHTML($category);
      }

      $links = $xpath->query("//link[contains(@id, 'magic-skin')]");
      $categorys = $xpath->query("//*[contains(@class, '" . $alias . "-page-script')]");
      $magic_script ='';
      foreach ($categorys as $category) {
        $magic_script .= $dom->saveHTML($category);
      }
      libxml_clear_errors();
      $content = str_replace("\n", "", $content) . $magic_script;
    } else {
      $content = '<div>' . JText::_('COM_MAGICSITE_ITEM_GET_CONTENT_ERROR') . ' ' . ($response['response_code'] ?? '0') . '</div>';
    }
    return $content;
  }

  private function getMagicSitePage($uri, $header = FALSE) {
    $response = [];
    $url = parse_url($uri);
    $curlInit = curl_init($uri);
    curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 20);
    if ($header) {
      curl_setopt($curlInit, CURLOPT_HEADER, true);
      curl_setopt($curlInit, CURLOPT_NOBODY, true);
    }
    if ($url['scheme'] == 'https') {
      curl_setopt($curlInit, CURLOPT_SSL_VERIFYHOST	, 2);
    }
    curl_setopt($curlInit, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlInit, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curlInit, CURLOPT_COOKIEJAR, '-');
    curl_setopt($curlInit, CURLOPT_REFERER, $_SERVER['SERVER_NAME']);
    curl_setopt($curlInit, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");
    $response['response'] = curl_exec($curlInit);
    $response['effective_url'] = curl_getinfo($curlInit, CURLINFO_EFFECTIVE_URL);
    $response['response_code'] = intval(curl_getinfo($curlInit, CURLINFO_HTTP_CODE));
    curl_close($curlInit);
    return $response;
  }
}
//distance_education

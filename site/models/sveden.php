<?php

defined('_JEXEC') or exit();

class MagicSiteModelSveden extends JModelList
{
  protected function getListQuery() {
    $db = JFactory::getDbo();
    $query = $db
      ->getQuery(TRUE)
      ->select('`id`, `title`, `category`, `alias`')
      ->from('#__magicsite')
      ->where('`published` = 1')
      ->where('`category` = "sveden"')
      ->where('`alias` != "gia"')
      ->where('`alias` != "meals"')
      ->where('`alias` != "labor_protection"')
      ->where('`alias` != "accounting_policy"')
      ->order('weight ASC');

    return $query;
  }
}

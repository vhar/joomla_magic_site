<?php

defined('_JEXEC') or exit();

class MagicSiteModelInfosec extends JModelList
{
  protected function getListQuery() {
    $db = JFactory::getDbo();
    $query = $db
      ->getQuery(TRUE)
      ->select('`id`, `title`, `category`, `alias`')
      ->from('#__magicsite')
      ->where('`published` = 1')
      ->where('`category` = "infosec"')
      ->order('weight ASC');

    return $query;
  }
}

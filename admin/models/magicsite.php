<?php

defined('_JEXEC') or exit();

class MagicSiteModelMagicSite extends JModelList
{
  protected function getListQuery() {
    $db = JFactory::getDbo();
    $query = $db->getQuery(TRUE);
    $query->select('`id`, `title`, `category`, `alias`, `published`, `weight`');
    $query->from('#__magicsite');

    return $query;
  }
}

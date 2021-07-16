<?php

defined('_JEXEC') or exit();

class MagicSiteModelFood extends JModelList
{
  protected function getListQuery() {
    $db = JFactory::getDbo();
    $query = $db
      ->getQuery(TRUE)
      ->select('`id`, `title`, `category`, `alias`')
      ->from('#__magicsite')
      ->where('`published` = 1')
      ->andWhere(['`category` = "food"', '`alias` = "meals"'])
      ->order('weight ASC');

    return $query;
  }
}

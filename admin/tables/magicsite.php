<?php

defined('_JEXEC') or exit();

class TableMagicSite extends JTable
{
  public function __construct(&$db) {
    parent::__construct('#__magicsite', 'id', $db);
  }
}

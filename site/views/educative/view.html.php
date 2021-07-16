<?php

defined('_JEXEC') or exit();

class MagicSiteViewEducative extends JViewLegacy
{
  protected $items;

  function display($tpl = null) {
    $this->items = $this->get('Items');

    parent::display($tpl);
  }
}

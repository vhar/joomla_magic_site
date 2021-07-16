<?php

defined('_JEXEC') or exit();

class MagicSiteViewSveden extends JViewLegacy
{
  protected $items;

  function display($tpl = null) {
    $this->items = $this->get('Items');

    parent::display($tpl);
  }
}

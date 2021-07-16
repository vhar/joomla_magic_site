<?php

defined('_JEXEC') or exit();

class MagicSiteViewItem extends JViewLegacy
{
  protected $item;

  function display($tpl = null) {
    $this->item = $this->get('Item');

    parent::display($tpl);
  }
}

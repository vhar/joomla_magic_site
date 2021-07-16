<?php

defined('_JEXEC') or exit();

class MagicSiteControllerMagicSite extends JControllerAdmin
{
  public function getModel($name = 'Item', $prefix = 'MagicSiteModel', $config = []) {
    return parent::getModel($name, $prefix, $config);
  }
}

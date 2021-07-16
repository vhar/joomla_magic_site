<?php

defined('_JEXEC') or exit();

class MagicSiteModelItem extends JModelAdmin
{
  public function getForm($data = [], $loadData = true) {
    $form = $this->loadForm(
      'com_magicsite.item',
      'item',
      [
        'control' => 'jform',
        'load_data' => $loadData,
      ]
    );
    if( empty($form) ) {
      return FALSE;
    }
    return $form;
  }

  public function getTable($type = 'MagicSite', $prefix = 'Table', $config = []) {
    return JTable::getInstance($type, $prefix, $config);
  }

  protected function loadFormData() {
    $data = $this->getItem();
    return $data;
  }

  public function getItem($pk = null) {
    if ($item = parent::getItem($pk)) {
      return $item;
    }
    return FALSE;
  }
}

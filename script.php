<?php

defined('_JEXEC') or die('Restricted access');

class com_magicSiteInstallerScript
{
  public function postflight($type, $parent) {
    echo '<p>Anything here happens after the installation/update/uninstallation of the module.</p>';
  }

  public function install($parent) {
    $data = [
      'title' => 'TitleTitle',
      'category' => 'sveden',
      'alias' => 'alias',
      'weight' => 800,
    ];

    $db = JFactory::getDbo();
    $query = $db
      ->getQuery(TRUE)
      ->select('extension_id')
      ->from('#__extensions')
      ->where('name = "COM_MAGICSITE"');
    $db->setQuery($query);
    $component_id = $db->loadResult();

    $menuType = [
      'type' => 'magicsite',
      'title' => 'Сведения об образовательной организации',
    ];

    $this->createMenutype($menuType);

    $query = $db
      ->getQuery(TRUE)
      ->select('position')
      ->from('#__modules')
      ->where('module=' . $db->quote('mod_menu'))
      ->where('params LIKE ' . $db->quote('%"menutype":"mainmenu"%'));
    $db->setQuery($query);
    $position = $db->loadResult();

    $data = [
      'id' => '0',
      'title' => 'Сведения',
      'note' => '',
      'module' => 'mod_menu',
      'showtitle' => 0,
      'published' => 1,
      'publish_up' => '',
      'publish_down' => '',
      'client_id' => 0,
      'position' => $position,
      'access' => 1,
      'ordering' => 2,
      'language' => '*',
      'assignment' => 0,
      'assigned' => [],
      'rules' => [
        'core.delete' => [],
        'core.edit' => [],
        'core.edit.state' => [],
        'module.edit.frontend' => [],
      ],
      'params' => [
        'menutype' => 'magicsite',
        'base' => '',
        'startLevel' => 1,
        'endLevel' => 0,
        'showAllChildren' => 0,
        'tag_id' => '',
        'class_sfx' => '',
        'window_open' => '',
        'layout' => '_:default',
        'moduleclass_sfx' => '',
        'cache' => 1,
        'cache_time' => 900,
        'cachemode' => 'itemid',
        'module_tag' => 'div',
        'bootstrap_size' => 0,
        'header_tag' => 'h3',
        'header_class' => '',
        'style' => 0,
      ],
      'tags' => '',
    ];

    $newId = $this->createModule($data);

    $query = $db
      ->getQuery(TRUE)
      ->insert('#__modules_menu')
      ->columns(array('moduleid', 'menuid'))
      ->values($newId . ', 0');
    $db->setQuery($query);
    $db->execute();

    $data = [
      'menutype' => 'magicsite',
      'type' => 'component',
      'parent_id' => 1,
      'published' => 1,
      'language' => '*',
      'client_id' => 0,
      'level' => 1,
      'component_id' => $component_id,
      'params' => [
        'menu-anchor_title' => '',
        'menu-anchor_css' => '',
        'menu_image' => '',
        'menu_image_css' => '',
        'menu_text' => 1,
        'menu_show' => 1,
        'page_title' => '',
        'show_page_heading' => '',
        'page_heading' => '',
        'pageclass_sfx' => '',
        'menu-meta_description' => '',
        'menu-meta_keywords' => '',
        'robots' => '',
        'secure' => 0
      ],
      'title' => 'Сведения об образовательной организации',
      'alias' => 'sveden',
      'path' => 'sveden',
      'link' => 'index.php?option=com_magicsite&view=sveden',
    ];
    $this->createMenuitem($data);

    $data['title'] = 'Информационная безопасность';
    $data['link'] = 'index.php?option=com_magicsite&view=infosec';
    $data['alias'] = 'infosec';
    $data['path'] = 'infosec';
    $this->createMenuitem($data);

    $data['title'] = 'Противодействие коррупции';
    $data['link'] = 'index.php?option=com_magicsite&view=anticorruption';
    $data['alias'] = 'anticorruption';
    $data['path'] = 'anticorruption';
    $this->createMenuitem($data);

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('qualityassessment'))
      ->where('alias = ' . $db->quote('qualityassessment'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObject();

    $data['title'] = 'Независимая оценка качества';
    $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$results->id;
    $data['alias'] = 'qualityassessment';
    $data['path'] = 'qualityassessment';
    $this->createMenuitem($data);

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('shedule'))
      ->where('alias = ' . $db->quote('distance_education'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObject();

    $data['title'] = 'Дистанционное обучение';
    $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$results->id;
    $data['alias'] = 'distance_education';
    $data['path'] = 'shedule/distance_education';
    $this->createMenuitem($data);

    $data['title'] = 'Воспитательная работа';
    $data['link'] = 'index.php?option=com_magicsite&view=educative';
    $data['alias'] = 'educative';
    $data['path'] = 'educative';
    $this->createMenuitem($data);

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('alias = ' . $db->quote('gia'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObject();

    $data['title'] = 'Государственная итоговая аттестация';
    $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$results->id;
    $data['alias'] = 'gia';
    $data['path'] = 'sveden/gia';
    $this->createMenuitem($data);

    $data['title'] = 'Организация питания';
    $data['link'] = 'index.php?option=com_magicsite&view=food';
    $data['alias'] = 'food';
    $data['path'] = 'food';
    $this->createMenuitem($data);

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('alias = ' . $db->quote('labor_protection'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObject();

    $data['title'] = 'Охрана труда';
    $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$results->id;
    $data['alias'] = 'labor_protection';
    $data['path'] = 'sveden/labor_protection';
    $this->createMenuitem($data);

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('alias = ' . $db->quote('accounting_policy'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObject();

    $data['title'] = 'Основные положения учетной политики';
    $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$results->id;
    $data['alias'] = 'accounting_policy';
    $data['path'] = 'sveden/accounting_policy';
    $this->createMenuitem($data);

    $data['level'] = 2;

    $query = $db
      ->getQuery(TRUE)
      ->select('id')
      ->from('#__menu')
      ->where('alias = "sveden"');
    $db->setQuery($query);

    $data['parent_id'] = $db->loadResult();

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('sveden'))
      ->where('alias != ' . $db->quote('gia'))
      ->where('alias != ' . $db->quote('meals'))
      ->where('alias != ' . $db->quote('labor_protection'))
      ->where('alias != ' . $db->quote('accounting_policy'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObjectList();

    foreach($results as $row) {
      $data['title'] = $row->title;
      $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$row->id;
      $data['alias'] = $row->alias;
      $data['path'] = $row->alias;

      $this->createMenuitem($data);
    }

    $query = $db
      ->getQuery(TRUE)
      ->select('id')
      ->from('#__menu')
      ->where('alias = ' . $db->quote('infosec'));
    $db->setQuery($query);

    $data['parent_id'] = $db->loadResult();

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('infosec'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObjectList();

    foreach($results as $row) {
      $data['title'] = $row->title;
      $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$row->id;
      $data['alias'] = $row->alias;
      $data['path'] = $row->alias;

      $this->createMenuitem($data);
    }

    $query = $db
      ->getQuery(TRUE)
      ->select('id')
      ->from('#__menu')
      ->where('alias = ' . $db->quote('anticorruption'));
    $db->setQuery($query);

    $data['parent_id'] = $db->loadResult();

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('anticorruption'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObjectList();

    foreach($results as $row) {
      $data['title'] = $row->title;
      $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$row->id;
      $data['alias'] = $row->alias;
      $data['path'] = $row->alias;

      $this->createMenuitem($data);
    }

    $query = $db
      ->getQuery(TRUE)
      ->select('id')
      ->from('#__menu')
      ->where('alias = ' . $db->quote('educative'));
    $db->setQuery($query);

    $data['parent_id'] = $db->loadResult();

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->where('category = ' . $db->quote('educative'))
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObjectList();

    foreach($results as $row) {
      $data['title'] = $row->title;
      $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$row->id;
      $data['alias'] = $row->alias;
      $data['path'] = $row->alias;

      $this->createMenuitem($data);
    }

    $query = $db
      ->getQuery(TRUE)
      ->select('id')
      ->from('#__menu')
      ->where('alias = ' . $db->quote('food'));
    $db->setQuery($query);

    $data['parent_id'] = $db->loadResult();

    $query = $db
      ->getQuery(TRUE)
      ->select('id, title, alias')
      ->from('#__magicsite')
      ->where('published = 1')
      ->andWhere(['`category` = "food"', '`alias` = "meals"'])
      ->order('weight ASC');
    $db->setQuery($query);

    $results = $db->loadObjectList();

    foreach($results as $row) {
      $data['title'] = $row->title;
      $data['link'] = 'index.php?option=com_magicsite&view=item&id='.$row->id;
      $data['alias'] = $row->alias;
      $data['path'] = $row->alias;

      $this->createMenuitem($data);
    }

    $msg = JText::_('COM_MAGICSITE_INSTALL_TEXT');
    $app = JFactory::getApplication();
    $app->enqueueMessage($msg, 'warning');

    $parent->getParent()->setRedirectURL('index.php?option=com_config&view=component&component=com_magicsite');
  }

  public function uninstall($parent) {
    $db = JFactory::getDbo();

    $query = $db->getQuery(true)
      ->select('asset_id')
      ->from('#__menu_types')
      ->where('menutype = ' . $db->quote('magicsite'));
    $db->setQuery($query);
    $asset_id = $db->loadResult();

    $query = $db->getQuery(true)
      ->delete('#__assets')
      ->where('id = ' . (int) $asset_id);
    $db->setQuery($query);
    $db->execute();

    $query = $db->getQuery(true)
      ->select('id, asset_id')
      ->from('#__modules')
      ->where('module=' . $db->quote('mod_menu'))
      ->where('params LIKE ' . $db->quote('%"menutype":"magicsite"%'));
    $db->setQuery($query);
    $asset = $db->loadObject();

    $query = $db->getQuery(true)
      ->delete('#__assets')
      ->where('id = ' . (int) $asset->asset_id);
    $db->setQuery($query);
    $db->execute();

    $query = $db->getQuery(true)
      ->delete('#__modules')
      ->where('id = ' . (int) $asset->id);
    $db->setQuery($query);
    $db->execute();

    $query = $db->getQuery(true)
      ->delete('#__modules_menu')
      ->where('moduleid = ' . (int) $asset->id);
    $db->setQuery($query);
    $db->execute();

    $query = $db->getQuery(true)
      ->delete('#__menu_types')
      ->where('menutype = ' . $db->quote('magicsite'));
    $db->setQuery($query);
    $db->execute();

    $query = $db->getQuery(true)
      ->delete('#__menu')
      ->where('menutype = ' . $db->quote('magicsite'));
    $db->setQuery($query);
    $db->execute();

    $msg = '<p>' . JText::_('COM_MAGICSITE_UNINSTALL_TEXT') . '</p>';
    $app = JFactory::getApplication();
    $app->enqueueMessage($msg, 'message');
  }

  public function update($parent) {
    $msg = '<p>' . JText::sprintf('COM_MAGICSITE_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
    $app = JFactory::getApplication();
    $app->enqueueMessage($msg, 'message');
  }

  private function createMenutype($data) {
    $menuType = JTable::getInstance('MenuType');

    if (!$menuType->load(array('menutype' => $data['type']))) {
      $menuType->menutype  = $data['type'];
      $menuType->title  = $data['title'];
      $menuType->description = $data['description'] ?? '';
      $menuType->check();
      if (!$menuType->store()) {
        return false;
      }
    }
    return $menuType->get('id');
  }

  private function createMenuitem($data) {
    $newMenuItem = JTable::getInstance('Menu');
    $newMenuItem->setLocation($data['parent_id'], 'last-child');
    $data['params'] = $data['params'] ?? [];
    $newMenuItem->params = json_encode($data['params']);
    if (!$newMenuItem->save($data)) {
      return false;
    }
    return $newMenuItem->get('id');
  }

  private function createModule($data) {
    $newModule = JTable::getInstance('Module', 'JTable', []);
    $data['params'] = $data['params'] ?? [];
    $newModule->params = json_encode($data['params']);
    if (!$newModule->bind($data)) {
      return false;
    }
    if (!$newModule->check()) {
      return false;
    }
    if (!$newModule->store()) {
      return false;
    }
    return $newModule->get('id');
  }
}

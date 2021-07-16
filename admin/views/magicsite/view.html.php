<?php

defined('_JEXEC') or exit();

class MagicSiteViewMagicSite extends JViewLegacy
{
  protected $items;
  protected $pagination;

  public function display($tpl = null) {
    $this->items = $this->get('Items');
    $this->pagination = $this->get('Pagination');

    if ($this->getLayout() !== 'modal') {
      $this->addToolbar();
    }

    parent::display($tpl);
    $this->setDocument();
  }

  protected function addToolBar() {
    JToolBArHelper::title(JText::_('COM_MAGICSITE_MANAGER_TITLE'));
    JToolBArHelper::addNew('item.add');
    JToolBArHelper::editList('item.edit');
    JToolBArHelper::deleteList('', 'magicsite.delete');
  }

  protected function setDocument() {
    $document = JFactory::getDocument();
    $document->setTitle(JText::_('COM_MAGICSITE_ADMINISTRATION'));
  }
}

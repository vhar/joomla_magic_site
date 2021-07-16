<?php

defined('_JEXEC') or exit();

class MagicSiteViewItem extends JViewLegacy
{
  protected $form;
  protected $item;

  public function display($tpl = null) {
    $this->form = $this->get('Form');
    $this->item = $this->get('Item');
    $this->addToolBar();
    parent::display($tpl);
    $this->setDocument();
  }

  protected function addToolBar() {
    JToolBArHelper::title(JText::_('COM_MAGICSITE_MANAGER_ITEM_NEW'));
    JToolBArHelper::save('item.save');
    JToolBArHelper::cancel('item.cancel');
  }

  protected function setDocument() {
    $document = JFactory::getDocument();
    $document->setTitle(JText::_('COM_MAGICSITE_ADMINISTRATION'));
  }
}

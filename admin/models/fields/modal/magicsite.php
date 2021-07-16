<?php

defined('_JEXEC') or die;

class JFormFieldModal_MagicSite extends JFormField
{
  protected $type = 'Modal_MagicSite';

  protected function getInput() {
    $allowClear     = ((string) $this->element['clear'] != 'false');
    $allowSelect    = ((string) $this->element['select'] != 'false');

    $value = (int) $this->value > 0 ? (int) $this->value : '';

    $modalId = 'MagicSite_' . $this->id;

    JHtml::_('jquery.framework');
    JHtml::_('script', 'system/modal-fields.js', array('version' => 'auto', 'relative' => true));
    if ($allowSelect)
    {
      static $scriptSelect = null;
      if (is_null($scriptSelect)) {
        $scriptSelect = array();
      }
      if (!isset($scriptSelect[$this->id])) {
        JFactory::getDocument()->addScriptDeclaration("
        function jSelectMagicSite_" . $this->id . "(id, title, category, alias, link) {
          jQuery('#jform_title', parent.document).val(title);
          jQuery('#jform_alias', parent.document).val(alias);
          window.processModalSelect('MagicSite', '" . $this->id . "', id, title, category, alias, link);
        }
        ");

        JText::script('JGLOBAL_ASSOCIATIONS_PROPAGATE_FAILED');

        $scriptSelect[$this->id] = true;
      }
    }

    $modalTitle    = JText::_('COM_MAGICSITE_CHANGE_ITEM');
    $urlSelect = $linkMagicSite . 'index.php?option=com_magicsite&amp;view=magicsite&amp;layout=modal&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1&amp;function=jSelectMagicSite_' . $this->id;

    if ($value) {
      $db    = JFactory::getDbo();
      $query = $db->getQuery(true)
        ->select($db->quoteName('title'))
        ->from($db->quoteName('#__magicsite'))
        ->where($db->quoteName('id') . ' = ' . (int) $value);
      $db->setQuery($query);

      try
      {
        $title = $db->loadResult();
      }
      catch (RuntimeException $e)
      {
        JError::raiseWarning(500, $e->getMessage());
      }
    }

    $title = empty($title) ? JText::_('COM_MAGICSITE_SELECT_AN_ITEM') : htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

    $html  = '<span class="input-append">';
    $html .= '<input class="input-medium" id="' . $this->id . '_name" type="text" value="' . $title . '" disabled="disabled" size="35" />';

    if ($allowSelect)
    {
      $html .= '<button'
        . ' type="button"'
        . ' class="btn hasTooltip' . ($value ? ' hidden' : '') . '"'
        . ' id="' . $this->id . '_select"'
        . ' data-toggle="modal"'
        . ' data-target="#ModalSelect' . $modalId . '"'
        . ' title="' . JHtml::tooltipText('COM_MAGICSITE_CHANGE_ITEM') . '">'
        . '<span class="icon-file" aria-hidden="true"></span> ' . JText::_('JSELECT')
        . '</button>';
    }

    if ($allowClear)
    {
      $html .= '<button'
        . ' type="button"'
        . ' class="btn' . ($value ? '' : ' hidden') . '"'
        . ' id="' . $this->id . '_clear"'
        . ' onclick="window.processModalParent(\'' . $this->id . '\'); return false;">'
        . '<span class="icon-remove" aria-hidden="true"></span>' . JText::_('JCLEAR')
        . '</button>';
    }

    $html .= '</span>';

    if ($allowSelect)
    {
      $html .= JHtml::_(
        'bootstrap.renderModal',
        'ModalSelect' . $modalId,
        array(
          'title'       => $modalTitle,
          'url'         => $urlSelect,
          'height'      => '400px',
          'width'       => '800px',
          'bodyHeight'  => '70',
          'modalWidth'  => '80',
          'footer'      => '<button type="button" class="btn" data-dismiss="modal">' . JText::_('JLIB_HTML_BEHAVIOR_CLOSE') . '</button>',
        )
      );
    }

    $class = $this->required ? ' class="required modal-value"' : '';

    $html .= '<input type="hidden" id="' . $this->id . '_id" ' . $class . ' data-required="' . (int) $this->required . '" name="' . $this->name
      . '" data-text="' . htmlspecialchars(JText::_('COM_MAGICSITE_SELECT_AN_ITEM'), ENT_COMPAT, 'UTF-8') . '" value="' . $value . '" />';

    return $html;
  }

  protected function getLabel()
  {
    return str_replace($this->id, $this->id . '_id', parent::getLabel());
  }
}

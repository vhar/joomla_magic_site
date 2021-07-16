<?php
defined('_JEXEC') or exit();

JHtml::_('behavior.core');
JHtml::_('behavior.polyfill', array('event'), 'lt IE 9');
JHtml::_('script', 'com_magicsite/admin-magicsite-modal.js', array('version' => 'auto', 'relative' => true));
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();

if ($app->isClient('site'))
{
	JSession::checkToken('get') or die(JText::_('JINVALID_TOKEN'));
}

$function  = $app->input->getCmd('function', 'jSelectItem');
$onclick   = $this->escape($function);

?>
<div class="container-popup">
  <form action="<?php echo 'index.php?option=com_magicsite&view=magicsite&layout=modal&tmpl=component&function=' . $function . '&' . JSession::getFormToken() . '=1';?>" method="post" name="adminForm" id="adminForm" class="form-inline">
    <div class="clearfix"></div>
    <?php if (empty($this->items)) : ?>
      <div class="alert alert-no-items">
        <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
      </div>
    <?php else : ?>
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th width="1%" class="nowrap center"><?php echo JText::_('COM_MAGICSITE_ITEM_STATE')?></th>
            <th style="min-width:100px" class="nowrap"><?php echo JText::_('COM_MAGICSITE_ITEM_TITLE')?></th>
            <th width="1%" class="nowrap"><?php echo JText::_('COM_MAGICSITE_ITEM_ID')?></th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <td colspan="3"></td>
          </tr>
        </tfoot>

        <tbody>
        <?php
        $iconStates = [
          -2 => 'icon-trash',
          0  => 'icon-unpublish',
          1  => 'icon-publish',
          2  => 'icon-archive',
        ];
        ?>
        <?php foreach ($this->items as $i => $item) : ?>
          <tr class="row<?php echo $i % 2; ?>">
            <td class="center">
              <span class="<?php echo $iconStates[$this->escape($item->published)]; ?>" aria-hidden="true"></span>
            </td>
            <td>
              <?php $attribs = 'data-function="' . $this->escape($onclick) . '"'
                . ' data-id="' . $item->id . '"'
                . ' data-title="' . $this->escape($item->title) . '"'
                . ' data-category="' . $this->escape($item->category) . '"'
                . ' data-alias="' . $this->escape($item->alias) . '"'
                . ' data-uri="' . 'index.php?option=com_magicsite&task=item.edit&id=' . $item->id . '"';
              ?>
              <a class="select-link" href="javascript:void(0)" <?php echo $attribs; ?>>
                <?php echo $this->escape($item->title); ?>
              </a>
              <span class="small break-word">
                <?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $item->category . '/' . $item->alias);?>
              </span>
            </td>
            <td class="nowrap small">
              <?php echo (int) $item->id; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <?php echo JHtml::_('form.token'); ?>

  </form>
</div>

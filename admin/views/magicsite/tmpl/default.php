<?php

defined('_JEXEC') or exit();
?>
<form action="index.php?option=com_magicsite&view=magicsite" method="POST" id="adminForm" name="adminForm">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th width="1%" class="center"><?php echo JHtml::_('grid.checkall')?></th>
        <th width="10%" class="nowrap"><?php echo JText::_('COM_MAGICSITE_ITEM_PATH')?></th>
        <th width="1%" class="nowrap center"><?php echo JText::_('COM_MAGICSITE_ITEM_STATE')?></th>
        <th style="min-width:100px" class="nowrap"><?php echo JText::_('COM_MAGICSITE_ITEM_TITLE')?></th>
        <th width="1%" class="nowrap"><?php echo JText::_('COM_MAGICSITE_ITEM_ID')?></th>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <td colspan="5"></td>
      </tr>
    </tfoot>

    <tbody>
      <?php if (!empty($this->items)) :?>
        <?php foreach($this->items as $i => $row) :?>
          <?php $link = 'index.php?option=com_magicsite&task=item.edit&id='.$row->id;?>
          <tr>
            <td><?php echo JHtml::_('grid.id', $i, $row->id );?></td>
            <td><?php echo $row->category . '/' . $row->alias;?> </td>
            <td align="center"><?php echo JHtml::_('jgrid.published', $row->published, $i, 'magicsite.', true);?></td>
            <td><a href="<?php echo $link;?>"><?php echo $row->title;?></a></td>
            <td><?php echo $row->id;?> </td>
          </tr>
        <?php endforeach;?>
      <?php endif;?>
    </tbody>

  </table>
  <?php echo $this->pagination->getListFooter(); ?>
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <?php echo JHtml::_('form.token');?>
</form>

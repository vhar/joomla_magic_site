<?php

defined('_JEXEC') or exit();
?>

<?php if (!empty($this->items) && is_array($this->items)) :?>
  <?php foreach($this->items as $item) :?>
    <div>
      <h2>
        <a href="<?php echo JRoute::_('index.php?option=com_magicsite&view=item&id='.$item->id);?>"><?php echo $item->title;?></a>
      </h2>
    </div>
  <?php endforeach;?>
<?php endif;?>

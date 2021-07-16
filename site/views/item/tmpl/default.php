<?php
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or exit();

$doc = Factory::getDocument();

HTMLHelper::_('behavior.framework');
HTMLHelper::_('jquery.framework');
unset($doc->_scripts[$doc->baseurl . '/media/jui/js/jquery.min.js']);
unset($doc->_scripts[$doc->baseurl . '/media/jui/js/jquery-noconflict.js']);
unset($doc->_scripts[$doc->baseurl . '/media/jui/js/jquery-migrate.min.js']);

HTMLHelper::_('script', 'https://code.jquery.com/jquery-3.6.0.js', array('version' => 'auto'));
HTMLHelper::_('bootstrap.framework');
HTMLHelper::_('bootstrap.tooltip');

JHtml::_('script', 'https://js.edusite.ru/jquery.fancybox.min.js', array('version' => 'auto'));
JHtml::_('script', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('version' => 'auto'));

JHtml::_('stylesheet', 'https://js.edusite.ru/mmagicutf.css', array('version' => 'auto'));
JHtml::_('stylesheet', 'https://js.edusite.ru/jquery.fancybox.min.css', array('version' => 'auto'));

?>
<?php if (!empty($this->item)) :?>
  <script type="text/javascript">var magicsite_url = '<?php echo $this->item->url;?>';</script>

  <?php JHtml::_('script', 'media/com_magicsite/js/magicsite.js', array('version' => 'auto'));?>

  <div class="item-page" itemscope="" itemtype="https://schema.org/Article">
    <div class="page-header">
      <h2 itemprop="headline"><?php echo $this->item->title;?></h2>
    </div>
    <div itemprop="articleBody">
      <?php echo $this->item->body;?>
    </div>
  <div>
<?php endif;?>

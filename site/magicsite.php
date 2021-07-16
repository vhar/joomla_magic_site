<?php

defined('_JEXEC') or exit();

$controller = JControllerLegacy::getInstance('MagicSite');
$input = JFactory::getApplication()->input;

$controller->execute($input->get('task', 'display'));

$controller->redirect();

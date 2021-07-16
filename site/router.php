<?php

defined('_JEXEC') or die;

class MagicSiteRouter implements JComponentRouterInterface
{
  public function build(&$query) {
    $segments = array();
    if (isset($query['id'])) {
      $db = JFactory::getDbo();
      $qry = $db->getQuery(true);
      $qry->select('alias');
      $qry->from('#__magicsite');
      $qry->where('id = ' . $db->quote($query['id']));
      $db->setQuery($qry);
      $alias = $db->loadResult();
      $segments[] = $alias;
      unset($query['id']);
    }
    unset($query['view']);
    return $segments;
  }

  public function parse(&$segments) {
    $vars = array();
    $db = JFactory::getDbo();
    $qry = $db->getQuery(true);
    $qry->select('id');
    $qry->from('#__magicsite');
    $qry->where('alias = ' . $db->quote($segments[0]));
    $db->setQuery($qry);
    $id = $db->loadResult();

    if(!empty($id)) {
      $vars['id'] = $id;
      $vars['view'] = 'item';
    }
    return $vars;
  }

  public function preprocess($query) {
    return $query;
  }
}

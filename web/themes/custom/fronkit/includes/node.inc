<?php
/**
 * @file
 * Theme and preprocess functions for nodes.
 */


/**
 * Implements hook_preprocess_node().
 */
function fronkit_preprocess_node__team_member__manager(&$vars)
{
  $view = $vars['view'];
  $node = $vars['node'];
  foreach ($view->result as $key => $row) {
    if ($row->nid == $node->id()) {
      $vars['row_index'] = $row->index;
    }
  }
}

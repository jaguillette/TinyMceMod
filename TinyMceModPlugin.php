<?php
class TinyMceModPlugin extends Omeka_Plugin_AbstractPlugin
{
  protected $_hooks = array(
    'admin_head'
  );

  public function hookAdminHead($args)
  {
    queue_js_file('tinyMCEmod');
  }
}
?>

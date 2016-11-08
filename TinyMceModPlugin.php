<?php

class TinyMceModPlugin extends Omeka_Plugin_AbstractPlugin
{
  protected $_hooks = array(
    'admin_head'
  );

  /**
   * Removes a previously appended script file.
   * from http://stackoverflow.com/questions/18020622/how-to-remove-a-previously-added-script-file-in-a-zend-framework-controller
   *
   * @param string $src The source path of the script file.
   * @return boolean Returns TRUE, if the removal has been a success.
   */
  public function removeScript($src) {
      $headScriptContainer = Zend_View_Helper_Placeholder_Registry::getRegistry()
              ->getContainer("Zend_View_Helper_HeadScript");
      $iter = $headScriptContainer->getIterator();
      $success = FALSE;
      foreach ($iter as $k => $value) {
          if(strpos($value->attributes["src"], $src) !== FALSE) {
              $iter->offsetUnset($k);
              $success = TRUE;
          }
      }
      Zend_View_Helper_Placeholder_Registry::getRegistry()
              ->setContainer("Zend_View_Helper_HeadScript",$headScriptContainer);
      return $success;
  }

  public function hookAdminHead($args)
  {
    queue_js_file('tinyMCEmod');
    $old_globals_url = src('globals','javascripts','js');
    $this->removeScript($old_globals_url);
  }
}
?>

<?php
/*-------------------------------------------------------
*
*   Plugin "Skard. Вывод случайного топика в тулбаре"
*   Author: Zheleznov Sergey (skif)
*   Site: livestreet.ru/profile/skif/
*   Contact e-mail: sksdes@gmail.com
*
---------------------------------------------------------
*/

class PluginSkard_ModuleSkard extends Module {
  protected $oMapper = null;
  public function Init () {
    $this -> oMapper = Engine::GetMapper (__CLASS__);
  }
  public function GetRandomTopic () {
    return $this -> oMapper -> GetRandomTopic();
  }

}

?>
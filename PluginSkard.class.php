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
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}
class PluginSkard extends Plugin {
    public $aDelegates = array(
    );
    protected $aInherits=array(
        'action'=>array('ActionAjax'),
    );
    public function Activate() {
        return true;
    }
    public function Deactivate(){
        return true;
    }
    // Инициализация плагина
    public function Init() {
        $this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__)."/css/style.css");
        $this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__)."/js/ajaxload.js");
    }
}
?>

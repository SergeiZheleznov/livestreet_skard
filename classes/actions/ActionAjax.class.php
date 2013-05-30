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
class PluginSkard_ActionAjax extends PluginSkard_Inherit_ActionAjax
{
    protected function RegisterEvent()
    {
        parent::RegisterEvent();
        $this->AddEvent('skard', 'EventRandom');
    }

    protected function EventRandom()
    {
        $iTopicId = $this->PluginSkard_Skard_GetRandomTopic();
        $oTopic = $this->Topic_GetTopicById($iTopicId);

        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('oTopic', $oTopic);
        $this->Viewer_AssignAjax('sText', $oViewerLocal->Fetch(Plugin::GetTemplatePath(__CLASS__) . "tooltip_inner.tpl"));
    }

    public function EventShutdown()
    {

    }
}

?>

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
class PluginSkard_ModuleSkard_MapperSkard extends Mapper {
  public function GetRandomTopic () {
    $sql = '
      SELECT t1.topic_id
        FROM
        ' . Config::Get ('db.table.topic') . ' AS t1
        JOIN
          ' . Config::Get ('db.table.blog') . ' AS b
        JOIN
          (SELECT (RAND() * (SELECT MAX(topic_id) FROM ' . Config::Get ('db.table.topic') . ')) AS topic_id) AS t2
        WHERE
          t1.topic_id >= t2.topic_id
          AND
          t1.blog_id = b.blog_id
          AND
          t1.topic_publish = 1
          AND
          t1.topic_rating >= ' . Config::Get ('plugin.skard.topic_rating') . '
          AND
          ((b.blog_type="personal") OR (b.blog_type="open") OR (b.blog_type="subcat"))
        LIMIT 1
    ';
    if ($Result = $this -> oDb -> selectRow ($sql)) {
      return $Result ['topic_id'];
    }
    return 1;
  }
  

}

?>
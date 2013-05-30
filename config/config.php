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

$config = array();


$config['topic_rating'] = -10000; // топики с рейтингом ниже этого значения не выводятся

// устанавливаем блок на главную страницу и страницу вывода блогов
Config::Set ('block.rule_', array ('path' => array('___path.root.web___', ),
	'blocks'  => array(
			'toolbar' => array(
				'blocks/block.toolbar.tpl' => array(
					'params' => array ('plugin' => 'skard'),
				),
			),
		),

));

return $config;

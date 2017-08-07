<?php

defined('PATH_REFERENCE_WIDGET') || define('PATH_REFERENCE_WIDGET', WWW_ROOT . 'files' . DS . 'references' . DS);
defined('PATH_METHODS_WIDGET') || define('PATH_METHODS_WIDGET', WWW_ROOT . 'files' . DS . 'methods' . DS);
defined('PATH_NOTES_WIDGET') || define('PATH_NOTES_WIDGET', WWW_ROOT . 'files' . DS . 'notes' . DS);


defined('PATH_UPLOAD_PROFILE') || define('PATH_UPLOAD_PROFILE', WWW_ROOT . 'files' . DS . 'profile' . DS);
defined('PATH_EXAM_RESULT') || define('PATH_EXAM_RESULT', WWW_ROOT . 'files' . DS . 'results' . DS);
defined('PATH_CMS_IMAGES') || define('PATH_CMS_IMAGES', WWW_ROOT . 'img' . DS . 'cms_images' . DS);

defined('PATH_UPLOAD_BUGS_FILES') || define('PATH_UPLOAD_BUGS_FILES', WWW_ROOT . 'files' . DS . 'bugs' . DS);

function dt($format = 'Y-m-d H:i:s') {
	return date($format); 
}
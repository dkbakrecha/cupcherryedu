<?php

/**
 * Images Controller
 * @author:	Jogendar singh
 * @created: 18-07-2014 
 */
App::uses('AppController', 'Controller');

class ImagesController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();

		$allowArr = array(
			"uploadteam", "save_profile"
		);
		$this->Auth->allow($allowArr);
	}

	/**
	 * function use for Admin Crop Images Popup(fancybox) .. 
	 * Parameters -> "userid,Imagename,flag(is_admin profile = 1 or user = '')"
	 */
	public function admin_profileimg($uid = NULL, $imageName = NULL, $flag = NULL)
	{
		$this->layout = 'admin_fancybox';
		$this->set('imageName', $imageName);
		$this->set('uid', $uid);
		$this->set('flag', $flag);
	}

	/**
	 * function use for Admin upload Original Images for Crop.. 
	 * "file_upload js"
	 */
	public function admin_uploadphoto()
	{
		$user_id = $this->Session->read('Auth.User.id');
		$file_name = "";

		if (isset($_FILES['uploadfile']['tmp_name']) and @ $_FILES['uploadfile']['tmp_name'] != "" && !empty($user_id))
		{
			//prd(exif_read_data($_FILES['uploadfile']['tmp_name']));
			list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
			$explode = explode(".", $_FILES['uploadfile']['name']);
			$expNo = count($explode) - 1;
			$myExt = $explode[$expNo];

			$originalName = "Org_" . $user_id . "." . $myExt;

			$thumbName = "thumb_" . $user_id . "." . $myExt;

			$path = WWW_ROOT . "images/temp/";
			//echo $path;exit;
			$savePath = $path . $originalName;
			$savePathR = $path . $thumbName;
			@copy($_FILES['uploadfile']['tmp_name'], $savePath);
			$this->createthumb($savePath, $savePathR, 400, 300);
			unlink($savePath);
			$size = getimagesize($savePathR);
		}
		if (isset($originalName) && $originalName != "")
		{
			echo $thumbName . "|t=" . time() . "~~~" . $size[0] . "@@" . $size[1];
		}
		else
		{
			echo '0';
		}
		exit;
	}

	/**
	 * function use for User upload Original Images for Crop.. 
	 * "file_upload js"
	 */
	public function uploadphoto()
	{
		$user_id = $this->Session->read('Auth.User.id');

		$file_name = "";

		if (isset($_FILES['uploadfile']['tmp_name']) and @ $_FILES['uploadfile']['tmp_name'] != "" && !empty($user_id))
		{
			list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
			$explode = explode(".", $_FILES['uploadfile']['name']);
			$expNo = count($explode) - 1;
			$myExt = $explode[$expNo];

			$originalName = "Org_" . $user_id . "." . $myExt;

			$thumbName = "thumb_" . $user_id . "." . $myExt;

			$path = WWW_ROOT . "images/temp/";
			//echo $path;exit;
			$savePath = $path . $originalName;
			$savePathR = $path . $thumbName;
			@copy($_FILES['uploadfile']['tmp_name'], $savePath);
			$this->createthumb($savePath, $savePathR, 400, 300);
			unlink($savePath);
			$size = getimagesize($savePathR);
		}
		if (isset($originalName) && $originalName != "")
		{
			echo $thumbName . "|t=" . time() . "~~~" . $size[0] . "@@" . $size[1];
		}
		else
		{
			echo '0';
		}
		exit;
	}

	/**
	 * function use for Admin save crop Images and save in database.
	 * Parameters -> "user_id"
	 * ajax Action
	 */
	public function admin_save_profileimg()
	{
		$this->loadModel("User");

		$userid = $this->Session->read('Auth.User.id');
		$update_img = $this->User->findById($userid);
		if (!empty($userid))
		{
			$ajaxdata = $this->request->data;
			if ($ajaxdata["mycode"] != "")
			{
				$arr = explode("?", $ajaxdata["mycode"]);
				$mycode = $arr[0];
			}
			if ($mycode != '')
			{
				$extension2 = explode(".", $mycode);
				$extension = $extension2[1];
				$x = $ajaxdata["x"];
				$y = $ajaxdata["y"];
				$x2 = $ajaxdata["x2"];
				$y2 = $ajaxdata["y2"];
				$w = $ajaxdata["w"];
				$h = $ajaxdata["h"];

				$sPath = WWW_ROOT . "images/temp/";
				$dPath = PATH_UPLOAD_PROFILE_IMAGE;

				$sFileName = "thumb_" . $userid . "." . $extension;
				$dFileName = "user_" . $userid . "." . $extension;

				$sFile = $sPath . $sFileName;
				$dFile = $dPath . $dFileName;

				$targ_w = $targ_h = 100;

				$this->cropImage($sFile, $dFile, $x, $y, $targ_w, $targ_h, $w, $h);

				$this->User->updateAll(array('User.image' => "'" . $dFileName . "'"), array('User.id' => $userid));

				$this->Session->write('Auth.User.image', $dFileName);
				echo $dFileName;
				exit;
			}
		}
		echo '0';
		exit;
	}

	/**
	 * function use for User save crop Images and save in database.
	 * Parameters -> "user_id"
	 * ajax Action
	 */
	public function save_profileimg()
	{
		$this->loadModel("User");

		$userid = $this->Session->read('Auth.User.id');
		$update_img = $this->User->findById($userid);
		if (!empty($userid))
		{
			$ajaxdata = $this->request->data;
			if ($ajaxdata["mycode"] != "")
			{
				$arr = explode("?", $ajaxdata["mycode"]);
				$mycode = $arr[0];
			}
			if ($mycode != '')
			{
				$extension2 = explode(".", $mycode);
				$extension = $extension2[1];
				$x = $ajaxdata["x"];
				$y = $ajaxdata["y"];
				$x2 = $ajaxdata["x2"];
				$y2 = $ajaxdata["y2"];
				$w = $ajaxdata["w"];
				$h = $ajaxdata["h"];

				$sPath = WWW_ROOT . "images/temp/";
				$dPath = PATH_UPLOAD_PROFILE_IMAGE;

				$sFileName = "thumb_" . $userid . "." . $extension;
				$dFileName = "user_" . $userid . "." . $extension;

				$sFile = $sPath . $sFileName;
				$dFile = $dPath . $dFileName;

				$targ_w = $targ_h = 100;

				$this->cropImage($sFile, $dFile, $x, $y, $targ_w, $targ_h, $w, $h);

				$this->User->updateAll(array('User.image' => "'" . $dFileName . "'"), array('User.id' => $userid));

				$this->Session->write('Auth.User.image', $dFileName);
				echo $dFileName;
				exit;
			}
		}
		echo '0';
		exit;
	}

	/**
	 * function use for Admin upload Original Images for Crop.. 
	 * "file_upload js"
	 */
	public function admin_uploadteam()
	{
		$user_id = rand() . "_" . time();
		$file_name = "";
		if (isset($_FILES['uploadfile']['tmp_name']) and @ $_FILES['uploadfile']['tmp_name'] != "")
		{
			list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
			$explode = explode(".", $_FILES['uploadfile']['name']);
			$expNo = count($explode) - 1;
			$myExt = $explode[$expNo];

			$originalName = "Org_" . $user_id . "." . $myExt;
			$thumbName = "thumb_" . $user_id . "." . $myExt;
			$path = PATH_UPLOAD_PROFILE . "temp/";

			$savePath = $path . $originalName;
			$savePathR = $path . $thumbName;

			@copy($_FILES['uploadfile']['tmp_name'], $savePath);
			$this->createthumb($savePath, $savePathR, 400, 300);
			unlink($savePath);
			$size = getimagesize($savePathR);
		}
		if (isset($originalName) && $originalName != "")
		{
			echo $thumbName . "|t=" . time() . "~~~" . $size[0] . "@@" . $size[1];
		}
		else
		{
			echo false;
		}
		exit;
	}

	public function uploadteam()
	{
		$user_id = rand() . "_" . time();
		$file_name = "";
		if (isset($_FILES['uploadfile']['tmp_name']) and @ $_FILES['uploadfile']['tmp_name'] != "")
		{
			list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
			$explode = explode(".", $_FILES['uploadfile']['name']);
			$expNo = count($explode) - 1;
			$myExt = $explode[$expNo];

			$originalName = "Org_" . $user_id . "." . $myExt;
			$thumbName = "thumb_" . $user_id . "." . $myExt;
			$path = PATH_UPLOAD_PROFILE . "temp/";

			$savePath = $path . $originalName;
			$savePathR = $path . $thumbName;

			@copy($_FILES['uploadfile']['tmp_name'], $savePath);
			$this->createthumb($savePath, $savePathR, 400, 300);
			unlink($savePath);
			$size = getimagesize($savePathR);
		}
		if (isset($originalName) && $originalName != "")
		{
			echo $thumbName . "|t=" . time() . "~~~" . $size[0] . "@@" . $size[1];
		}
		else
		{
			echo false;
		}
		exit;
	}

	/**
	 * function use for Admin save crop Images and save in database.
	 * Parameters -> "user_id"
	 * ajax Action
	 */
	public function admin_save_profile()
	{
		$this->loadModel("User");
		$userid = "";
		$ajaxdata = $this->request->data;
		if ($ajaxdata["mycode"] != "")
		{
			$arr = explode("?", $ajaxdata["mycode"]);
			$mycode = $arr[0];
		}
		if ($mycode != '')
		{
			$userid = $mycode;
			$extension2 = explode(".", $mycode);
			$extension = $extension2[1];
			$x = $ajaxdata["x"];
			$y = $ajaxdata["y"];
			$x2 = $ajaxdata["x2"];
			$y2 = $ajaxdata["y2"];
			$w = $ajaxdata["w"];
			$h = $ajaxdata["h"];

			/*
			  $sPath = WWW_ROOT."our_team/temp/";
			  $dPath = WWW_ROOT."our_team/";
			 */
			$sPath = PATH_UPLOAD_PROFILE . "temp/";
			$dPath = PATH_UPLOAD_PROFILE;

			$sFileName = $userid;
			//$dFileName = "our_team_1.".$extension;
			$dFileName = $userid;

			$sFile = $sPath . $sFileName;
			$dFile = $dPath . $dFileName;
			//echo $sFile."----";
			//echo $dFile;exit;
			$targ_w = $targ_h = 170;

			$this->cropImage($sFile, $dFile, $x, $y, $targ_w, $targ_h, $w, $h);
			unlink($sFile);

			echo $dFileName;
			exit;
		}
	}

	public function save_profile()
	{
		$this->loadModel("User");
		$userid = "";
		$ajaxdata = $this->request->data;
		if ($ajaxdata["mycode"] != "")
		{
			$arr = explode("?", $ajaxdata["mycode"]);
			$mycode = $arr[0];
		}
		if ($mycode != '')
		{
			$userid = $mycode;
			$extension2 = explode(".", $mycode);
			$extension = $extension2[1];
			$x = $ajaxdata["x"];
			$y = $ajaxdata["y"];
			$x2 = $ajaxdata["x2"];
			$y2 = $ajaxdata["y2"];
			$w = $ajaxdata["w"];
			$h = $ajaxdata["h"];

			/*
			  $sPath = WWW_ROOT."our_team/temp/";
			  $dPath = WWW_ROOT."our_team/";
			 */
			$sPath = PATH_UPLOAD_PROFILE . "temp/";
			$dPath = PATH_UPLOAD_PROFILE;

			$sFileName = $userid;
			//$dFileName = "our_team_1.".$extension;
			$dFileName = $userid;

			$sFile = $sPath . $sFileName;
			$dFile = $dPath . $dFileName;
			//echo $sFile."----";
			//echo $dFile;exit;
			$targ_w = $targ_h = 170;

			$this->cropImage($sFile, $dFile, $x, $y, $targ_w, $targ_h, $w, $h);
			unlink($sFile);

			echo $dFileName;
			exit;
		}
	}

	/* ------------------------------ Not in use */

	public function createthumb($source_image, $destination_image_url, $get_width, $get_height)
	{
		ini_set('memory_limit', '512M');
		set_time_limit(0);

		$image_array = explode('/', $source_image);
		$image_name = $image_array[count($image_array) - 1];
		$max_width = $get_width;
		$max_height = $get_height;
		$quality = 100;

		//Set image ratio
		list($width, $height) = getimagesize($source_image);
		$ratio = ($width > $height) ? $max_width / $width : $max_height / $height;
		$ratiow = $width / $max_width;
		$ratioh = $height / $max_height;
		$ratio = ($ratiow > $ratioh) ? $max_width / $width : $max_height / $height;

		if ($width > $max_width || $height > $max_height)
		{
			$new_width = $width * $ratio;
			$new_height = $height * $ratio;
		}
		else
		{
			$new_width = $width;
			$new_height = $height;
		}

		if (preg_match("/.jpg/i", "$source_image") or preg_match("/.jpeg/i", "$source_image"))
		{
			//JPEG type thumbnail
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($source_image);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($image_p, $destination_image_url, $quality);
			imagedestroy($image_p);
		}
		elseif (preg_match("/.png/i", "$source_image"))
		{
			//PNG type thumbnail
			$im = imagecreatefrompng($source_image);
			$image_p = imagecreatetruecolor($new_width, $new_height);
			imagealphablending($image_p, false);
			imagecopyresampled($image_p, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagesavealpha($image_p, true);
			imagepng($image_p, $destination_image_url);
		}
		elseif (preg_match("/.gif/i", "$source_image"))
		{
			//GIF type thumbnail
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromgif($source_image);
			$bgc = imagecolorallocate($image_p, 255, 255, 255);
			imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $bgc);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagegif($image_p, $destination_image_url, $quality);
			imagedestroy($image_p);
		}
		else
		{
			echo 'unable to load image source';
			exit;
		}
	}

	public function cropImage($sFile, $dFile, $x, $y, $targ_w, $targ_h, $w, $h)
	{
		//$extension = array_pop(explode(".",$sFile));
		$extension = array_reverse(explode(".", $sFile));
		$extension = $extension[0];
		$jpeg_quality = 90;


		$image_p = imagecreatetruecolor($targ_w, $targ_h);

		$background = imagecolorallocate($image_p, 0, 0, 0);

		$newImage = imagecreatetruecolor($targ_w, $targ_h);

		$extension = strtolower($extension);
		if ($extension == "png")
		{
			$img_r = imagecreatefrompng($sFile);
		}
		elseif ($extension == "jpg" || $extension == "jpeg")
		{
			$img_r = imagecreatefromjpeg($sFile);
		}
		elseif ($extension == "gif")
		{
			$img_r = imagecreatefromgif($sFile);
		}

		imagecolortransparent($image_p, $background);
		imagealphablending($image_p, false);
		imagesavealpha($image_p, true);
		imagecopyresampled($image_p, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);

		if ($extension == "png" || $extension == "PNG")
		{

			imagepng($image_p, $dFile, 0);
		}
		elseif ($extension == "jpg" || $extension == "jpeg" || $extension == "JPG" || $extension == "JPEG")
		{

			imagejpeg($image_p, $dFile, 90);
		}
		elseif ($extension == "gif" || $extension == "GIF")
		{

			imagegif($image_p, $dFile);
		}
		chmod($dFile, 0777);
		//unlink($sFile);
	}

	public function admin_ck_uploadimage()
	{
		$res = array();
		$res['fileName'] = "";
		$res['uploaded'] = "0";
		$res['url'] = "";

		if (file_exists("images/" . $_FILES["upload"]["name"]))
		{
			//echo $_FILES["upload"]["name"] . " already exists. ";

			$res['fileName'] = "";
			$res['uploaded'] = "0";
			$res['url'] = "";
		}
		else
		{
			$path = PATH_CMS_IMAGES;
			$pathUrl = "";
			move_uploaded_file($_FILES["upload"]["tmp_name"], $path . $_FILES["upload"]["name"]);

			$res['fileName'] = $_FILES["upload"]["name"];
			$res['uploaded'] = "1";
			$res['url'] = Router::url('/', true) . 'img/cms_images/' . $_FILES["upload"]["name"];
			//echo $path . $_FILES["upload"]["name"];
		}

		echo json_encode($res);
		exit;
	}

	
	public function admin_ck_uploadimageurl()
	{
		$res = array();
		$res['fileName'] = "";
		$res['uploaded'] = "0";
		$res['url'] = "";

		if (file_exists("images/" . $_FILES["upload"]["name"]))
		{
			echo $_FILES["upload"]["name"] . " already exists. ";

			$res['fileName'] = "";
			$res['uploaded'] = "0";
			$res['url'] = "";
		}
		else
		{
			$path = PATH_CMS_IMAGES;
			$pathUrl = "";
			move_uploaded_file($_FILES["upload"]["tmp_name"], $path . $_FILES["upload"]["name"]);

			//$res['fileName'] = $_FILES["upload"]["name"];
			//$res['uploaded'] = "1";
			//$res['url'] = Router::url('/', true) . 'img/cms_images/' . $_FILES["upload"]["name"];
			$imgurl = Router::url('/', true) . 'img/cms_images/' . $_FILES["upload"]["name"];
			echo $imgurl;
		}

		//echo json_encode($res);
		exit;
	}

}

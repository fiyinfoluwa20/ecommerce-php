<?php
class User
{
	protected static $id;
	public static $unknownError = 'Sorry something went wrong unable to process your request';
	public static $user = array();
	public static $auth = 0;

	public static function __user()
	{
		if (isset($_COOKIE['am_d']) && isset($_COOKIE['am_r']) && $_COOKIE['am_r'] == 1) {
			$b = Err::Preg_clean_string(2, $_COOKIE['am_d']);
			if ($b) {
				$c = selectOne('users', ['auth' => $b]);
				if (!empty($c)) {
					self::$id = $c['id'];
					self::$user['user'] = $c;
					self::$auth = 1;
				}
			}
		} else {
			if (isset($_SESSION['token'])) {
				$b = Err::Preg_clean_string(2, $_SESSION['token']);
				if ($b) {
					$c = selectOne('users', ['auth' => $b]);
					if (!empty($c)) {
						self::$id = $c['id'];
						self::$user['user'] = $c;
						self::$auth = 1;
					}
				}
			}
		}
	}
	
	public static function __getUser()
	{
		self::__user();
		return (isset(self::$user['user']) && self::$auth == 1 ? self::$user['user'] : []);
	}
	public function wishlist(){
		if (isset($_POST['wsh'])) {
			Err::json();
				$a = 'auth?redirect='.Err::url("a");
				$d = ["type" => "warning", "pattern" => "animate__heartBeat", "style" => "m", "message" => "Please <a href='$a' class='text-primary'> Login </a> to take this action"];
				if (self::$auth === 0 || !isset(self::$id)) {
					Err::error($d, 's');
				}else {
					$b = isset($_POST['wsh'][1]) ? Err::Preg_clean_string(1, $_POST['wsh'][1]) : 1;
					$c = Err::Preg_clean_string(2, $_POST['wsh'][0]);
					if (!preg_match('/^[0-9]+$/', $b) || !preg_match('/^[A-Za-z0-9]+$/', $c)) {
						Err::error($d, 's');
					}else {
						unset($_POST['wsh']);
						$e = getproductwithcategory($c);
						if (!empty($e)) {
							$f = $e['id'];
							$_POST['product_id'] = $e['id'];
							$_POST['user_id'] = self::$id;
							$_POST['p_tok'] = $e['p_tok'];
							$_POST['wish_tok'] = bin2hex(random_bytes(7));
							$_POST['category_id'] = $e['category_id'];
							$_POST['title'] = $e['title'];
							$_POST['product_badge'] = $e['product_badge'];
							$_POST['amount'] = $e['amount'];
							$_POST['sizes'] = $e['sizes'];
							$_POST['total'] = $_POST['amount'] * $b;
							$_POST['image1'] = $e['image1'];
							$_POST['image2'] = $e['image2'];
							$_POST['image3'] = $e['image3'];
							$_POST['user_ip'] = UserInfo::get_ip();
							$_POST['device'] = UserInfo::get_device();
							$_POST['os'] = UserInfo::get_os();
							$_POST['browser'] = UserInfo::get_browser();
							$_POST['discount'] = $e['discount'];
							$_POST['qty'] = $b;
							$g = wishlistInfo($f, self::$id);
							$_POST = Err::htmlentity($_POST);
							if (!empty($g)) {
								Err::error(["type" => "error", "style" => "m", "message" => "Already added to your <a href='wishlist' class='text-primary'> wishlist </a>"], 's');
							} else {
								$createWish = create('wishlist', $_POST);
								Err::error(["type" => "success", "pattern" => "animate__heartBeat", "style" => "m", "message" => "Added to your wishlist"], 's');
							}
						}
					}
				}
			exit();
		}
	}

}

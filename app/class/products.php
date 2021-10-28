<?php

class Products
{
    public static $product = array();

	public function product()
	{
		$a = 0;
		if (isset($_GET['Pdk']) && !empty($_GET['Pdk'])) {
			$b = Err::Preg_clean_string(2,$_GET['Pdk']);
			$a = 1;
		} else {
			if (isset($_GET['product']) && !empty($_GET['product'])) {
				$b = Err::Preg_clean_string(5,$_GET['Pdk']);
				$a = 2;
			}
		}
		if (!isset($b) && $a != 1 && !preg_match('/^[0-9a-zA-Z]+$/', $b) || $a != 2 && !preg_match('/^[0-9a-zA-Z-]+$/', $b)) {
			exit;
		} else {
			$c = $a == 2 ? str_replace('-', ' ', $b) : ($a == 1 ? $b: '');
            $c = htmlentities($c, ENT_QUOTES, 'UTF-8');
			$d = getproductwithcategory($c);
			if (!is_array($d) || empty($d)) {
			    header("location: index");
			    exit();
			} else {
				$o = Err::Preg_clean_array_input(4, $d);
				if (!is_array($o) || empty($o)) {
				    header("location: index");
				    exit();
				}else {
					unset($d);
				    foreach ($o as $k => $e) {
						self::$product['cart'][$k] = $e;
					}
					self::$product['cart']['sizes'] = explode(',', $o['sizes']);
					self::$product['cart']['amount'] = number_format($o['amount']);
					self::$product['cart']['discount'] = number_format($o['discount']);
					self::$product['cart']['tags'] = explode(',', ($o['tags']));
					self::$product['cart']['body'] = html_entity_decode($o['body']);
					self::$product['cart']['link'] = 'product?product='.trim(str_replace(' ', '-', strip_tags(self::$product['cart']['title']))).'&Pdk='.self::$product['cart']['p_tok'];
					self::$product['reviews'] = reviews($o['p_tok'], isset(User::__getUser()["id"]) ? User::__getUser()["id"] : "");
					return ['id' => self::$product['cart']['id'], 't' => self::$product['cart']['p_tok']];
				}
			}
		}
	}
	
	public function writeReviews()
	{
		if (isset($_POST['Wrt'])) {
			if (isset($_GET['product']) || isset($_GET['Pdk'])) {
				Err::json();
				unset($_POST['Wrt']);
				$_POST =  Err::Preg_clean_array_input(3, $_POST);
				$a = Err::Reviews($_POST);
				if (!empty($a)) {
					Err::error($a, 's');
				} else {
					if (empty(User::__getUser())) {
						Err::error(array("t" => "error", "p" => "animate__heartBeat", "s" => "modal", "m" => "!Unable to create a review please <a href='auth'>login</a>"), 'm');
					}
					$_POST['reviewname'] = $_POST['reviewname'];
					$_POST['reviewemail'] = $_POST['reviewemail'];
					$_POST['reviewrating'] = $_POST['reviewrating'];
					$_POST['reviewtext'] = $_POST['reviewtext'];
					$_POST['user_id'] = User::__getUser()["id"];
					$_POST['product_token'] = $this->product()['t'];
					$_POST['approval'] = 1;
					$_POST['approved'] = 1;
					$_POST['device'] = UserInfo::get_device();
					$_POST['os'] = UserInfo::get_os();
					$_POST['browser'] = UserInfo::get_browser();
					$_POST =  Err::Preg_clean_array_input(3, $_POST);
					$_POST['ip'] = UserInfo::get_ip();
					$_POST = Err::htmlentity($_POST);
					$create = create('reviews', $_POST);
					if ($create) {
						Err::error(array("t" => "success", "p" => "animate__heartBeat", "s" => "modal", "m" => "Posted successfully"), 'm');
					}
				}
			}
            exit();
		}
	}

	public function category()
	{
		if (isset($_GET['token']) || isset($_GET['category'])) {
			$a = 0;
			if (isset($_GET['token']) && !empty($_GET['token'])) {
				$b = Err::Preg_clean_string(2,$_GET['token']);
				unset($_GET['token']);
				$a = 1;
			} else {
				if (isset($_GET['category']) && !empty($_GET['category'])) {
					$b = Err::Preg_clean_string(2,$_GET['category']);
					unset($_GET['category']);
					$a = 1;
				}
			}
			if (!isset($b) && !preg_match('/^[0-9a-zA-Z]+$/', $b) || $a !== 1) {
				header('location: 404.html');
				exit;
			} else {
				$c = getPostsByCategoryId($b);
				if (empty($c) || !is_array($c)) {
					return [];
				} else {
					return $c;
				}
			}
		} else {
			header('location: index');
			die();
		}
	}
}

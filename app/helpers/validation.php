<?php
class Err {
	public static $errors = [];
	public const a = "alert, alert-danger";
    public static function url($k)
    {
        $a = &$_SERVER;
        $b = (!empty($a['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
        $c = strtolower($a['SERVER_PROTOCOL']);
        $d = substr($c, 0, strpos($c, '/')) . (($b) ? 's' : '');
        $e = $a['SERVER_PORT'];
        $e = ((!$b && $e=='80') || ($b && $e=='443')) ? '' : ':'.$e;
        $f = isset($a['HTTP_X_FORWARDED_HOST']) ? $a['HTTP_X_FORWARDED_HOST'] : (isset($a['HTTP_HOST']) ? $a['HTTP_HOST'] : null);
        $f = isset($f) ? $f : $a['SERVER_NAME'] . $e;
        $g = $d . '://' . $f . $a['REQUEST_URI'];
		switch ($k) {
			case 'a':
				$i = str_replace(["javascript","script",'*','3C','3E'], '', trim($g));
				$i = preg_replace("/[^A-Za-z0-9=?.:%&-\/]/", '', $i);
			    $i = preg_replace('/-+/', '-', $i);
			break;
			case 'r':
				$i = str_replace(["javascript","script",'*','3C','3E','(',')','{','}','$','!','~','@','#'], '', trim($g));
				$i = preg_replace("/[^A-Za-z0-9=?:.%&-\/]/", '', substr($i, strpos($i, '=')+1));
			    $i = preg_replace('/-+/', '-', $i);
			break;
		}
        return $i;
    }
    
	public static function error(array $a, string $f)
	{
		switch ($f) {
			case 's':
				echo json_encode($a);
                exit;
			break;
			case 'm':
				echo json_encode([$a]);
                exit;
			break;
		}
	}
	
	public static function json()
	{
		header('Content-Type: application/json; charset=utf-8');
		if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] != "POST") {
			exit;
		}
	}
	public static function stripslashes_array($v)
	{
	    $v = is_array($v) ? array_map('stripslashes_array', $v) : stripslashes($v);
	    return $v;
	}

	public static function stripslashes_string($v)
	{
	    return stripslashes($v);
	}

	public static function Preg_clean_string($a, $b){
		$c[1] = '/[\D]+/'; // not digit
		$c[2] = '/[^A-Za-z0-9]/'; // not digit or alphabet
		$c[3] = "/[^A-Za-z0-9 .@&,'-]/"; // form inputs for products && cart
		$c[4] = "/[^A-Za-z0-9 .@&,'_\-:;]/"; // database with body 
		$c[5] = "/[^A-Za-z0-9-]/"; // single-product for url title
		$c[6] = "/[\D.]/"; // clean ip
		$c[7] = "/[^A-Za-z0-9 .@&,'_\-;%]/"; // search or authentication
		self::stripslashes_string($b);
		$i = str_replace(["javascript","script"], '', $b);
		$i = preg_replace($c[$a], '', trim($b));
		return $i;
	}
    
	public static function Preg_clean_array_input(int $a, array $b, ...$c){
		$d[1] = '/[\D]+/'; // not digit
		$d[2] = '/[^A-Za-z0-9]/'; // not digit or alphabet
		$d[3] = "/[^A-Za-z0-9 .@&,'-]/"; // form inputs for products && cart
		$d[4] = "/[^A-Za-z0-9 .@&,'_\-:;]/"; // database with body 
		$d[5] = "/[^A-Za-z0-9-]/"; // single-product for url title
		$d[6] = "/[^A-Za-z0-9 .@&,'_\-:;%]/"; // search or authentication
		$d[7] = "/[^ ]/"; // for LoadCart && LoadCartModal
		if (is_array($b)) {
			$e = [];
			$f = array_intersect_key($b, array_flip($c));
			if (empty($c)) {
				foreach (array_flip($c) as $g => $h) {
					unset($b[$g]);
				}
			}
			foreach ($b as $i => $j) {
			    self::stripslashes_string($j);
				$j = str_replace(["javascript","script"], '', $j);
				$e[$i] = preg_replace($d[$a], '', strip_tags(trim($j)));
			}
			return array_merge($e, $f);
		}
	}

	public static function htmlentity($a)
	{
		if (is_array($a)) {
			foreach ($a as $k => $b) {
				$c[$k] = trim(htmlentities( self::stripslashes_string(strip_tags($b)), ENT_QUOTES, 'UTF-8'));
			}
		} else {
			$c = trim(htmlentities( self::stripslashes_string(strip_tags($a)), ENT_QUOTES, 'UTF-8'));
		}
		return $c;
	}

	public static function Login($a) {
	   if (empty($a['email'])) {
		    array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Email is required"));
	   }
	   if (empty($a['password'])) {
		    array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Password is required"));
	   }
	   return self::$errors;
	}

	public static function Register($a){
	    if (empty($a['firstname'])) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Firstname is required"));
	    }
	    if (empty($a['lastname'])) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Lastname is required"));
	    }
	    if (empty($a['email'])) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Email is required"));
	    }elseif (!filter_var($a['email'], FILTER_VALIDATE_EMAIL)) {
	       array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Email Address is Invalid"));
	    }
	    if (empty($a['password'])) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Password is required"));
	    }elseif (strlen($_POST['password']) < 2) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Password is too short it must be 7 characters long or more"));
		}
	    if ($a['passwordcnf'] !== $a['password']) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Password do not match"));
	    }
	    $b = selectOne('users', ['email' => $a['email']]);
	    if (!empty($b)) {
	      if (isset($a['flop']) && $b['email'] == $a['email']) {
	       array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Please use another email"));
	      }
	    }
	    return self::$errors;
	}
	public static function NotEmptyShippingValidation($i)
	{
		$q = 0;
		if (!empty($i['firstname_shipping'])) {
			$q += 1;
		}
		if (!empty($i['lastname_shipping'])) {
			$q += 1;
		}
		if (!empty($i['email_shipping'])) {
			$q += 1;
		}
		if (!empty($i['town_shipping'])) {
			$q += 1;
		}
		if (!empty($i['state_shipping'])) {
			$q += 1;
		}
		if (!empty($i['address_shipping'])) {
			$q += 1;
		}
		return $q;
	}
	public static function SaveInfoError($a, $i)
	{
		$c = 0;
		$b = useraddress($i);
		if (is_array($b) && !empty($b)) {
			foreach ($b as $v) {
				foreach ($v as $o => $ve) {
					switch ($ve) {
						case 'empty':
						case 0:
						case '':
							unset($v[$o]);
						break;
					}
				}
				if ($v['firstname_invoice'] == $a['firstname_invoice']) {
					$c +=1;
				}
				if ($v['lastname_invoice'] == $a['lastname_invoice']) {
					$c +=1;
				}
				if ($v['email_invoice'] == $a['email_invoice']) {
					$c +=1;
				}
				if ($v['address_invoice'] == $a['address_invoice']) {
					$c +=1;
				}
				if (isset($v['firstname_shipping']) AND isset($a['firstname_shipping']) && $v['firstname_shipping'] == $a['firstname_shipping']) {
					$c +=1;
				}
				if (isset($v['lastname_shipping']) AND isset($a['lastname_shipping']) && $v['lastname_shipping'] == $a['lastname_shipping']) {
					$c +=1;
				}
				if (isset($v['email_shipping']) AND isset($a['email_shipping']) && $v['email_shipping'] == $a['email_shipping']) {
					$c +=1;
				}
				if (isset($v['address_shipping']) AND isset($a['address_shipping']) && $v['address_shipping'] == $a['address_shipping']) {
					$c +=1;
				}
			}
		}
		return $c;
	}
	public static function Reviews($review) {
	    if (empty($review['reviewname'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "dollwi", "m" => "Name is required"));
	    }
	    if (empty($review['reviewemail'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "dollwi", "m" => "Email is required"));
	    } elseif (!filter_var($review['reviewemail'], FILTER_VALIDATE_EMAIL)) {
			array_push(self::$errors, array("t" => self::a, "s" => "dollwi", "m" => "Email Address is Invalid"));
	    }
	    if (empty($review['reviewtext'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "dollwi", "m" => "Text is required"));
	    }
	    return self::$errors;
	}

	public static function Shipping($error) {
		if (empty($error['firstname_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping first name is required"));
		}
		if (empty($error['lastname_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping last name is required"));
		}
		if (empty($error['email_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping email is required"));
		} elseif (!filter_var($error['email_shipping'], FILTER_VALIDATE_EMAIL)) {
	        array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" =>  "Shipping email address is invalid"));
	    }
		if (empty($error['country_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping country is required"));
		}
		if (empty($error['town_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping town is required"));
		}
		if (empty($error['state_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping state is required"));
		}
		if (empty($error['telephone_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping phone number is required"));
		} elseif (!empty($_POST['telephone_shipping']) && !ctype_digit($_POST['telephone_shipping']) || strlen($_POST['telephone_shipping']) < 10 OR strlen($_POST['telephone_shipping']) > 11) {
			array_push(self::$errors, array("t" => "alert, alert-danger", "s" => "a", "m" => "Invalid Shipping phone number"));
		}
		if (empty($error['address_shipping'])) {
			array_push(self::$errors, array("t" => 'alert, alert-danger', "s" => "a", "m" => "Shipping address is required"));
		}
		return self::$errors;
	}

	public static function Invoice($error) {
		if (empty($error['firstname_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "First name is required"));
		}
		if (empty($error['lastname_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Last name is required"));
		}
		if (empty($error['email_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Email is required"));
		} elseif (!filter_var($error['email_invoice'], FILTER_VALIDATE_EMAIL)) {
	        array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Email is Invalid"));
	    }
		if (empty($error['town_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Town is required"));
		}
		if (empty($error['state_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "State is required"));
		}
		if (empty($error['telephone_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Phone number is required"));
		} elseif (!empty($_POST['telephone_invoice']) && !ctype_digit($_POST['telephone_invoice']) || strlen($_POST['telephone_invoice']) < 10 OR strlen($_POST['telephone_invoice']) > 13) {
			array_push(self::$errors, array("t" => "alert, alert-danger", "s" => "a", "m" => "Invalid billing phone number"));
		}
		if (empty($error['address_invoice'])) {
			array_push(self::$errors, array("t" => self::a, "s" => "a", "m" => "Address is required"));
		}
		return self::$errors;
	}
	public static function ContactForm($form) {
	   if (empty($form['firstName'])) {
	    array_push(self::$errors, array("type" => 'alert, alert-danger', "style" => "dollwi", "message" => "First name is required"));
	   }
	   if (empty($form['email'])) {
	    array_push(self::$errors, array("type" => 'alert, alert-danger', "style" => "dollwi", "message" => "Email is required"));
	   }
	   if (empty($form['subject'])) {
	    array_push(self::$errors, array("type" => 'alert, alert-danger', "style" => "dollwi", "message" => "Subject is required"));
	   }
	   if (empty($form['message'])) {
	    array_push(self::$errors, array("type" => 'alert, alert-danger', "style" => "dollwi", "message" => "Message is empty"));
	   }
	   return self::$errors;
	}

}
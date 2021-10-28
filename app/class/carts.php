<?php

class Carts extends Products
{
    public function SingleProduct()
    {
        $this->product();
		$this->ProductAddToCart();
        if (isset(self::$product['cart'])) {
            return self::$product['cart'];
        } else {
            header("location: index");
            exit();
        }
    }
	public function __cart()
	{
		$this->LoadCart();
		$this->Amount();
		$this->QuantitiesCal();
	}
	protected static function SESSIONS($b){
		return array_intersect_key($b, array_unique(array_column($b, 'product_id')));
	}
	public static function search()
	{   $a = array();
		$a = displayPost();
		if (isset($_GET['s'])) {
			self::$product['search']['style'] = true;
			$b = Err::Preg_clean_string(7, $_GET['s']);
			$b = htmlentities($b, ENT_QUOTES, 'UTF-8');
			if (empty($b)) {
				header('Location: ' . 'index.php');
				exit();
			} else {
				if (!preg_match("/^[A-Za-z0-9 .@&,'_\-;%]+$/", $b)) {
					self::$product['search']['title'] = "Nothing was found for: ";
				} else {
					$a = searchProducts($b);
					if (count($a) > 0) {
						self::$product['search']['title'] = "Search Results for: " . $b. "";
					}else {
						self::$product['search']['title'] = "Nothing was found for: " . $b . "";
					}
				}
			}
			
		}
		if (isset($_GET['showUp']) && $_GET['showUp'] === 'NewArrivals') {
			$b = htmlentities($_GET['showUp']);
			$a = NewArrivals();
		}
		foreach ($a as $c => $d) {
			foreach ($d as $e => $f) {
				$a[$c][$e] = trim(strip_tags(html_entity_decode($f)));
			}
		}
		return $a;
	}
	private static function carts($c) {
		$i['id'] = $c['id'];
		$i['t'] = $c['cart_tok'];
		$i['p'] = $c['product_id'];
		return $i;
	}
	private static function Session(){
		return array_column($_SESSION['cart'], 't');
	}
	private function ProductAddToCart()
	{
		if (isset($_POST['padd'])) {
			Err::json();
			$a = $this->product();
			if (!is_array($a) && empty($a)) {
				exit;
			} else {
				unset($_POST['padd']);
				$_POST = Err::Preg_clean_array_input(2,$_POST);
				$b = getproductwithcategory($a['t']);
				if (!empty($b) && is_array($b)) {
					if ($b['checksizeint'] == 1 && empty($_POST['sizes']) || $b['checksizestring'] == 1 && !isset($_POST['sizes'])) {
						Err::error(["type" => "text-danger mb-2", "style" => "b", "message" => "Select a size"], 's');
					} else{
						$c = isset($_POST['sizes']) ? Err::Preg_clean_string(2,$_POST['sizes']) : NULL;
						$d = Err::Preg_clean_string(1,$_POST['qty']);
						if (isset($c) && !preg_match('/^[0-9a-zA-Z]+$/', $c) || !preg_match('/^[0-9]+$/', $d) || !ctype_digit($d)) {
							die;
						} else{
							if ($d > 10) {
								Err::error(["type" => "text-danger mb-2", "style" => "b", "message" => "Quantity must not be more than 10"], 's');
							}
							
							$p = $b['id'];
							$_POST['product_id'] = $b['id'];
							$_POST['user_id'] = !isset(User::$user['id']) ? 0 : User::$user['id'];
							$_POST['p_tok'] = $b['p_tok'];
							$_POST['cart_tok'] = bin2hex(random_bytes(50));
							$_POST['category_id'] = $b['category_id'];
							$_POST['title'] = $b['title'];
							$_POST['product_badge'] = $b['product_badge'];
							$_POST['amount'] = $b['amount'];
							$_POST['showsizes'] = 0;
							if (!is_null($c)) {
								$_POST['sizes'] = $c;
							}
							$_POST['total'] = $_POST['amount'] * $d;
							$_POST['image1'] = $b['image1'];
							$_POST['image2'] = $b['image2'];
							$_POST['image3'] = $b['image3'];
							$_POST['user_ip'] = UserInfo::get_ip();
							$_POST['device'] = UserInfo::get_device();
							$_POST['os'] = UserInfo::get_os();
							$_POST['browser'] = UserInfo::get_browser();
							$_POST['discount'] = $b['discount'];
							$_POST['qty'] = $d;
							$_POST = Err::Preg_clean_array_input(4,$_POST);
							$_POST = Err::htmlentity($_POST);
							if (!isset($_SESSION['cart'])) { 
								$e = create('cart', $_POST);
								$f = selectOne('cart', ['id' => $e]);
								if (!empty($f)) {
									$g = self::carts($f);
									if (!empty($g) && is_array($g)) {
										$_SESSION['cart'][] = self::carts($f);
										Err::error(["type" => "alert alert-success text-dark text-sm alert-dismissible fade show", "style" => "a", "message" => $f['title']], 's');
									}
								}
							} else {
								$h = self::Session();
								$i = array();
								foreach ($h as $j) {
									$j = Err::Preg_clean_string(2, $j);
									if (preg_match('/^[0-9a-zA-Z]+$/', $j)) {
										$j = htmlentities($j, ENT_QUOTES, 'UTF-8');
										$k = ALLCARTS2($j);
										if (!empty($k)) {
											array_push($i, $k);
										}
									}
								}
								$l = array_column($i, 'product_id', 'cart_tok');
								if (in_array($p, $l)) {
									Err::error(["type" => "alert alert-danger text-dark text-sm alert-dismissible fade show", "style" => "a", "message" => "Already added to cart"], 's');
								}else {
									$m = create('cart', $_POST);
									$n = selectOne('cart', ['id' => $m]);
									if (!empty($n)) {
										$o = self::carts($n);
										if (!empty($o) && is_array($o)) {
											$_SESSION['cart'][] = self::carts($n);
											Err::error(["type" => "alert alert-success text-dark text-sm alert-dismissible fade show", "style" => "a", "message" => $n['title']], 's');
										}
									}
								}
							}
						}
					}
				}
			}
			exit();
		}
	}
	public function QuickAddToCart()
	{
		if (isset($_POST['cacc'])) {
			Err::json();
			if (!preg_match('/^[A-Za-z0-9]+$/', $_POST['cacc'])) {
				exit;
			}
			$a = Err::Preg_clean_string(2, $_POST['cacc']);
			unset($_POST['cacc']);
			if (!preg_match('/^[0-9a-zA-Z]+$/', $a)) {
				exit();
			} else {
				$b = selectOne('products', ['p_tok' => $a, 'authorised' => 1, 'published' => 1]);
				if (!is_array($b) && empty($b)) {
					exit();
				} else {
					if ($b['showsizes'] == 1) {
						Err::error(["style" => "b", "message" => "product?product=".str_replace(' ', '-', trim(strip_tags($b['title'])))."&Pdk=".rawurlencode($b['p_tok'])], 'm');
					} else {
						$c = User::__getUser();
						$p = $b['id'];
						$_POST['user_id'] = !isset($c['id']) ? 0 : $c['id'];
						$_POST['product_id'] = $b['id'];
						$_POST['p_tok'] = $b['p_tok'];
						$_POST['cart_tok'] = bin2hex(random_bytes(50));
						$_POST['category_id'] = $b['category_id'];
						$_POST['title'] = $b['title'];
						$_POST['product_badge'] = $b['product_badge'];
						$_POST['amount'] = $b['amount'];
						$_POST['showsizes'] = 0;
						$_POST['qty'] = 1;
						$_POST['total'] = $b['amount'] * $_POST['qty'];
						$_POST['image1'] = $b['image1'];
						$_POST['image2'] = $b['image2'];
						$_POST['image3'] = $b['image3'];
						$_POST['user_ip'] = UserInfo::get_ip();
						$_POST['device'] = UserInfo::get_device();
						$_POST['os'] = UserInfo::get_os();
						$_POST['browser'] = UserInfo::get_browser();
						$_POST['discount'] = $b['discount'];
						$_POST = Err::Preg_clean_array_input(4,$_POST);
						$_POST = Err::htmlentity($_POST);
						if (!isset($_SESSION['cart'])) { 
							$d = create('cart', $_POST);
							$e = selectOne('cart', ['id' => $d]);
							if (!empty($e)) {
								$f = self::carts($e);
								if (!empty($f) && is_array($f)) {
									$_SESSION['cart'][] = self::carts($e);
									Err::error(["pattern" => "animate__heartBeat", "style" => "a", "message" => "Cart added"], 'm');
								}
							}
						} else {
							$g = self::Session();
							$h = array();
							foreach ($g as $i) {
								$i = Err::Preg_clean_string(2, $i);
								if (preg_match('/^[0-9a-zA-Z]+$/', $i)) {
									$i = htmlentities($i, ENT_QUOTES, 'UTF-8');
									$j = ALLCARTS2($i);
									if (!empty($j)) {
										array_push($h, $j);
									}
								}
							}

							$k = array_column($h, 'product_id', 'cart_tok');
							if (in_array($p, $k)) {
								Err::error(["style" => "a", "message" => "Already added to cart"], 'm');
							}else {
								$d = create('cart', $_POST);
								$e = selectOne('cart', ['id' => $d]);
								if (!empty($e)) {
									$f = self::carts($e);
									if (!empty($f) && is_array($f)) {
										$_SESSION['cart'][] = self::carts($e);
										Err::error(["pattern" => "animate__heartBeat", "style" => "a", "message" => "Cart added"], 'm');
									}
								}
							}
							
						}
					}
				}
			}
			exit;
		}
	}
	private function LoadCart()
	{
		if (isset($_POST['log'])) {
			Err::json();
			$_POST = Err::Preg_clean_array_input(7,$_POST);
			unset($_POST);
			$i = ["status" => "b", "b" => '<div class="text-center text-base mb-5" style="font-size: 2.5rem;"><i class="icon-Shopping-Bag text-muted"></i><p>Your cart is empty </p></div>', "c" => '<div class="text-center text-base my-5" style="font-size: 2.5rem;"><i class="icon-Shopping-Basket text-muted"></i><p>Your cart is empty </p></div>', 'd' => '<div class="text-center my-5" style="font-size: 1.5rem;"><i class="icon-Shopping-Basket text-muted"></i><p>Your cart is empty </p></div>'];
			if (!isset($_SESSION['cart'])) {
				Err::error($i, 'm');
			} else{
				$a = self::Session();
				$e = array();
				foreach ($a as $b => $c) {
					$c = Err::Preg_clean_string(2, $c);
					if (preg_match('/^[0-9a-zA-Z]+$/', $c)) {
						$c = htmlentities($c, ENT_QUOTES, 'UTF-8');
						$d = ALLCARTS2($c);
						if (!empty($d)) {
							$d['key'] = $b;
							array_push($e, $d);
						}
					}
				}
				if(empty($e)) {
					Err::error($i, 'm');
				} else {
					$g = array();
					foreach (self::SESSIONS($e) as $f) {
						array_push ($g,
						array(
							"status" => "a",
							"b" => '
								<div class="col-12">
									<div class="cart-item cart-item-sm">
										<div class="row align-items-center">
											<div class="col-lg-9">
												<div class="media media-product">
													<a href="product?product='.str_replace(' ', '-', trim(strip_tags($f['title']))).'&Pdk='.$f['p_tok'].'"><img src="'. "assets/uploads/" . $f["image1"] .'" alt="Image"></a>
													<div class="media-body">
														<h5 class="media-title">'. html_entity_decode(strip_tags($f["title"])).'</h5>
														<small class="d-block text-muted">Quantity: '. $f["qty"].'</small>
													</div>
												</div>
											</div>
											<div class="col-lg-3 text-center text-lg-right">
												<span class="cart-item-price"><i class="flaticon-nigeria-naira-currency-symbol"></i>'. number_format($f["total"]).'</span>
											</div>
											<span class="cart-item-close delC" id="'.$f['product_id'].'"><i class="icon-x"></i>
											</span>
										</div>
									</div>
								</div>
							', 
							'c' => '
								<div class="cart-item">
									<div class="row align-items-center">
										<div class="col-12 col-lg-6">
											<div class="media media-product">
												<a href="product?product='.str_replace(' ', '-', trim(strip_tags($f['title']))).'&Pdk='. rawurlencode($f["p_tok"]).'"><img src="'."assets/uploads/".$f["image1"].'" alt="Image"></a>
												<div class="media-body">
													<h5 class="media-title">'.$f["title"].'</h5>
													<span class="small">Red</span>
												</div>
											</div>
										</div>
										<div class="col-4 col-lg-2 text-center">
											<span class="cart-item-price"><i class="flaticon-nigeria-naira-currency-symbol mr-1"></i>'. number_format($f["amount"]).'</span>
										</div>
										<div class="col-4 col-lg-2 text-center">
											<div class="counter">
												<span class="counter-minus icon-minus" field="qty-1">
													<input type="hidden" value="'.$f["id"].'">
												</span>
												<input type="text" name="qty-1" class="counter-value" value="'.$f["qty"].'" id="'.$f["id"].'" min="1" max="10">
												<span class="counter-plus icon-plus" field="qty-1">
													<input type="hidden" value="'.$f["id"].'">
												</span>
											</div>
										</div>
										<div class="col-4 col-lg-2 text-center">
											<span class="cart-item-price"><i class="flaticon-nigeria-naira-currency-symbol mr-1"></i>'.number_format($f["total"]).'</span>
										</div>
										<span class="cart-item-close delC" id="'.$f['product_id'].'"><i class="icon-x"></i></span>
									</div>
								</div>',
							'd' => '
								<ul class="list-group list-group-line border-bottom py-1">
									<li class="list-group-item d-flex justify-content-between text-dark align-items-center">'. $f['title'].' '. $f['qty'].'X <span>'.number_format($f['total']).'</span></li>
								</ul>
							'
					));
					}
					Err::error($g, 's'); 
				}
			}
		    exit();
		}
	}
	public static function CheckoutCarts()
	{
		if (isset($_POST['Smc'])) {
			Err::json();
			$_POST = Err::Preg_clean_array_input(7,$_POST);
			unset($_POST);
			if (!isset($_SESSION['cart'])) {
				Err::error(["status" => "error", "message" => '<div class="text-center" style="font-size: 1.5rem;"><i class="icon-Shopping-Basket text-muted"></i><p>Your cart is empty </p></div>'], 'm');
			}else {
				$a = self::Session();
				$b = array();
				foreach ($a as $c) {
					$c = Err::Preg_clean_string(2, $c);
					if (preg_match('/^[0-9a-zA-Z]+$/', $c)) {
						$c = htmlentities($c, ENT_QUOTES, 'UTF-8');
						$d = ALLCARTS2($c);
						if (!empty($d)) {
							$d['key'] = $c;
							array_push($b, $d);
						}
					}
				}
				if(empty($b)) {
					Err::error(["status" => "error", "message" => '<div class="text-center" style="font-size: 1.5rem;"><i class="icon-Shopping-Basket text-muted"></i><p>Your cart is empty </p></div>'], 'm');
				}else {
					$f = array();
					foreach(array_slice(self::SESSIONS($b), 0, 10) as $e) {
						array_push($f, array("status" => "success", "message" => '
							<ul class="list-group list-group-line border-bottom pb-1">
								<li class="list-group-item d-flex justify-content-between text-dark align-items-center">
									'. $e['title'].' '. $e['qty'].'X
									<span class="flaticon-nigeria-naira-currency-symbol">'. number_format($e['total']).'</span>
								</li>
							</ul>
							'));
					}
					Err::error($f, 's');
				}
			}
			exit();
		}
	}
	private function Amount()
	{
		if (isset($_POST['tt'])) {
			Err::json();
			$_POST = Err::Preg_clean_array_input(7,$_POST);
			unset($_POST);
			$z = '0.00';
			$i = 0;
			if (!isset($_SESSION['cart'])) {
				Err::error(array("status" => "b", "d" => $z, "e" => $i), 's');
			}else {
				$a = self::Session();
				$b = array();
				foreach ($a as $c => $d) {
					$d = Err::Preg_clean_string(2, $d);
					if (preg_match('/^[0-9a-zA-Z]+$/', $d)) {
						$d = htmlentities($d, ENT_QUOTES, 'UTF-8');
						$e = ALLCARTS2($d);
						if (!empty($e)) {
							$e['key'] = $c;
							array_push($b, $e);
						}
					}
				}
				if (empty($b)) {
					Err::error(array("status" => "b", "d" => $z, "e" => $i), 's');
				}else {
					$g = 1500;
					$f = 0;
					foreach ($b as $h) {
						$f += $h['total'];
						$i += $h['qty'];
					}
					if ($f == 0) {
						Err::error(array("status" => "b", "d" => $z, "e" => $i), 's');
					}else {
						Err::error(array("status" => "a", "b" =>  number_format($f + $g),"c" =>  number_format($f), 'd' => $i), 's');
					}
				}
			}
			exit();
		}
	}
	private function QuantitiesCal()
	{
		if (isset($_POST['puit'], $_POST['puid'])) {
			Err::json();
			$a = Err::Preg_clean_string(1, $_POST['puid']);
			$b = Err::Preg_clean_string(1, $_POST['puit']);
			unset($_POST);
			$g = 'Sorry something went wrong unable to process your request';
			if (!ctype_digit($b) || !ctype_digit($a)) {
				Err::error(["style" => "m", "message" => User::$unknownError.' Invalid input'], 's');
			} elseif ($b > 10 || $b < 1) {
				exit;
			}else {
				if (!preg_match('/^[0-9]+$/', $a) || !preg_match('/^[0-9]+$/', $b)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
				$f = selectOne('cart', ['id' => $a]);
				if (empty($f)) {
					Err::error(["style" => "m", "message" => User::$unknownError], 's');
				} else {
					$c = htmlentities($f['amount'], ENT_QUOTES, 'UTF-8');
					$c = trim($c);
					if (!preg_match('/^[0-9]+$/', $c)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
					$d = update('cart', $f['id'], ['qty' => $b, 'total' => $c * $b]);
					if ($d) {
						Err::error(["style" => "m", "message" => User::$unknownError], 's');
					} else {
						Err::error(["style" => "l", "message" => "success"], 's');
					}
				}
			}
			die();
		}

		if (isset($_POST['ict'],$_POST['qty'])) {
			Err::json();
			$a = Err::Preg_clean_string(1, $_POST['ict']);
			$b = Err::Preg_clean_string(1, $_POST['qty']);
			unset($_POST);
			if (!ctype_digit($b) || !ctype_digit($a)) {
				Err::error(["style" => "m", "message" => User::$unknownError.' Invalid input'], 's');
			}elseif ($b > 10 || $b < 1) {
				exit;
			}else {
				if (!preg_match('/^[0-9]+$/', $a) || !preg_match('/^[0-9]+$/', $b)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
				$i = selectOne('cart', ['id' => $a]);
				if (empty($i)) {
					Err::error(array("style" => "m", "message" => User::$unknownError), 's');
				} else {
					$c = htmlentities($i['amount'], ENT_QUOTES, 'UTF-8');
					$c = trim($c);
					if (!preg_match('/^[0-9]+$/', $c)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
					$d = update('cart', $a, ['qty' => $b, 'total' => $c * $b]);
					if ($d) {
						Err::error(["style" => "m", "message" => User::$unknownError], 's');
					} else {
						Err::error(["style" => "l", "message" => "success"], 's');
					}
				}
			}
			exit();
		}
		if (isset($_POST['dct'],$_POST['dty'])) {
			Err::json();
			$a = Err::Preg_clean_string(1, $_POST['dct']);
			$b = Err::Preg_clean_string(1, $_POST['dty']);
			unset($_POST);
			if (!ctype_digit($b) || !ctype_digit($a)) {
				Err::error(["style" => "m", "message" => User::$unknownError.' Invalid input'], 's');
			} elseif ($b > 10 && $b < 0) {
				exit;
			}else {
				if (!preg_match('/^[0-9]+$/', $a) || !preg_match('/^[0-9]+$/', $b)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
				$i = selectOne('cart', ['id' => $a]);
				if (empty($i)) {
					Err::error(["style" => "m", "message" => User::$unknownError], 's');
				} else {
					$c = htmlentities($i['amount'], ENT_QUOTES, 'UTF-8');
					$c = trim($c);
					if (!preg_match('/^[0-9]+$/', $c)) Err::error(["style" => "m", "message" => User::$unknownError], 's');
					$d = update('cart', $a, ['qty' => $b, 'total' => $c * $b]);
					if ($d) {
						Err::error(["style" => "m", "message" => User::$unknownError], 's');
					} else {
						Err::error(["style" => "l", "message" => "success"], 's');
					}
				}
			}
			exit();
		}

		if (isset($_POST['del'],$_POST['isConfirmed'])) {
			Err::json();
			$e = array("type" => "error", "status" => "e", "response" => "Unknown error! Sorry unable to delete item.");
			if (!preg_match('/^[0-9]+$/', $_POST['del'])) {
				Err::error($e, 's');
			} else {
				$a = Err::Preg_clean_string(1, $_POST['del']);
				$b = Err::Preg_clean_string(2, $_POST['isConfirmed']['value']);
				unset($_POST);
				if (!ctype_digit($a)) {
					Err::error($e, 's');
				}elseif ($b !== 'true') {
					Err::error(array("type" => "error", "status" => "e", "response" => "Cancelled Successfully."), 's');
				}elseif (!isset($_SESSION['cart'])) {
					Err::error($e, 's');
				}else {
					$c = array_column($_SESSION['cart'], 'p', 'id');
					$d = array_column($_SESSION['cart'], 'p');
					self::Delete($a, $c, $d, $e);
				}
			}

			exit();
		}
	}
	private static function Delete($a, $b, $c, $err){
		if (!isset($_SESSION['cart']) || !is_array($b) || empty($b) || !is_array($c) || empty($c)) {
			Err::error($err, 's');
		}
		$d = array();
		foreach($b as $e => $f)
		{
			$d[$f][] = $e;
		}
		if (empty($d)) {
			Err::error($err, 's');
		} else {
			$g = array();
			foreach ($c as $h => $i) {
				if ($i == $a) {
					$g[$h] = $i;
				}
			}
			if (empty($g)) {
				Err::error($err, 's');
			} else {
				$j = array();
				foreach ($d as $k => $l) {
					if ($k == $a) {
						foreach ($l as $m) {
							$j[] = selectOne('cart', ['id' => $m, 'product_id' => $k]);
						}
					}
				}
				if (empty($j)) {
					Err::error($err, 's');
				} else {
					foreach ($j as $n => $o) {
						if (empty($o)) {
							unset($j[$n]);
						}
					}
					$p = array_column($j, 'id');
					if (empty($p)) {
						Err::error($err, 's');
					}
					foreach ($p as $q) {
						if (!isset($q)) {
							$r = true;
						} else {
							foreach ($g as $s => $t) {
								if (array_key_exists($s, $_SESSION['cart'])) {
									unset($_SESSION['cart'][$s]);
								}
							}
							if (!isset($r)) {
								delete('cart', $q);
							}
						}
					}
					if (isset($r) && $r == true) {
						Err::error($err, 's');
					}else {
						$_SESSION['cart'] = array_merge($_SESSION['cart']);
						Err::error(["type" => "success", "status" => "s", "response" => "Your item has been deleted.", "res" => "Deleted!"], 's');
					}
				}
			}
		}
	}
    
}

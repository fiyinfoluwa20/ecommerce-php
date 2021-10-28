<?php
header("X-XSS-Protection: 1; mode=block");
session_name('4sjdjFYGSHkdk67648ncncJNNDj47477474nfn');
session_start();
require (ROOT . "/app/controller/Userinfo.php");
require (ROOT . "/app/controller/email.php");
require (ROOT . "/app/auth/function.php");
require 'user.php';
require 'products.php';
require 'carts.php';

class Auth extends User
{
	private const table = 'users';
	private $checkoutmodal;
	public static $auths = array();
    public function __auth()
    {
        $this->Register();
        $this->Login();
		$this->__authuser();
    }
    private function loginUser($user)
	{
		$_SESSION['token'] = $user['auth'];
	}
	protected function Register()
	{
		if (isset($_POST['flop'])) {
			Err::json();
			$_POST = Err::Preg_clean_array_input(6, $_POST, 'password', 'passwordcnf');
			$a = Err::Register($_POST);
			if (!empty($a)) {
				Err::error($a, 's');
			}else{
				unset($_POST['flop'], $_POST['passwordcnf']);
				$_POST['firstname'] = $_POST['firstname'];
				$_POST['lastname'] = $_POST['lastname'];
				$_POST['email'] = $_POST['email'];
				$_POST['password'] = $_POST['password'];
				$_POST['ip'] = UserInfo::get_ip();
				$_POST['device'] = UserInfo::get_device();
				$_POST['os'] = UserInfo::get_os();
				$_POST['browser'] = UserInfo::get_browser();
				$_POST['verified'] = 0;
				$_POST['subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
				$_POST['terms'] = isset($_POST['terms']) ? 1 : 0;
				$_POST['token'] = bin2hex(random_bytes(60));
				$_POST['auth'] = bin2hex(random_bytes(40));
				$_POST = Err::Preg_clean_array_input(6, $_POST, 'password');
				$_POST = Err::htmlentity($_POST);
				$b = html_entity_decode($_POST['email']);
				$c = $_POST['token'];
				if ($_POST['terms'] == 0) {
					Err::error(array("t" => Err::a, "s" => "a", "m" => "Please accept terms and conditions"), 'm');
				}else {
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					if (function_exists("Email")) {
						Email($b, $c);
					} else {
						Err::error(array("t" => "error", "s" => "c", "m" => "Unable to send a mail, please check your network connectivity or try again later"), 'm');
					}
					$d = create(self::table, $_POST);
					$e = selectOne(self::table, ['id' => $d]);
					if (empty($e)) {
						Err::error(array("t" => Err::a, "s" => "a", "m" => "Failed to register, please try again later"), 'm');
					}else {
						$f = date("Y-m-d H:i:s");
						$g = new DateTime($e['created_at']);
						$h = new DateTime($f);
						$i = $g->diff($h);
						if($i->i >= 1) {
							if($i->i == 1) {
								$j = $i->i . " minute ago";
							}
							else {
								$j = $i->i . " minutes ago";
							}
						}
						else {
							if($i->s < 30) {
								$j = "Just now";
							}
							else {
								$j = $i->s . " seconds ago";
							}
						}
						$_SESSION['message'] = 'You have successfully created an account';
						$_SESSION['type'] = 'bg-success';
						$_SESSION['time'] = $j;
						$this->loginUser($e);
						$k = time() + (3600 * 24);
						$l = $_SERVER['HTTP_HOST'] != 'localhost' ? $_SERVER['HTTP_HOST'] : false;
						setcookie("am_d", $e['auth'], $k, '/', $l, false);
						setcookie("am_r", true, $k, '/', $l, false);
						if (isset($_GET['redirect'])) {
							if (preg_match("/\b(?:(?:https?|http):\/\/|www\.)[-a-zA-Z0-9&\/.%?=:]*[-a-zA-Z0-9&\/.%?=:]/i", Err::url('r'))) {
								$i = Err::url('r');
							}
						}
						if (isset($z)) {
							Err::error(array("s" => "b", "m" => $z), 'm');
						} else {
							Err::error(array("s" => "b", "m" => "index"), 'm');
						}
					}
				}
				
			}
			exit();
		}
	}
	protected function Login()
	{
		if (isset($_POST['floi'])) {
			Err::json();
			unset($_POST['floi']);
			$_POST = Err::Preg_clean_array_input(6, $_POST, 'password');
			$a = Err::Login($_POST);
			if (!empty($a)) {
				Err::error($a, 's');
			}else {
				$_POST['remember'] = isset($_POST['remember']) ? 1 : 0;
				$_POST['email'] = $_POST['email'];
				$_POST['password'] = $_POST['password'];
				$_POST = Err::Preg_clean_array_input(6, $_POST, 'password');
				$_POST = Err::htmlentity($_POST);
				$b = selectOne(self::table, ['email' => $_POST['email']]);
				$c = array("t" => Err::a, "s" => "a", "m" => "You have just filled in a wrong credentials please check and fill in again");
				if (empty($b)) {
					Err::error($c, 'm');
				} else {
					if ($b['email'] == $_POST['email'] && password_verify($_POST['password'], $b['password'])) {
						$up1 = update(self::table, $b['id'],['auth' => bin2hex(random_bytes(40))]);
						if ($up1) {
							Err::error(["t" => Err::a, "s" => "a", "m" => User::$unknownError], 'm');
						}
						$h = selectOne(self::table,['id' => $b['id']]);
						if (empty($h)) {
							Err::error($c, 'm');
						}else {
							if ($_POST['remember'] == 1) {
								$f = time() + (3600 * 24 * 30);
								$g = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
								setcookie("am_d", $h['auth'], $f, '/', $g, false);
								setcookie("am_r", 1, $f, '/', $g, false);
							}
							$this->loginUser($h);
							if ($_POST['remember'] == 0) {
								if (isset($_COOKIE['am_d'])) {
									unset($_COOKIE['am_d']);
									setcookie('am_d', "" ,time()-1, '/');
								}
								if (isset($_COOKIE['am_r'])) {
									unset($_COOKIE['am_r']);
									setcookie('am_r', "" ,time()-1, '/');
								}
							}
							$_SESSION['message'] = 'You are now logged in';
							$_SESSION['type'] = 'bg-success';
							if (isset($_GET['redirect'])) {
								if (preg_match("/\b(?:(?:https?|http):\/\/|www\.)[-a-zA-Z0-9&\/.%?=:]*[-a-zA-Z0-9&\/.%?=:]/i", Err::url('r'))) {
									$i = Err::url('r');
								}
							}
							if (isset($GLOBALS['checkoutmodal'])) {
								Err::error(array("t" => "success", "n" => (isset(self::__getUser()['firstname']) ? self::__getUser()['firstname'] : ''), "s" => "c", "m" => "You are now logged in"), 'm');
							} else {
								if (isset($i)) {
									Err::error(array("s" => "b", "m" => $i), 'm');
								} else {
									Err::error(array("s" => "b", "m" => "index"), 'm');
								}
							}
						}
					} else {
						Err::error($c, 'm');
					}
				} 
			}
			exit();
		}
	}
	private function __authuser() 
	{
		$a = $this->__getUser();
		if (empty($a['user'])) {
			self::$auths['firstname'] = '';
			self::$auths['lastname'] = '';
			self::$auths['email'] = '';
			self::$auths['town'] = '';
			self::$auths['username'] = '';
			self::$auths['address'] = '';
			self::$auths['subscribe'] = '';
			self::$auths['phone_number'] = '';
			self::$auths['state'] = '';
			self::$auths['country'] = '';
			self::$auths['company'] = '';
		} else {
			self::$auths['firstname'] = html_entity_decode($a['user']['firstname']);
			self::$auths['lastname'] = html_entity_decode($a['user']['lastname']);
			self::$auths['email'] = html_entity_decode($a['user']['email']);
			self::$auths['town'] = $a['user']['town'] == 'empty' ? '' : html_entity_decode($a['user']['town']);
			self::$auths['address'] = $a['user']['address'] == 'empty' ? '' : html_entity_decode($a['user']['address']);
			self::$auths['subscribe'] = html_entity_decode($a['user']['subscribe']);
			self::$auths['phone_number'] = $a['user']['phone_number'] == 'empty' ? '' : html_entity_decode($a['user']['phone_number']);
			self::$auths['state'] = $a['user']['state'] == 'empty' ? '' :  strtoupper(html_entity_decode($a['user']['state']));
			self::$auths['country'] = $a['user']['country'] == 'empty' ? '' : html_entity_decode($a['user']['country']);
			self::$auths['company'] = $a['user']['company'] == 'empty' ? '' : html_entity_decode($a['user']['company']);
		}
		self::state();
		$this->__state();
		self::address();
		self::town();
	}
	public static function town()
	{
		$a = array();
		$a['a'] = 0;
		if (array_key_exists(self::$auths['state'], self::address())) {
			$b = self::address()[self::$auths['state']];
			foreach ($b as $v) {
				if (strtoupper($v) == strtoupper(self::$auths['town'])) {
					$a['attribute'] = 'selected';
					$a['a'] = 1;
					array_push($a, "<option value='".$v."'".$a['attribute'].">".$v."</option>");
				} else {
					$a['attribute'] = '';
					array_push($a, "<option value='".$v."'".$a['attribute'].">".$v."</option>");
				}
			}
		}
		return $a;
	}
	private static function address()
	{
		$b['Abia'] = ['Arochukwu', 'Ini', 'Obi Ngwa', 'Umuahia South', 'Umuahia North', 'Ikwuano', 'Isiukwato', 'Ukwa West', 'Aba South', 'Aba North', 'Isiala Ngwa North', 'Isiala Ngwa South', 'Obingwa', 'Umunneochi', 'Ugwunagbo', 'Ukwa East'];
		$b['Adamawa'] = ['Demsa','Fufore','Ganye','Girei','Gombi','Guyuk','Hong','Jada','Lamurde','Madagali','Maiha','Mayo-Belwa','Michika','Mubi North','Mubi South','Numan','Shelleng','Song','Toungo','Yola North','Yola South'];
		$b['Akwa Ibom'] = ['Abak','Eastern Obolo','Eket','Esit-Eket','Essien Udim','Etim-Ekpo','Etinan','Ibeno','Ibesikpo-Asutan','Ibiono-Ibom','Ika','Ikono','Ikot Abasi','Ikot Ekpene','Ini','Itu','Mbo','Mkpat-Enin','Nsit-Atai','Nsit-Ibom','Nsit-Ubium','Obot-Akara','Okobo','Onna','Oron','Oruk Anam','Ukanafun','Udung-Uko','Uruan','Urue-Offong/Oruko','Uyo'];
		$b['Anambra'] = ['Aguata','Awka North','Awka South','Anambra East','Anambra West','Anaocha','Ayamelum','Dunukofia','Ekwusigo','Idemili North','Idemili South','Ihiala','Njikoka','Nnewi North','Nnewi South','Ogbaru','Onitsha North','Onitsha South','Orumba North','Orumba South','Oyi'];
		$b['Bauchi'] = ['Bauchi','Tafawa Balewa','Dass','Toro','Bogoro','Ningi','Warji','Ganjuwa','Kirfi','Alkaleri','Darazo','Misau','Giade','Shira','Jama’are','Katagum','Itas/Gadau','Zaki','Gamawa','Damban'];
		$b['Bayelsa'] = ['Brass','Ekeremor','Kolokuma/Opokuma','Nembe','Ogbia','Sagbama','Southern Ijaw','Yenagoa'];
		$b['Benue'] = ['Ado','Agatu','Apa','Buruku','Gboko','Guma','Gwer East','Gwer West','Katsina-Ala','Konshisha','Kwande','Logo','Makurdi','Obi','Ogbadibo','Ohimini','Oju','Okpokwu','Otukpo','Tarka','Ukum','Ushongo','Vandeikya'];
		$b['Borno'] = ['Maiduguri','Ngala','Kala/Balge','Mafa','Konduga','Bama','Jere','Dikwa','Shani','Nganzai','Askira/Uba','Bayo','Biu','Chibok','Damboa','Gwoza','Hawul','Kwaya Kusar','Monguno','Abadam','Gubio','Guzamala','Kaga','Kukawa','Magumeri','Marte','Mobbar'];		
		$b['Cross River'] = ['Abi','Akamkpa','Akpabuyo','Bekwarra','Bakassi','Biase','Boki','Calabar Municipal','Calabar South','Etung','Ikom','Obanliku','Obubra','Obudu','Odukpani','Ogoja','Yakuur','Yala'];
		$b['Delta'] = ['Ethiope East','Ethiope West','Okpe','Sapele','Udu','Ughelli North','Ughelli South','Uvwie','Ukwuani','Aniocha North','Aniocha South','Ika North East','Ika South','Ndokwa East','Ndokwa West','Oshimili North','Oshimili South','Bomadi','Burutu','Isoko North','Isoko South','Patani','Warri North','Warri South','Warri South West'];
		$b['Ebonyi'] = ['Abakaliki','Afikpo North','Afikpo South','Ebonyi','Ezza North','Ezza South','Ikwo','Ishielu','Ivo','Izzi','Ohaozara','Ohaukwu','Onicha'];
		$b['Edo'] = ['Akoko-Edo','Egor','Esan Central','Esan North-East','Esan South-East','Esan West','Etsako Central','Etsako East','Etsako West','Igueben','Ikpoba-Okha','Oredo','Orhionmwon','Ovia North-East','Ovia South-West','Owan East','Owan West','Uhunmwonde'];
		$b['Ekiti'] = ['Ado-Ekiti','Ikere','Oye','Aiyekire','Efon','Ekiti East','Ekiti South-West','Ekiti West','Emure','Ido-Osi','Ijero','Ikole','Ilejemeje','Irepodun/Ifelodun','Ise/Orun','Moba'];
		$b['Enugu'] = ['Aninri','Awgu','Enugu East','Enugu North','Enugu South','Ezeagu','Igbo Etiti','Igbo Eze North','Igbo Eze South','Isi Uzo','Nkanu East','Nkanu West','Nsukka','Oji River','Udenu','Udi','Uzo-Uwani'];
		$b['Gombe'] = ['Akko','Balanga','Billiri','Dukku','Funakaye','Gombe','Kaltungo','Kwami','Nafada','Shongom','Yamaltu/Deba'];
		$b['Imo'] = ['Aboh Mbaise','Ahiazu Mbaise','Ehime Mbano','Ezinihitte Mbaise','Ideato North','Ideato South','Ihitte/Uboma','Ikeduru','Isiala Mbano','Isu','Mbaitoli','Ngor Okpala','Njaba','Nkwerre','Nwangele','Obowo','Oguta','Ohaji/Egbema','Okigwe','Onuimo','Orlu','Orsu','Oru East','Oru West','Owerri Municipal','Owerri North','Owerri West'];
		$b['jigawa'] = ['Auyo','Babura','Biriniwa','Birnin Kudu','Buji','Dutse','Gagarawa','Garki','Gumel','Guri','Gwaram','Gwiwa','Hadejia','Jahun','Kafin Hausa','Kaugama','Kazaure','Kiri Kasama','Kiyawa','Maigatari','Malam Madori','Miga','Ringim','Roni','Sule Tankarkar','Taura','Yankwashi'];
		$b['kaduna'] = ['Birnin Gwari','Chikun','Giwa','Igabi','Ikara','Jaba','Jema\'a','Kachia','Kaduna North','Kaduna South','Kagarko','Kajuru','Kaura','Kauru','Kubau','Kudan','Lere','Makarf','Sabon Gari','Sanga','Soba','Zangon Kataf','Zaria'];
		$b['kano'] = ['Fagge','Dala','Gwale','Kano Municipal','Tarauni','Nassarawa','Kumbotso','Ungogo','Dawakin Tofa','Tofa','Rimin Gado','Bagwai','Gezawa','Gabasawa','Minjibir','Dambatta','Makoda','Kunchi','Bichi','Tsanyawa','Shanono','Gwarzo','Karaye','Rogo','Kabo','Bunkure','Kibiya','Rano','Tudun Wada','Doguwa','Madobi','Kura','Garun Mallam','Bebeji','Kiru','Sumaila','Garko','Takai','Albasu','Gaya','Ajingi','Wudil','Warawa','Dawakin Kudu'];  /////////////
		$b['katsina'] = ['Batagarawa','Bindawa','Rimi','Charanchi','Bakori','Danja','Funtua','Jibiya','Batsari','Kankara','Kankia','Faskari','Malumfashi','Kafur','Kurfi','Matazu','Musawa','Dan-Musa','Safana','Dutsin-Ma','Dandume','Baure','Katsina','Mani','Kusada','Sabuwa','Mashi','Zango','Sandamu','Daura','Madawa','Ingawa','Kaita','Dutse'];
		$b['kebbi'] = ['Aleiro','Arewa Dandi','Argungu','Augie','Bagudo','Birnin Kebbi','Bunza','Dandi','Fakai','Gwandu','Jega','Kalgo','Koko/Besse','Maiyama','Ngaski','Sakaba','Shanga','Suru','Wasagu','Yauri','Zuru'];
		$b['kogi'] = ['Adavi','Ajaokuta','Ankpa','Bassa','Dekina','Ibaji','Idah','Igalamela-Odolu','Ijumu','Kabba/Bunu','Koton Karfe','Lokoja','Mopa-Muro','Ofu','Ogori/Magongo','Okehi','Okene','Olamaboro','Omala','Yagba East','Yagba West'];
		$b['kwara'] = ['Asa','Baruten','Edu','Ekiti','Ifelodun','Ilorin East','Ilorin South','Ilorin West','Irepodun','Isin','Kaiama','Moro','Offa','Oke Ero','Oyun','Pategi'];
		$b['Lagos'] = ['Agege','Ajeromi/Ifelodun','Alimosho','Amuwo-Odofin','Apapa','Badagry','Epe','Eti-Osa','Ibeju/Lekki','Ifako-Ijaye','Ikeja','Ikorodu','Kosofe','Lagos Island','Lagos Mainland','Mushin','Ojo','Oshodi/Isolo','Somolu','Surulere'];
		$b['Nasarawa'] = ['Karu','Keffi','Kokona','Nasarawa','Toto','Akwanga','Eggon','Wamba','Awe','Doma','Keana','Lafia','Obi'];
		$b['Niger'] = ['Agaie','Agwara','Bida','Borgu','Bosso','Chanchaga','Edati','Gbako','Gurara','Katcha','Kontagora','Lapai','Lavun','Magama','Mariga','Mashegu','Mokwa','Munya','Paikoro','Rafi','Rijau','Shiroro','Suleja','Tafa','Wushishi']; 
 		$b['Ogun'] = ['Abeokuta North','Abeokuta South','Ado-Odo/Ota','Ewekoro','Ifo','Ijebu East','Ijebu North','Ijebu North East','Ijebu Ode','Ikenne','Imeko Afon','Ipokia','Obafemi Owode','Odogbolu','Odeda','Ogun Waterside','Remo North','Sagamu','Yewa North','Yewa South'];
		$b['Ondo'] = ['Akoko North-East','Akoko North-West','Akoko South-East','Akoko South-West','Akure North','Akure South','Ese Odo','Idanre','Ifedore','Ilaje','Ile Oluji/Okeigbo','Irele','Odigbo','Okitipupa','Ondo East','Ondo West','Ose','Owo'];
		$b['Osun'] = ['Aiyedaade','Aiyedire','Atakunmosa East','Atakunmosa West','Atakunmosa West','Boluwaduro','Boripe','Ede North','Ede South','Egbedore','Ejigbo','Ife Central','Ife East','Ife North','Ife South','Ifedayo','Ila','Ilesa East','Ilesa West','Irepodun','Irewole','Isokan','Iwo','Obokun','Odo Otin','Ola Oluwa','Olorunda','Oriade','Orolu','Osogbo'];
		$b['Oyo'] = ['Afijio','Akinyele','Atiba','Atisbo','Egbeda','Ibadan North','Ibadan North-East','Ibadan North-West','Ibadan South-East','Ibadan South-West','Ibarapa Central','Ibarapa East','Ibarapa North','Ido','Irepo','Iseyin','Itesiwaju','Iwajowa','Kajola','Lagelu','Ogbomosho North','Ogbomosho South','Ogo Oluwa','Olorunsogo','Oluyole','Ona Ara','Orelope','Ori Ire','Oyo East','Oyo West','Saki East','Saki West','Surulere'];
		$b['Plateau'] = ['Barkin Ladi','Bassa','Bokkos','Jos East','Jos North','Jos South','Kanam','Kanke','Langtang North','Langtang South','Mangu','Mikang','Pankshin','Qua\'an Pan','Riyom','Shendam','Wase'];
		$b['Rivers'] = ['Port Harcourt','Obio-Akpor','Okrika','Ogu–Bolo','Eleme','Tai','Gokana','Khana','Oyigbo','Opobo–Nkoro','Andoni','Bonny','Degema','Asari-Toru','Akuku-Toru','Abua–Odual','Ahoada West','Ahoada East','Ogba–Egbema–Ndoni','Emohua','Ikwerre','Etche','Omuma'];
		$b['Sokoto'] = ['Binji','Bodinga','Dange Shuni','Gada','Goronyo','Gudu','Gwadabawa','Illela','Isa','Kebbe','Kware','Rabah','Sabon Birni','Shagari','Silame','Sokoto North','Sokoto South','Tambuwal','Tangaza','Tureta','Wamako','Wurno','Yabo'];
		$b['Taraba'] = ['Ardo Kola','Bali','Donga','Gashaka','Gassol','Ibi','Jalingo','Karim Lamido','Kurmi','Lau','Sardauna','Takum','Ussa','Wukari','Yorro','Zing'];
		$b['Yobe'] = ['Bade','Bursari','Damaturu','Geidam','Gujba','Gulani','Fika','Fune','Jakusko','Karasuwa','Machina','Nangere','Nguru','Potiskum','Tarmuwa','Yunusari','Yusufari'];
		$b['Zamfara'] = ['Anka','Bakura','Birnin Magaji/Kiyaw','Bukkuyum','Bungudu','Chafe','Gummi','Gusau','Kaura Namoda','Maradun','Maru','Shinkafi','Talata Mafara','Zurmi'];
		$b['FCT'] = ['Abaji','Abuja','Gwagwalada','Kuje','Kwali'];
		foreach ($b as $k => $v) {
			$k = strtoupper($k);
			$c[$k] = $v;
		}
		return $c;
	}
	public static function state()
	{
        $b['Abia'] = ['value'=> 'Abia','attribute' => '']; 
        $b['Adamawa'] = ['value'=> 'Adamawa','attribute' => '']; 
        $b['Akwa Ibom'] = ['value'=> 'Akwa Ibom','attribute' => '']; 
        $b['Anambra'] = ['value'=> 'Anambra','attribute' => '']; 
        $b['Bauchi'] = ['value'=> 'Bauchi','attribute' => '']; 
        $b['Bayelsa'] = ['value'=> 'Bayelsa','attribute' => '']; 
        $b['Benue'] = ['value'=> 'Benue','attribute' => '']; 
        $b['Borno'] = ['value'=> 'Borno','attribute' => '']; 
        $b['Cross River'] = ['value'=> 'Cross River','attribute' => '']; 
        $b['Delta'] = ['value'=> 'Delta','attribute' => '']; 
        $b['Ebonyi'] = ['value'=> 'Ebonyi','attribute' => '']; 
        $b['Edo'] = ['value'=> 'Edo','attribute' => '']; 
        $b['Ekiti'] = ['value'=> 'Ekiti','attribute' => '']; 
        $b['Enugu'] = ['value'=> 'Enugu','attribute' => '']; 
        $b['Gombe'] = ['value'=> 'Gombe','attribute' => '']; 
        $b['Imo'] = ['value'=> 'Imo','attribute' => '']; 
        $b['Jigawa'] = ['value'=> 'Jigawa','attribute' => '']; 
        $b['Kaduna'] = ['value'=> 'Kaduna','attribute' => '']; 
        $b['Kano'] = ['value'=> 'Kano','attribute' => '']; 
        $b['Katsina'] = ['value'=> 'Katsina','attribute' => '']; 
        $b['Kebbi'] = ['value'=> 'Kebbi','attribute' => '']; 
        $b['Kogi'] = ['value'=> 'Kogi','attribute' => '']; 
        $b['Kwara'] = ['value'=> 'Kwara','attribute' => '']; 
        $b['Lagos'] = ['value'=> 'Lagos','attribute' => '']; 
        $b['Nasarawa'] = ['value'=> 'Nasarawa','attribute' => '']; 
        $b['Niger'] = ['value'=> 'Niger','attribute' => '']; 
        $b['Ogun'] = ['value'=> 'Ogun','attribute' => '']; 
        $b['Ondo'] = ['value'=> 'Ondo','attribute' => '']; 
        $b['Osun'] = ['value'=> 'Osun','attribute' => '']; 
        $b['Oyo'] = ['value'=> 'Oyo','attribute' => '']; 
        $b['Plateau'] = ['value'=> 'Plateau','attribute' => '']; 
        $b['Rivers'] = ['value'=> 'Rivers','attribute' => '']; 
        $b['Sokoto'] = ['value'=> 'Sokoto','attribute' => '']; 
        $b['Taraba'] = ['value'=> 'Taraba','attribute' => '']; 
        $b['Yobe'] = ['value'=> 'Yobe','attribute' => '']; 
        $b['Zamfara'] = ['value'=> 'Zamfara','attribute' => '']; 
        $b['FCT'] = ['value'=> 'FCT','attribute' => ''];
		$c = [];
		$c['attribute'] = 0;
		foreach ($b as $v) {
			if (strtoupper($v['value']) == self::$auths['state']) {
				$v['attribute'] = 'selected';
				$c['attribute'] = 1;
				array_push($c, "<option value='".strtoupper($v['value'])."'".$v['attribute'].">".strtoupper($v['value'])."</option>");
			} else {
				array_push($c, "<option value='".strtoupper($v['value'])."'".$v['attribute'].">".strtoupper($v['value'])."</option>");
			}
		}
		return $c;
	}
	private function __state()
	{
		if (isset($_POST['ssd'])) {
			Err::json();
			$a = preg_replace('/[^A-Za-z0-9 ]/', '', $_POST['ssd']);
			unset($_POST);
			$a = htmlentities(strtoupper($a), ENT_QUOTES, 'UTF-8');
			$b = isset(self::address()[$a]) ? self::address()[$a] : die();
			$c = [];
			if (!empty($b) || is_array($b)) {
				foreach ($b as $k => $v) {
					array_push($c, $v);
				}
				Err::error($c,'s');
			}
		}
	}
	public function CheckOut()
	{
		if (isset($_POST['Inv'])) {
			Err::json();
			$a = array();
			if (isset($_SESSION['cart'])) {
				$b = array_column($_SESSION['cart'], 'id');
				foreach ($b as $c) {
					$c = Err::Preg_clean_string(1,$c);
					if (ctype_digit($c)){
						$d = ALLCARTS(Err::htmlentity($c));
						if (!empty($d)) {
							array_push($a, $d);
						}
					}
				}
			}
				
			if (empty($a) || !isset($_SESSION['cart'])) {
				Err::error(array("t" => "error", "p" => "animate__heartBeat", "s" => "b", "m" => "Your cart is empty"),'m');
			} else {
				if (array_key_exists('saveinfo',$_POST)) {
					$_POST['saveinfo'] = isset($_POST['saveinfo']) ? 1 : 0;
				}
				unset($_POST['Inv']);
				$savetolocalstorage = array();
				foreach ($_POST as $key => $value) {
					$savetolocalstorage[$key] = trim($value);
				}
				$_POST = Err::Preg_clean_array_input(6, $_POST);
				$this->A($_POST);
				$e = Err::Invoice($_POST);
				if(!empty($e)) {
					Err::error($e, 's');
				}else {
					$empty =  'empty';
					$one =  1;
					$zero =  0;
					$ss['user_id'] = !isset(self::$user["user"]['id']) ? $zero : self::$user["user"]['id'];
					$ss['firstname_invoice'] = $_POST['firstname_invoice'];
					$ss['lastname_invoice'] = $_POST['lastname_invoice'];
					$ss['email_invoice'] = $_POST['email_invoice'];
					$ss['country_invoice'] = $_POST['country_invoice'];
					$ss['town_invoice'] = $_POST['town_invoice'];
					$ss['state_invoice'] = $_POST['state_invoice'];
					$ss['telephone_invoice'] = str_replace('+', '',  $_POST['telephone_invoice']);
					$ss['company_invoice'] = $_POST['company_invoice'];
					$ss['address_invoice'] = $_POST['address_invoice'];
					$ss['saveinfo'] = isset($_POST['saveinfo']) ? $one : $zero;

					$ss['firstname_shipping'] = $_POST['firstname_shipping'];
					$ss['lastname_shipping'] = $_POST['lastname_shipping'];
					$ss['email_shipping'] = $_POST['email_shipping'];
					$ss['company_shipping'] = $_POST['company_shipping'];
					$ss['town_shipping'] = $_POST['town_shipping'];
					$ss['country_shipping'] = $_POST['country_shipping'];
					$ss['state_shipping'] = $_POST['state_shipping'];
					$ss['address_shipping'] = $_POST['address_shipping'];

					$q = Err::NotEmptyShippingValidation($_POST);
					$ss['inputcount'] = $q;
					$ss['telephone_shipping'] = str_replace('+', '',  $_POST['telephone_shipping']);
					$ss['user_ip'] = UserInfo::get_ip();
					$ss['device'] = UserInfo::get_device();
					$ss['os'] = UserInfo::get_os();
					$ss['browser'] = UserInfo::get_browser();
					$ss['cart_token'] = bin2hex(random_bytes(30));
					$ss['paid_token'] = bin2hex(random_bytes(30));
					$ss['cart_code'] = bin2hex(random_bytes(5));
					$token = bin2hex(random_bytes(20));
					$ss['paid'] = $zero;
					$ss['pending'] = $one;
					$ss['inputcount'] = $q;
					$shipping_address = isset($_POST['shipping_address']) ? $one : $zero;
					$ss = Err::Preg_clean_array_input(6, $ss);
					$ss = Err::htmlentity($ss);
					unset($ss['shipping_address']);

					if ($shipping_address == 1) {
						e:
						$f = Err::Shipping($ss);
						if (!empty($f)) {
							Err::error($f, 's');
						} else {
							if (!isset(self::$user["user"]['id']) && (ctype_digit($ss['saveinfo']) AND $ss['saveinfo'] == 1)) {
								Err::error(array("t" => "error","s" => "d"), 'm');
								exit;
							}
							foreach ($ss as $k => $v) {
								switch ($v) {
									case '':
										unset($ss[$k]);
									break;
								}
							}
							if (isset(self::$user["user"]['id']) && (ctype_digit($ss['saveinfo']) AND $ss['saveinfo'] == 1)) {
								$b = Err::SaveInfoError($ss, self::$user["user"]['id']);
								if (is_int($b)) {
									if ($b > 3) {
										Err::error(array("t" => "error", "s" => "b", "m" => "Sorry similar invoice already exist"),'m');
									}
								}
							}
							$x = create('invoice', $ss);
							$n = selectOne('invoice', ['id' => $x]);
							Err::error(array("s" => "c", "m" => "pay?Vduo=".$n['cart_token']),'m');
						}
						exit;
					} else {
						if ($q > 0) {
							goto e;
							exit;
						}
						if (!isset(self::$user["user"]['id']) && (ctype_digit($ss['saveinfo']) AND $ss['saveinfo'] == 1)) {
							Err::error(array("t" => "error","s" => "d", "m" => $savetolocalstorage), 'm');
						}
						foreach ($ss as $k => $v) {
							switch ($v) {
								case '':
									unset($ss[$k]);
									break;
							}
						}
						if (isset(self::$user["user"]['id']) && (ctype_digit($ss['saveinfo']) AND $ss['saveinfo'] == 1)) {
							$b = Err::SaveInfoError($ss, self::$user["user"]['id']);
							if (is_int($b)) {
								if ($b > 3) {
									Err::error(array("t" => "error", "s" => "b", "m" => "Sorry similar invoice already exist"),'m');
								}
							}
						}
						$cd = create('invoice', $ss);
						if ($cd) {
							$n = selectOne('invoice', ['id' => $cd]);
							Err::error(array("s" => "c", "m" => "pay?Vduo=".$n['cart_token']),'m');
						}
					}
				}
			}
			exit();
		}
	}
	public function A($a)
	{   
		self::$auths['savecheckinput']['name1'] ='dnddn';
		self::$auths['savecheckinput']['lname1'] = $a['lastname_invoice'];
		self::$auths['savecheckinput']['email1'] = $a['email_invoice'];
		self::$auths['savecheckinput']['country1'] = $a['country_invoice'];
		// self::$auths['savecheckinput']['town_invoice'] = $a['town_invoice'];
		// self::$auths['savecheckinput']['state_invoice'] = $a['state_invoice'];
		self::$auths['savecheckinput']['phone1'] = str_replace('+', '',  $a['telephone_invoice']);
		self::$auths['savecheckinput']['company1'] = $a['company_invoice'];
		self::$auths['savecheckinput']['address1'] = $a['address_invoice'];
		self::$auths['savecheckinput']['svi'] = isset($a['saveinfo']) ? 1 : 0;
		self::$auths['savecheckinput']['name2'] = $a['firstname_shipping'];
		self::$auths['savecheckinput']['lname2'] = $a['lastname_shipping'];
		self::$auths['savecheckinput']['email2'] = $a['email_shipping'];
		self::$auths['savecheckinput']['company2'] = $a['company_shipping'];
		// self::$auths['savecheckinput']['town_shipping'] = $a['town_shipping'];
		self::$auths['savecheckinput']['country2'] = $a['country_shipping'];
		// self::$auths['savecheckinput']['state_shipping'] = $a['state_shipping'];
		self::$auths['savecheckinput']['address2'] = $a['address_shipping'];
		self::$auths['savecheckinput']['phone2'] = str_replace('+', '',  $a['telephone_shipping']);
		self::$auths['savecheckinput']['ipc'] = isset($a['shipping_address']) ? 1 : 0;
	}
	public static function ContactForm()
	{
		if (isset($_POST['ContactForm'])) {
			Err::json();
			$dd = Err::ContactForm($_POST);
			if (!empty($dd)) {
				Err::error($dd, "s");
			} else {
				unset($_POST['ContactForm']);
				$_POST['firstName'] = trim(htmlentities($_POST['firstName']));
				$_POST['email'] = trim(htmlentities($_POST['email']));
				$_POST['subject'] = trim(htmlentities($_POST['subject']));
				$_POST['message'] = trim(htmlentities($_POST['message']));
				$_POST['subscribe'] = htmlentities(isset($_POST['subscribe']) ? 1 : 0);
				$_POST['ip'] = htmlentities(UserInfo::get_ip());
				$_POST['device'] = htmlentities(UserInfo::get_device());
				$_POST['os'] = htmlentities(UserInfo::get_os());
				$_POST['browser'] = htmlentities(UserInfo::get_browser());
				create('contact', $_POST);
				$ff = array("style" => "Owell", "name" => $_POST['firstName'], "email" => $_POST['email'], "subject" => $_POST['subject'], "message" => $_POST['message'] . ' ' . Err::url("a"));
				Err::error($ff, "m");
				
			}
			die();
		}
	}
	public function getaddress()
	{
		if (isset($_POST['iad'])) {
			Err::json();
			$o = $_POST['iad'];
			unset($_POST['iad']);
			$i = trim(htmlentities($o));
			if (!preg_match('/^[0-9||a-z||A-Z]+$/', $i)) {
				die();
			}else {
				$v = getuseraddressinfo($i);
				if (!is_array($v)) {
					die();
				} else {
					foreach ($v as $k => $l) {
						switch ($l) {
							case 'empty':
							case 0:
								unset($v[$k]);
								break;
						}
					}
					echo json_encode($v);
				}
			}

			exit();
		}
	}
}

$Auth = new Auth();
$Auth->__auth();
$Carts = new Carts();
$Products = new Products();
$Carts->__cart();
$User = new User();
$User->wishlist();
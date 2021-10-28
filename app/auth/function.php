<?php
require_once "database.php";

function dd($value) {
    echo '<pre>' . print_r($value, true) . '</pre>';
    die();
}
function executeQuery($sql, $data) {
	global $conn;
	$smt = $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat("s", count($values));
	$smt->bind_param($types, ...$values);
	$smt->execute();
	return $smt;
}
function create($table, $data) {
	global $conn;
	$sql = "INSERT INTO $table SET ";
	$i = 0;
	foreach ($data as $key => $value) {
		if ($i === 0) {
			$sql = $sql . "$key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}
	$smt = executeQuery($sql, $data);
	$id = $smt->insert_id;
	return $id;
}
function selectOne($table, $conditions) {
    global $conn;
    $sql = "SELECT * FROM $table";
        $i = 0;
        foreach($conditions as $key => $value) {
            if ($i === 0) {
               $sql = $sql . " WHERE $key=?";
            } else {
               $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $smt = executeQuery($sql, $conditions);
        $records = $smt->get_result()->fetch_assoc();
        return $records;
}
function selectOnes($table, $conditions) {
    global $conn;
    $sql = "SELECT * FROM $table";
        $i = 0;
        foreach($conditions as $key => $value) {
            if ($i === 0) {
               $sql = $sql . " WHERE $key=?";
            } else {
               $sql = $sql . " OR $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $smt = executeQuery($sql, $conditions);
        $records = $smt->get_result()->fetch_assoc();
        return $records;
}
function selectON($table, $conditions) {
    global $conn;
         $sql = "SELECT * FROM $table";
    if ($conditions) {
        $i = 0;
        foreach($conditions as $key => $value) {
            if ($i === 0) {
            $sql = $sql . " WHERE $key=? ";
            } 
            $i++;
        }
        $smt = executeQuery($sql, $conditions);
        $records = $smt->get_result()->fetch_assoc();
        return($records);
    }
}
function update($table, $id, $data) {
    global $conn;
    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach($data as $k => $v) {
        if ($i === 0) {
            $sql = $sql . "$k=?";
        } else {
            $sql = $sql . ",$k=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $smt = executeQuery($sql, $data);
    return $smt->error;
}
function selectAll($table, $conditions = []) {
    global $conn;
         $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
         $smt = $conn->prepare($sql);
         $smt->execute();
         $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
         return($records);
     } else {
        $i = 0;
        foreach($conditions as $key => $value) {
            if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
            } else {
            $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $smt = executeQuery($sql, $conditions);
        $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
        return($records);
    }
}
function delete($table, $id) {
    global $conn;
        $sql = "DELETE FROM $table  WHERE id=?";
        $smt = executeQuery($sql, ['id' => $id]);
        return $smt->affected_rows;
}
function displayPost()
{
    global $conn;
    $sql = "SELECT p.*, c.id AS c_id, c.name, c.description FROM products AS p JOIN categories AS c ON p.category_id=c.id and p.published=c.published WHERE p.authorised=? and p.published=?";
    $smt = executeQuery($sql, ['authorised' => 1, 'published' => 1]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function NewArrivals()
{
    global $conn;
    $sql = "SELECT p.*, c.id AS c_id, c.name, c.description FROM products AS p JOIN categories AS c ON p.category_id=c.id and p.published=c.published WHERE p.authorised=? and p.published=? ORDER BY id DESC";
    $smt = executeQuery($sql, ['authorised' => 1, 'published' => 1]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getproductwithcategory($i)
{
    global $conn;
    $sql = "SELECT p.*, c.id AS c_id, c.name, c.description, c.token FROM products AS p JOIN categories AS c ON p.category_id=c.id and p.published=c.published WHERE p.p_tok=? OR p.title=? AND p.authorised=? AND p.published=?";
    $smt = executeQuery($sql, ['p_tok' => $i, 'title' => $i, 'authorised' => 1, 'published' => 1]);
    $records = $smt->get_result()->fetch_assoc();
    return $records;
}

function displaytrans($url)
{
    global $conn;
    $sql = "SELECT t.*, i.id AS c_id  FROM transaction AS t JOIN invoice AS i ON t.invoice_id=i.id WHERE t.paid=? AND i.paid=? AND t.status=? AND t.transaction_token=?";
    $smt = executeQuery($sql, ['paid' => 1, 'published' => 1, 'status' => 'success', 'transaction_token' => $url]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function useraddress($id)
{
    global $conn;
    $sql = "SELECT i.* FROM invoice AS i join users as u on i.user_id=u.id WHERE i.saveinfo=? AND i.user_id=? AND u.id=?";
    $smt = executeQuery($sql, ['saveinfo' => 1, 'user_id' => $id, 'id' => $id]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getorderbyuser($id)
{
    global $conn;
    $sql = "SELECT t.*, i.cart_code FROM transaction AS t join invoice as i join users as u on t.invoice_id=i.id and t.user_id=u.id WHERE t.user_id=? AND u.id=?";
    $smt = executeQuery($sql, ['user_id' => $id, 'id' => $id]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function getuseraddressinfo($tok)
{
    global $conn;
    $sql = "SELECT i.firstname_invoice, i.lastname_invoice, i.email_invoice, i.country_invoice, i.town_invoice, i.state_invoice, i.telephone_invoice, i.company_invoice, i.address_invoice, i.firstname_shipping, i.lastname_shipping, i.email_shipping, i.country_shipping, i.town_shipping, i.state_shipping, i.telephone_shipping, i.company_shipping, i.address_shipping, i.cart_token, i.inputcount FROM invoice AS i WHERE cart_token=?";
    $smt = executeQuery($sql, ['cart_token' => $tok]);
    $records = $smt->get_result()->fetch_assoc();
    return $records;
}

function wishlistInfo($p_id, $U_id)
{
    global $conn;
    $sql = "SELECT w.* FROM wishlist AS w join users as u join products as p on w.user_id=u.id WHERE w.product_id=? and p.id=? and p.published=? and p.authorised=? and w.user_id=?";
    $smt = executeQuery($sql, ['product_id' => $p_id, 'id' => $p_id, 'published' => 1, 'authorised' => 1, 'user_id' => $U_id]);
    $records = $smt->get_result()->fetch_assoc();
    return $records;
}
function wishlists($U_id)
{
    global $conn;
    $sql = "SELECT w.* FROM wishlist AS w WHERE w.user_id=?";
    $smt = executeQuery($sql, ['user_id' => $U_id]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function ALLCARTS($id)
{
    global $conn;
    $sql = "SELECT c.* FROM cart AS c join products as p on c.product_id=p.id WHERE c.id=?";
    $smt = executeQuery($sql, ['id' => $id]);
    $records = $smt->get_result()->fetch_assoc();
    return $records;
}

function ALLCARTS2($tok)
{
    global $conn;
    $sql = "SELECT c.* FROM cart AS c join products as p on c.product_id=p.id WHERE c.cart_tok=?";
    $smt = executeQuery($sql, ['cart_tok' => $tok]);
    $records = $smt->get_result()->fetch_assoc();
    return $records;
}

function ALLCARTSById($id)
{
    global $conn;
    $sql = "SELECT c.* FROM cart AS c join products as p on c.product_id=p.id WHERE c.id=?";
    $smt = executeQuery($sql, ['id' => $id]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function SumAllCartSById($id)
{
    global $conn;
    $sql = "SELECT SUM(c.qty) FROM cart AS c join products as p on c.product_id=p.id WHERE c.id=?";
    $smt = executeQuery($sql, ['id' => $id]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function getPostsByCategoryId($c)
{
    global $conn;
    $sql = "SELECT p.*, c.id AS c_id, c.name, c.description, c.token FROM products AS p join categories as c ON p.category_id=c.id and p.published=c.published WHERE p.published=? AND c.name=? OR c.token=? ";
    $smt = executeQuery($sql, ['published' => 1, 'name' => $c, 'token' => $c]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function categoriesProducts()
{
    global $conn;
    $sql = "SELECT * FROM products WHERE published=? and authorised=? ORDER BY id DESC LIMIT 200";
    $smt = executeQuery($sql, ['published' => 1, 'authorised' => 1]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function reviews($a, $b)
{
    global $conn;
    $sql = "SELECT r.* FROM reviews AS r join users as u on u.id=r.user_id WHERE r.product_token=? AND u.id=? AND r.approval=? AND r.approved=? ORDER BY id DESC";
    $smt = executeQuery($sql, ['product_token' => $a, "id" => $b, 'approval' => 1, 'approved' => 1]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function searchProducts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT p.*, c.name, c.description FROM products AS p JOIN categories AS c ON p.category_id=c.id WHERE p.published=? AND p.title LIKE ? OR p.body LIKE ? OR c.name LIKE ? OR p.tags LIKE ? OR p.sku LIKE ? OR p.product_badge LIKE ?";
    $smt = executeQuery($sql, ['published' => 1, 'title' => $match , 'body' => $match, 'name' => $match, 'tags' => $match, 'sku' => $match, 'product_badge' => $match]);
    $records = $smt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


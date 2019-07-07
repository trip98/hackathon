<?php 	
namespace app;

trait ModelUser {
	use DB;
	use Encryption;


	public function getRoles() {
		$db = $this->getLink();
		$query = $db->query('SELECT * FROM roles WHERE id != 1');
		$buffer = $query->fetchAll(\PDO::FETCH_ASSOC);
		return $buffer;

	}
	public function addUser($request) {
		$db = $this->getLink();
		$request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
		$buffer = $db->prepare('INSERT INTO users SET name = :name, lastname = :lastname, email = :email, password = :password, _role = 2');
		$query = $buffer->execute($request);
		$id = $db->lastInsertId();
		$_SESSION['user'] = self::encrypt($id);
		return $db->lastInsertId();
	}
	public function entryDb($request) {
		$db = $this->getLink();
		$buffer = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query = $buffer->execute(['email' => $request['email']]);
		$result = $buffer->fetch(\PDO::FETCH_ASSOC);
		if (password_verify($request['password'], $result['password'])) {
            $_SESSION['user'] = self::encrypt($result['id']);
            return true;
        } else {
            return false;
        }
	}

	
}

 ?>
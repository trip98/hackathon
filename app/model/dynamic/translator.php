<?php 	
namespace app;

trait ModelTranslator {
	use DB;
	use Encryption;

	public function getLanguages() {
		$db = self::getLInk();
		$query = $db->query('SELECT * FROM languages');
		$buffer = $query->fetchAll(\PDO::FETCH_ASSOC);
		return $buffer;
	}
	public function addTranslator($request) {
		$languages = json_decode($request['languages']);
		unset($request['languages']);
		$db = $this->getLink();
		$db->beginTransaction();
		$buffer = $db->prepare('INSERT INTO users SET name = :name, lastname = :lastname, email = :email, password = :password, _role = :role');
		$query = $buffer->execute($request);
		$id = $db->lastInsertId();

		foreach ($languages as $value) {
			$buffer = $db->prepare('INSERT INTO language_users SET _user = :id, _language = :language');
			$query = $buffer->execute(['id' => $id, 'language' => $value]);
		}
		

		$_SESSION['user'] = self::encrypt($id);
		$db->commit();
		return $id;
	}
}

 ?>
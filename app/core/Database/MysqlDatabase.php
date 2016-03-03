<?php

namespace Core\Database;

use Core\Config;
use Core\Helper\Debug;
use \PDO;


/**
 * Class Database
 * Permet de manipuler PDO plus simplement
 */
class MysqlDatabase extends Database {

	private $db_name;

	private $host;

	private $port;

	private $user;

	private $password;

	private $pdo;


	public function __construct( $db_name, $host = 'localhost', $user = 'root', $password = 'root', $port = '3306' ) {
		$this->db_name  = $db_name;
		$this->host     = $host;
		$this->user     = $user;
		$this->password = $password;
		$this->port     = $port;
	}


	/**
	 * Récupère l'objet PDO, affiche les erreurs
	 */
	public function getPDO() {

		if ( $this->pdo == null ) {

			$pdo = new PDO(
				"mysql:dbname={$this->db_name};host={$this->host};port={$this->port}",
				$this->user,
				$this->password
			);

			if ( Config::getInstance()->get( 'debug' ) > 0 ) {
				$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}

			$this->pdo = $pdo;
		}

		return $this->pdo;
	} // getPDO()


	/**
	 * Function query()
	 * Renvoie le résultat de la requête
	 *
	 * @param $statement
	 * @param null $classname
	 * @param bool|false $one
	 *
	 * @return array|mixed
	 */
	public function query( $statement, $classname = null, $one = false ) {

		$req = $this->getPDO()->query( $statement );

		if ( $classname === null ) {
			$req->setFetchMode( PDO::FETCH_OBJ );
		} else {
			$req->setFetchMode( PDO::FETCH_CLASS, $classname );
		}

		if ( $one ) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}

		return $data;
	} // query()


	public function insert($statement) {
		$req = $this->getPDO()->query( $statement );
	}


	/**
	 * Function prepare()
	 * Permet d'executer une requête paramétrée
	 *
	 * @param $statement
	 * @param $attributes
	 * @param null $classname
	 * @param bool|false $one
	 *
	 * @return array|mixed
	 */
	public function prepare( $statement, $attributes, $classname = null, $one = false ) {

		$req = $this->getPDO()->prepare( $statement );

		//$req->debugDumpParams ();

		$req->execute( $attributes );

		if ( $classname === null ) {
			$req->setFetchMode( PDO::FETCH_OBJ );
		} else {
			$req->setFetchMode( PDO::FETCH_CLASS, $classname );
		}


		if ( $one ) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}

		return $data;

	} // prepare()


} // Database
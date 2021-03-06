<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/model/Crime.php";
include_once $SERVER_ADRESS."/model/Tempo.php";
include_once $SERVER_ADRESS."/model/Natureza.php";
include_once $SERVER_ADRESS."/persistence/Conexao.php";
include_once $SERVER_ADRESS."/persistence/ConexaoTeste.php";
include_once $SERVER_ADRESS."/persistence/NaturezaDAO.php";
include_once $SERVER_ADRESS."/persistence/TempoDAO.php";

/**
 * Class persistence of Crime
 */
class CrimeDAO{
	
	/**
	 * Variable to instance a object to conect with the database
	 * @var Conexao connection
	 */
	
	private $connection; 
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct( ){
		$this->connection = new Conexao( );
	}

	/**
	 * Specific constructor to unit test
	 */
	public function __constructTeste( ){
		$this->connection = new ConexaoTeste( );

	}
	
	/**
	 * Function to list all crimes
	 * @return Array $crimeReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM crime";
		$result = $this->connection->base->Execute( $sql ); //Show if the result of a function was successful
		while( $register = $result->FetchNextObject( ) )
		{
			$crimeData = new Crime( ); //Instance of Category for use the datas
			$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,
											 $register->NATUREZA_ID_NATUREZA,
											 $register->QUANTIDADE );
			$crimeReturn[] = $crimeData; //Array for return all the categories
		}
		return $crimeReturn;
	}
	
	/**
	 * Function to select one crime by the id
	 * @param int $crimeId
	 * @return String $crimeData
	 */
	public function idFind( $crimeId ){
		$sql = "SELECT * FROM crime WHERE id_crime = '".$crimeId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,
										 $register->NATUREZA_ID_NATUREZA,
										 $register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to select one crime by the nature id
	 * @param int $natureId
	 * @return String $crimeData
	 */
	public function natureFind( $natureId ){
		$sql = "SELECT * FROM crime WHERE nature_id_nature = '".$natureId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,
										 $register->NATUREZA_ID_NATUREZA,
										 $register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to select one crime by the time id
	 * @param int $id
	 * @return String $crimeData
	 */
	public function timeFind( $timeId ){
		$sql = "SELECT * FROM crime WHERE tempo_id_tempo = '".$timeId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,
										 $register->NATUREZA_ID_NATUREZA,
										 $register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to count the number of crimes in a year
	 * @return int $register
	 */
	public function totalYearCrime( $year ){
		$sql = "SELECT SUM(c.quantidade ) as total FROM crime c, 
				tempo t WHERE t.ano = '".$year."' AND c.tempo_id_tempo = t.id_tempo 
				AND c.id_crime BETWEEN 1 AND 341";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of crimes in a nature
	 * @return int $register
	 */
	public function totalNatureCrime( $nature ){
		$sql = "SELECT Sum(c.quantidade ) as total FROM crime c, 
				natureza n WHERE c.natureza_id_natureza = n.id_natureza 
				AND n.natureza = '".$nature."' AND c.id_crime BETWEEN 1 AND 341";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of homicide
	 * @return int $register
	 */
	public function totalMurder( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 1";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of crimes in a nature and a year
	 * @return int $register
	 */
	public function totalNatureInYearCrime( $nature,$year ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n,
				tempo t WHERE c.natureza_id_natureza = n.id_natureza AND 
				c.tempo_id_tempo = t.id_tempo AND t.ano = ".$year." AND 
				n.natureza = '".$nature."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of injuries
	 * @return int $register
	 */
	public function totalInjury( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n WHERE 
				c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 3";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of attempted murder
	 * @return int $register
	 */
	public function totalAttemptedMurder( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n WHERE
				c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 2";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of crimes
	 * @return int $register
	 */
	public function totalCrime( ){
		$sql = "SELECT SUM(total ) as total FROM totalgeralcrimes ";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to insert one crime in the database
	 * @param Crime $crime
	 */
	public function addCrime(Crime $crime ){
		$sql = "INSERT INTO crime (nature_id_natureza,tempo_id_tempo,quantidade,
								   regiao_administrativa_id_regiao_administrativa ) VALUES (
								   '{$crime->__getNatureId( )}','{$crime->__getTimeId( )}',
								   '{$crime->__getAmount( )}','{$crime->__getRaId( )}' )";
		$this->connection->base->Execute( $sql );
	}

}
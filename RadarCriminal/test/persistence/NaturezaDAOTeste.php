<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	
	require_once  "/persistence/NaturezaDAO.php";

	class NaturezaDAOTeste extends PHPUnit_Framework_Testcase{
		
		public function testConstruct(){
			$naturezaDAO = new NaturezaDAO();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
		}
		public function testListarTodas(){
			$naturezaDAO = new NaturezaDAO();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$this->assertNotEmpty($naturezaDAO->listarTodas());
			$this->assertNotNull($naturezaDAO->listarTodas());
		}
		public function testListarTodasAlfabeticamente(){
			$naturezaDAO = new NaturezaDAO();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$this->assertNotEmpty($naturezaDAO->listarTodas());
			$this->assertNotNull($naturezaDAO->listarTodas());
		}
		public function testConsultarPorId(){
			$naturezaDAO = new NaturezaDAO();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$this->assertInstanceOf('Natureza', $naturezaDAO->consultarPorId(1));
		}
		public function testConsultarPorNome(){
			$naturezaDAO = new NaturezaDAO();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$this->assertInstanceOf('Natureza', $naturezaDAO->consultarPorNome('Estupro'));
		}
		
		public function testInserirNatureza(){
			$naturezaDAO = new NaturezaDAO();
			$naturezaDAO->__constructTeste();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$naturezaDAO->inserirNatureza(new Natureza());
		}
		public function testConsultarPorIdCategoria(){
			$naturezaDAO = new NaturezaDAO();
			$naturezaDAO->__constructTeste();
			$this->assertObjectHasAttribute('conexao', $naturezaDAO);
			$this->assertInstanceOf('NaturezaDAO', $naturezaDAO);
			$this->assertArrayHasKey(1,$naturezaDAO->consultarPorIdCategoria(1));
		}
	}

?>
<?php
declare(strict_types=1);

class Jogos{

	private $conexao;

	public function __construct()
	{
		try{
			$this->conexao = new PDO("mysql:host=localhost;dbname=teste_db", "root", "");
		} catch(Exception $e){
			echo $e->getMessage();
			die();
		}
	}

	public function list(): array
	{
		$sql = "select * from jogos";

		$jogos = [];

		foreach($this->conexao->query($sql) as $key => $value){
			array_push($jogos, $value);
		}
		return $jogos;
	}	

	public function insert(
		string $titulo, 
		string $ano,
		string $tipo,
		string $fabricante
	): string
	{
		
		$sql = "insert into jogos(titulo, ano, tipo, fabricante) values(?, ?, ?, ?)";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $titulo);
		$prepare->bindParam(2, $ano);
		$prepare->bindParam(3, $tipo);
		$prepare->bindParam(4, $fabricante);
		$prepare->execute();
		header("Location: index.php");
		
	}

	public function update(
		string $titulo,
		int $id
	): int
	{
		$sql = "update jogos set titulo = ? where id = ?";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $titulo);
		$prepare->bindParam(2, $id);

		$prepare->execute();
		header("Location: index.php");
	}
	
	public function update1(
		string $ano,
		int $id
	): int
	{
		$sql = "update jogos set ano = ? where id = ?";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $ano);
		$prepare->bindParam(2, $id);

		$prepare->execute();
		header("Location: index.php");
	}

	public function update2(
		string $tipo,
		int $id
	): int
	{
		$sql = "update jogos set tipo = ? where id = ?";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $tipo);
		$prepare->bindParam(2, $id);

		$prepare->execute();
		header("Location: index.php");
	}

	public function update3(
		string $fabricante,
		int $id
	): int
	{
		$sql = "update jogos set fabricante = ? where id = ?";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $fabricante);
		$prepare->bindParam(2, $id);

		$prepare->execute();
		header("Location: index.php");
	}

	public function delete(int $id): int
	{
		$sql = "delete from jogos where id = ?";

		$prepare = $this->conexao->prepare($sql);

		$prepare->bindParam(1, $id);
		$prepare->execute();

		//header("Location: index.php");
	}

}

?>
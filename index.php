<?php
//REQUIRE chama o header(cabeçalho) da pasta includes
require "includes/header.php";
//REQUIRE chama o arquivo da classe Jogofps(cabeçalho) da pasta class
require "class/jogofps.class.php";

?>
<!--------------Bloco de código referente à listagem de jogos-------------->

<h4 class="text-center">LISTA DE JOGOS</h4>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-striped mb-0 text-center">
    <thead>
      <tr>
        <th class="p-0" style="background-color:#009999;">ID</th>
        <th class="p-0" style="background-color:#009999;">TÍTULO</th>
        <th class="p-0" style="background-color:#009999;">ANO</th>
        <th class="p-0" style="background-color:#009999;">TIPO</th>
        <th class="p-0" style="background-color:#009999;">FABRICANTE</th>
      </tr>
    </thead>
    <tbody>
<?php
	$jogo1 = new Jogofps();
	
	foreach($jogo1->list() as $value){
		echo "
		<tr><td class='p-0'>" . $value["id"] . "</td>" . 
		"<td class='p-0'>" .    $value["titulo"] . "</td>" . 
		"<td class='p-0'>" .    $value["ano"] . "</td>" . 
		"<td class='p-0'>" .    $value["tipo"] . "</td>" . 
		"<td class='p-0'>" .    $value["fabricante"] . "</td></tr>";
	}
?>
    </tbody>
  </table>
</div>
<!--------------Bloco de código cadastro de jogos-------------->

<div class="row">
    <div class="col"><h5 class="text-center mt-3">CADASTRAR JOGOS</h5>
    	<div class="form-group w-100">
			<form action="index.php" method="post">
				TÍTULO: 	<input class="form-control" type="text" name="titulo">
				ANO: 		<input class="form-control" type="text" name="ano">
				TIPO: 		<input class="form-control" type="text" name="tipo">
				FABRICANTE: <input class="form-control" type="text" name="fabricante">
				<input class="btn mt-3" type="submit" value="CADASTRAR" style="background-color:#009999;color:white;">
			</form>
		</div>
	</div>
<?php
if(!empty($_POST["titulo"]) && !empty($_POST["ano"]) && !empty($_POST["tipo"]) && !empty($_POST["fabricante"])){
	//echo "Erro!!!!!";
	$titulo =     $_POST["titulo"];
	$ano =        $_POST["ano"];
	$tipo =       $_POST["tipo"];
	$fabricante = $_POST["fabricante"];

	$jogo1->insert($titulo,$ano,$tipo,$fabricante);
}
?>
<!--------------Bloco de código atualização das colunas-------------->

	<div class="col"><h5 class="text-center mt-3">ATUALIZAR JOGOS</h5>
    	<div class="form-group w-100">
			<form action="index.php" method="post">
				ID: <input class="form-control p-0" type="number" name="id1">
				<input class="mt-4" type="radio" id="male" name="teste" value="titulo"> TÍTULO<br/>
  				<input type="radio" id="female" name="teste" value="ano"> ANO<br/>
  				<input type="radio" id="other" name="teste" value="tipo"> TIPO<br/>
  				<input class="mb-3" type="radio" id="other" name="teste" value="fabricante"> FABRICANTE<br/>
				NOVO ATRIBUTO: <input class="form-control" type="text" name="novo">
				<input class="btn mt-3" type="submit" value="ATUALIZAR" style="background-color:#009999;color:white;">
			</form>
		</div>
	</div>
<?php
if(!empty($_POST["teste"]) && !empty($_POST["id1"]) && !empty($_POST["novo"])){
	if($_POST["teste"] == "titulo"){

		$id1 = $_POST["id1"];
   		$titulo1 = $_POST["novo"];

    	$jogo1->update($titulo1,$id1);
	}
	if($_POST["teste"] == "ano"){
		
		$id1 = $_POST["id1"];
    	$ano1 = $_POST["novo"];

    	$jogo1->update1($ano1,$id1);
	}
	if($_POST["teste"] == "tipo"){
		
		$id1 = $_POST["id1"];
    	$tipo1 = $_POST["novo"];

    	$jogo1->update2($tipo1,$id1);
	}
	if($_POST["teste"] == "fabricante"){
		
		$id1 = $_POST["id1"];
    	$fabricante1 = $_POST["novo"];

    	$jogo1->update3($fabricante1,$id1);
	}
}
?>	
<!--------------Bloco de código apagar jogos-------------->
    <div class="col"><h5 class="text-center mt-3">APAGAR JOGOS</h5>
    	<div class="col">
			<div class="form-group w-100">
				<form action="index.php" method="post">
					ID: <input class="form-control p-0" type="number" name="id2">
					<input class="btn mt-3" type="submit" value="APAGAR" style="background-color:#009999;color:white;">
				</form>
			</div>
		</div> 
    </div>
</div>    
<?php
if(!empty($_POST["id2"])){
	$id2 = $_POST["id2"];

	$jogo1->delete($id2);
}
//REQUIRE chama o footer(rodaré) da pasta includes

require "includes/footer.php";
?>

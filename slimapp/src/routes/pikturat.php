<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//require '../vendor/autoload.php';
//require 'db.php';

$app = new \Slim\App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
// GET All cutomers
$app->get('/api/pikturat', function (Request $request, Response $response) {
    $sql = 'SELECT * FROM pikturat_smp';
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$pikturat = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($pikturat);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});

// GET Single cutomer
$app->get('/api/piktura/{ID_SMP}', function (Request $request, Response $response) {
	//To get the customer id create variable
	$ID_SMP = $request->getAttribute('ID_SMP');
	
    $sql = "SELECT * FROM pikturat_smp WHERE ID_SMP = '$ID_SMP'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$piktura = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($piktura);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Add cutomer
$app->post('/api/piktura/shto', function (Request $request, Response $response) {
	
	$TitulliPiktures_SMP = $request->getParam('TitulliPiktures_SMP');
	$Piktori_SMP = $request->getParam('Piktori_SMP');
	$StiliPikturimit_SMP = $request->getParam('StiliPikturimit_SMP');
	$DimensioniPiktures_SMP = $request->getParam('DimensioniPiktures_SMP');
	$VitiPikturimit_SMP = $request->getParam('VitiPikturimit_SMP');
	$PershkrimiPiktures_SMP = $request->getParam('PershkrimiPiktures_SMP');
	$CmimiPiktures_SMP = $request->getParam('CmimiPiktures_SMP');
	
    $sql = "INSERT INTO pikturat_smp (TitulliPiktures_SMP, Piktori_SMP, StiliPikturimit_SMP, DimensioniPiktures_SMP, VitiPikturimit_SMP, PershkrimiPiktures_SMP, CmimiPiktures_SMP) 
	VALUES(:TitulliPiktures_SMP, :Piktori_SMP, :StiliPikturimit_SMP, :DimensioniPiktures_SMP, :VitiPikturimit_SMP, :PershkrimiPiktures_SMP, :CmimiPiktures_SMP)";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':TitulliPiktures_SMP',$TitulliPiktures_SMP);
		$stmt->bindParam(':Piktori_SMP',$Piktori_SMP);
		$stmt->bindParam(':StiliPikturimit_SMP',$StiliPikturimit_SMP);
		$stmt->bindParam(':DimensioniPiktures_SMP',$DimensioniPiktures_SMP);
		$stmt->bindParam(':VitiPikturimit_SMP',$VitiPikturimit_SMP);
		$stmt->bindParam(':PershkrimiPiktures_SMP',$PershkrimiPiktures_SMP);
		$stmt->bindParam(':CmimiPiktures_SMP',$CmimiPiktures_SMP);
		
		$stmt->execute();
		echo'{"notice":{"text":"Piktura u Shtua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




// Update cutomer
$app->put('/api/piktura/modifiko/{ID_SMP}', function (Request $request, Response $response) {
	//To get the customer id create variable
	$ID_SMP = $request->getAttribute('ID_SMP');
	$TitulliPiktures_SMP = $request->getParam('TitulliPiktures_SMP');
	$Piktori_SMP = $request->getParam('Piktori_SMP');
	$StiliPikturimit_SMP = $request->getParam('StiliPikturimit_SMP');
	$DimensioniPiktures_SMP = $request->getParam('DimensioniPiktures_SMP');
	$VitiPikturimit_SMP = $request->getParam('VitiPikturimit_SMP');
	$PershkrimiPiktures_SMP = $request->getParam('PershkrimiPiktures_SMP');
	$CmimiPiktures_SMP = $request->getParam('CmimiPiktures_SMP');
    $sql = "UPDATE pikturat_smp SET
	TitulliPiktures_SMP = :TitulliPiktures_SMP,
	Piktori_SMP = :Piktori_SMP,
	StiliPikturimit_SMP = :StiliPikturimit_SMP,
	DimensioniPiktures_SMP = :DimensioniPiktures_SMP,
	VitiPikturimit_SMP = :VitiPikturimit_SMP,
	PershkrimiPiktures_SMP = :PershkrimiPiktures_SMP,
	CmimiPiktures_SMP = :CmimiPiktures_SMP
	WHERE ID_SMP = '$ID_SMP'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':TitulliPiktures_SMP',$TitulliPiktures_SMP);
		$stmt->bindParam(':Piktori_SMP',$Piktori_SMP);
		$stmt->bindParam(':StiliPikturimit_SMP',$StiliPikturimit_SMP);
		$stmt->bindParam(':DimensioniPiktures_SMP',$DimensioniPiktures_SMP);
		$stmt->bindParam(':VitiPikturimit_SMP',$VitiPikturimit_SMP);
		$stmt->bindParam(':PershkrimiPiktures_SMP',$PershkrimiPiktures_SMP);
		$stmt->bindParam(':CmimiPiktures_SMP',$CmimiPiktures_SMP);
		$stmt->execute();
		echo'{"notice":{"text":"Piktura u Modifikua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Delete cutomer
$app->delete('/api/piktura/fshij/{ID_SMP}', function (Request $request, Response $response) {
	//To get the customer id create variable
	$ID_SMP = $request->getAttribute('ID_SMP');
	
    $sql = "DELETE FROM pikturat_smp WHERE ID_SMP = '$ID_SMP'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"Piktura u Fshi "}';
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});





<?php 

class ClearPar{
	
	public $par;
	
	public function __construct(){
		$this->par = "()";
	}
	
	public function _validate($str){
		$arr_str = str_split(trim($str));
		for($i = 0; $i < count($arr_str); $i++){
			if($arr_str[$i] == "(" || $arr_str[$i] == ")"){
				return true;
			}
			else{
				return false;
				break;
			}
				
		}
	}

	public function build($str){
		
		$str = trim($str);
		
		$arr_str = array();
		$arr_str = str_split($str);
		
		$str_final = array();
		
		for($i = 0; $i < count($arr_str)-1; $i++){
			if($arr_str[$i] == "(" && $arr_str[$i+1] == ")"){
				$str_final[$i] = $arr_str[$i].$arr_str[$i+1];
			}else{
				if($arr_str[$i] == ")"){
					if($arr_str[$i+1] == ")" || $arr_str[$i+1] == "("){
						$str_final[$i] = "x";
						unset($str_final[$i]);
						//return false;
					}
				}else{
					if($arr_str[$i+1] == "("){
						$str_final[$i] = "x";
						unset($str_final[$i]);						
						//return false;
					}
				}
			}
		}
		
	
		return $str_final;
		
	}	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="ClearPar.php" method="post">
			<input type="text" name="str" /><br />
			<input type="submit" name="enviar" value="Enviar" />
		</form>
		<?php
			if($_POST){
				if($_POST['str'] != ''){
					$par = new ClearPar();
					if($par->_validate($_POST['str'])){
						$str = $_POST['str'];
						$result = $par->build($str);	
						foreach($result as $res){
							echo $res.' ';
						}
					}else
						echo "Solo se permiten parentesis ()";
						
				}
				else
					echo 'Por favor ingrese información';
			} 
		?>
	</body>
</html>
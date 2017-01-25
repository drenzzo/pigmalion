<?php 

foreach ($empleados as $empleado) {
	if($empleado['salary'] > 1000 && $empleado['salary'] < 1500	):
		echo 'Name: '.$empleado['name'].'<br />';
		echo 'Email: '.$empleado['email'].'<br />';
		echo 'Phone: '.$empleado['phone'].'<br />';
		echo 'Address: '.$empleado['address'].'<br />';
		echo 'Position: '.$empleado['position'].'<br />';
		echo 'Salary: '.$empleado['salary'].'<br />';
		echo 'Skills: <br >';
		foreach ($empleado['skills'] as $skill) {
			echo '*'.$skill['skill'].'<br />';
		}
		
	endif;
	
}

?>
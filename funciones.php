<?php
	$tipoDeFormulario = 1; //0 = select, 1 = checkbox
	
	function generarFormulario($ingredientesSeleccionados = array()){
		global $tipoDeFormulario;
		global $ingredientsDisponibles;
		if($tipoDeFormulario == 0){
			echo '<form method="post" action="">';
				echo '<select name="ingredientes[]" multiple>';
				foreach($ingredientsDisponibles as $key => $value)
					echo '<option value="'.$key.'" '.(in_array($key, $ingredientesSeleccionados)?"selected":"").'>'.$value.'</option>';
				echo '</select>';
				echo '<br><br>';
				echo '<input type="submit" name="enviar">';
			echo '</form>';
		}else if($tipoDeFormulario == 1){
			echo '<form method="post" action="">';
			foreach($ingredientsDisponibles as $key => $value)
				echo '<input type="checkbox" name="ingredientes[]" value="'.$key.'" '.(in_array($key, $ingredientesSeleccionados)?"checked":"").'>'.$value.'<br>';
			echo '<br><br>';
			echo '<input type="submit" name="enviar">';
			echo '</form>';
		}
    }

	function generarPedido($ingredientesSeleccionados = array()){
		global $ingredientsDisponibles;

		if(in_array("0", $ingredientesSeleccionados) && in_array("1", $ingredientesSeleccionados)){
			echo "<h1>Has pedido una piza con los siguientes ingredientes:</h1>";
			echo "<ul>";
			foreach ($ingredientesSeleccionados as $key)
				echo "<li>".$ingredientsDisponibles[$key]."</li>";
			echo "</ul>";
			echo "El precio total es: ".calcularPrecio($ingredientesSeleccionados)."€";
		}else{
			if(!in_array("0", $ingredientesSeleccionados))
				$ingredientesSeleccionados[] = 0;
			if(!in_array("1", $ingredientesSeleccionados))
				$ingredientesSeleccionados[] = 1;

			regañarUsuario();
			generarFormulario($ingredientesSeleccionados);
		}
    }

	function regañarUsuario(){
		echo "<h1>Una pizza necessita sempre la massa i l'orenga</h1>";
	}

	function calcularPrecio($ingredientesSeleccionados){
		return count($ingredientesSeleccionados) * 0.5 + 5;
	}
?>
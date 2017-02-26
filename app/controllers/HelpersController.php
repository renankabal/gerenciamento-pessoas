<?php

class HelpersController extends \BaseController {

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  objeto validação com restrição de unicidade
	 * @return Response
	 * http://stackoverflow.com/questions/6284553/using-an-array-as-needles-in-strpos
	 */
	public function strposa($haystack, $needle, $offset=0)
	{
		if (!is_array($needle)) $needle = array($needle);

			foreach($needle as $query) {
				if(strpos($haystack, $query, $offset) !== false) return true;
			}

		return false;
	}

	// Verifica onde item tem 'unique' e insere o id
	// para poder atualizar o registro no banco
	public function handleValidation($array, $id)
	{
		foreach ($array as $chave => $valor)
		{

			if ($this->strposa($valor, 'unique'))
			{
				$array[$chave] = $valor.','.$id;
			}
		}

		return $array;
	}

	// Formata data para ser inserida no banco
	public function handleDate($date)
	{
		if (!empty($date))
		{
			$date = date_create_from_format('d/m/Y', $date);
			$date = date_format($date, 'Y-m-d');
		} else
		{
			$date = NULL;
		}

		return $date;
	}

	// Formata valores decimais para o formato float
	public function formataFloat($valor) {
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);
		return floatval($valor);
	}

}
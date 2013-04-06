<?php
class PaginaCurriculo extends Pagina{

	public static function createExperiencia($funcao, $instituicao, $projeto, $descricao, $periodo){
		$experiencia = "<span class='curriculo_titulo'><strong>{$funcao}</strong></span><br />\n";
		$experiencia .= "<span class='curriculo_instituicao'>{$instituicao}</span> <span class='pull-right curriculo_periodo'>{$periodo}</span><br />\n";
		if($projeto != ''){
			$experiencia .= "Projeto: {$projeto}<br />\n";
		}
		$experiencia .= "<span class='item_ultima_linha'>{$descricao}</span>\n";
		return $experiencia;
	}

	public static function createExperienciaAcademica($funcao, $instituicao, $projeto, $descricao, $periodo){
		return PaginaCurriculo::createExperiencia($funcao, $instituicao, $projeto, $descricao, $periodo);
	}

	public static function createFormacao($curso, $instituicao, $descricao, $periodo, $cargaHoraria){
		$formacao = "<span class='curriculo_titulo'><strong>{$curso}</strong></span><br />\n";
		$formacao .= "<span class='curriculo_instituicao'>{$instituicao}</span> <span class='pull-right curriculo_periodo'>{$periodo}</span><br />\n";
		if($descricao != ''){
			$formacao .= "{$descricao}<br />\n";
		}
		if($cargaHoraria != ''){
			$formacao .= "<span class='item_ultima_linha'>Carga Horária: {$cargaHoraria}</span>\n";
		}
		return $formacao;
	}

	public static function createFormacaoComplementar($curso, $instituicao, $descricao, $periodo, $cargaHoraria){
		return PaginaCurriculo::createFormacao($curso, $instituicao, $descricao, $periodo, $cargaHoraria);
	}

	public static function createSeminiarioEvento($nome, $local, $cidadeEstado, $data){
		$evento = "<span class='curriculo_titulo'><strong>{$nome}</strong></span><br />\n";
		$evento .= "<span class='curriculo_instituicao'>{$local}</span><br />\n";
		$evento .= "{$cidadeEstado} - {$data}";
		return $evento;
	}
}
?>
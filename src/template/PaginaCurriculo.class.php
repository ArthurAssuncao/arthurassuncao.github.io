<?php
class PaginaCurriculo extends Pagina{

    public static function createExperiencia($funcao, $instituicao, $projeto, $descricao, $periodo){
        $experiencia = "<span class='curriculo_titulo'><strong>{$funcao}</strong></span><br />\n";
        $experiencia .= "<span class='curriculo_instituicao'>{$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
        if($projeto != ''){
            $experiencia .= "Projeto: {$projeto}<br />\n";
        }
        $experiencia .= "<span class='item_ultima_linha'>{$descricao}</span>\n";
        return $experiencia;
    }

    public static function createExperienciaAcademica($projeto, $instituicao, $funcao, $descricao, $periodo){
        $experiencia = "<span class='curriculo_titulo'><strong>{$projeto}</strong></span><br />\n";
        $experiencia .= "<span class='curriculo_instituicao'>{$funcao}. {$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
        $experiencia .= "<span class='item_ultima_linha'>{$descricao}</span>\n";
        return $experiencia;
    }

    public static function createFormacao($curso, $instituicao, $descricao, $periodo, $cargaHoraria){
        $formacao = "<span class='curriculo_titulo'><strong>{$curso}</strong></span><br />\n";
        $formacao .= "<span class='curriculo_instituicao'>{$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
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

    public static function createSeminiarioEvento($nome, $local, $cidadeEstado, $data, $tipoParticipacao=''){
        $evento = "<span class='curriculo_titulo'><strong>{$nome}</strong></span><br />\n";
        $evento .= "<span class='curriculo_instituicao'>{$local}</span><br />\n";
        $evento .= "{$cidadeEstado} - {$data}";
        return $evento;
    }

    public static function createHabilidade($habilidade, $valor){
        $skill = "<span class='skill_habilidade'>{$habilidade}</span><br /><span class='col-md-11 skill' data-tooltip='{$habilidade}'><span data-skillbar='{$valor}' class='skill_bar'></span></span>";
        return $skill;
    }

    public static function createProjeto($nome, $link, $descricao){
        $projeto = "<span class='curriculo_titulo'><strong>{$nome}</strong></span><br />\n";
        $projeto .= "<a href='{$link}' title='{$nome}'>{$link}</a><br />\n";
        $projeto .= "{$descricao}\n";
        return $projeto;
    }
}
?>
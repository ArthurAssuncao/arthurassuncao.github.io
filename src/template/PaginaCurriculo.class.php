<?php
class PaginaCurriculo extends Pagina{

    public static function gerarPeriodo($periodoInicial, $periodoFinal){
        if($periodoInicial != null){
            if($periodoFinal == null){
                return "{$periodoInicial} - Até o momento";
            }
            else{
                return "{$periodoInicial} - {$periodoFinal}";
            }
        }
        else{
            if($periodoFinal != null){
                return "{$periodoFinal}";
            }
            else{
                return "";
            }
        }
   }

    public static function createExperiencia($funcao, $instituicao, $projeto, $descricao, $periodoInicial, $periodoFinal=null){
        $periodo = PaginaCurriculo::gerarPeriodo($periodoInicial, $periodoFinal);
        $experiencia = "<span class='curriculo_titulo'><strong>{$funcao}</strong></span><br />\n";
        $experiencia .= "<span class='curriculo_instituicao'>{$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
        if($projeto != null){
            $experiencia .= "Projeto: {$projeto}<br />\n";
        }
        $experiencia .= "<span class='item_ultima_linha'>{$descricao}</span>\n";
        return $experiencia;
    }

    public static function createExperienciaAcademica($projeto, $instituicao, $funcao, $descricao, $periodoInicial, $periodoFinal=null){
        $periodo = PaginaCurriculo::gerarPeriodo($periodoInicial, $periodoFinal);
        $experiencia = "<span class='curriculo_titulo'><strong>{$projeto}</strong></span><br />\n";
        $experiencia .= "<span class='curriculo_instituicao'>{$funcao}. {$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
        $experiencia .= "<span class='item_ultima_linha'>{$descricao}</span>\n";
        return $experiencia;
    }

    public static function createFormacao($curso, $instituicao, $descricao, $cargaHoraria, $periodoInicial, $periodoFinal=null){
        $periodo = PaginaCurriculo::gerarPeriodo($periodoInicial, $periodoFinal);
        $formacao = "<span class='curriculo_titulo'><strong>{$curso}</strong></span><br />\n";
        $formacao .= "<span class='curriculo_instituicao'>{$instituicao}</span><br /><span class='curriculo_periodo'>{$periodo}</span><br />\n";
        if($descricao != ''){
            $formacao .= "{$descricao}<br />\n";
        }
        if($cargaHoraria != ''){
            //$formacao .= "<span class='item_ultima_linha'>Carga Horária: {$cargaHoraria}</span>\n";
        }
        return $formacao;
    }

    public static function createFormacaoComplementar($curso, $instituicao, $descricao, $cargaHoraria, $periodoInicial, $periodoFinal=null){
        return PaginaCurriculo::createFormacao($curso, $instituicao, $descricao, $cargaHoraria, $periodoInicial, $periodoFinal);
    }

    public static function createSeminiarioEvento($nome, $local, $cidadeEstado, $data, $tipoParticipacao=''){
        $evento = "<span class='curriculo_titulo'><strong>{$nome}</strong></span><br />\n";
        $evento .= "<span class='curriculo_instituicao'>{$local}</span><br />\n";
        $evento .= "{$cidadeEstado} - {$data}";
        return $evento;
    }

    public static function createHabilidade($habilidade, $valor){
        $nivel = "Iniciante"; //iniciante, intermediário, avançado, expert
        if($valor >= 90){
            $nivel = "Expert";
        }
        elseif ($valor >= 70) {
            $nivel = "Avançado";
        }
        elseif ($valor >= 40) {
            $nivel = "Intermediário";
        }
        $skill = "<span class='skill_name'>{$habilidade}</span>
        <span class='skill_grade'>{$nivel}</span>
        <br />
        <span class='col-md-11 skill' data-tooltip='{$habilidade}' title='{$nivel}'>
            <span data-skillbar='{$valor}' class='skill_bar'>
            </span>
        </span>";
        return $skill;
    }

    public static function createProjeto($nome, $link, $descricao){
        $projeto = "<span class='curriculo_titulo'><strong>{$nome}</strong></span><br />\n";
        $projeto .= "<a href='{$link}' title='{$nome}'>{$link}</a><br />\n";
        $projeto .= "{$descricao}\n";
        return $projeto;
    }

    public static function createProducaoCientifica($titulo, $autores, $indice_eu, $evento, $sigla, $ano, $mes, $url){
        $artigo = "<span class='curriculo_artigo'><span class='curriculo_artigo_titulo'><strong><a href='{$url}' title='{$titulo}'>{$titulo}</a></strong></span><br />\n";
        $artigo .= "<span class='curriculo_artigo_autores'><em>";
        for($i = 0; $i < count($autores); ++$i) {
            $sep = ", ";
            if($i == count($autores)-1){
                $sep = "";
            }
            if($i == $indice_eu-1){
                $artigo .= "<span class='curriculo_artigo_autor'><strong>{$autores[$i]}{$sep}</strong></span>";
            }
            else{
                $artigo .= "<span class='curriculo_artigo_autor'>{$autores[$i]}{$sep}</span>";
            }
        }
        $artigo .= "</em></span><br />";
        $artigo .= "Em: {$evento}";
        $artigo .= "</span>";
        return $artigo;
    }

    public static function createProjetoPortfolio($titulo, $url, $img, $descricao){
        $descricao_formatada = implode("</p><p>", $descricao);
        $item = "<div class='wow fadeInUp col s12 m4 l4'>
            <div class='card'>
                <div class='card-image waves-effect waves-block waves-light'>
                    <img class='activator' src='{$img}'>
                </div>
                <div class='card-content'>
                    <span class='card-title activator grey-text text-darken-4'>{$titulo} <i class='mdi-navigation-more-vert right'></i></span>
                    <p><a href='{$url[1]}'>{$url[0]}</a></p>
                </div>
                <div class='card-reveal'>
                    <span class='card-title grey-text text-darken-4'><strong>{$titulo}</strong> <i class='mdi-navigation-close right'></i></span>
                    <div>{$descricao_formatada}</div>
                </div>
            </div>
        </div>";
        return $item;
    }
}
?>
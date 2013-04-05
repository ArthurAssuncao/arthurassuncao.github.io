<?php
require('Pagina.class.php');

/**
 * PaginaCached - uma extensao da classe Pagina com a funcao de cache.
 *
 * Requires PHP 5.1.0.
 * Tested on PHP 5.4.2.
 *
 * @package Template
 * @author ArthurAssuncao <contato@arthurassuncao.com>
 * @copyright 2013 Arthur Assuncao. All rights reserved.
 * license not defined
 * @link https://bitbucket.org/arthurassuncao/arthurassuncao.com
 */
class PaginaCached extends Pagina {
	private $arquivoCache;
	private $arquivoCacheId;
	private $caminhoArquivo;

	/**
     * Construtor para iniciar a pagina
     * 
     * @param string $caminhoArquivo valor para indicar o caminho do arquivo, normalmente passado como __FILE__
     */
	public function PaginaCached($caminhoArquivo) {
		parent::__construct();
		require($_SERVER['DOCUMENT_ROOT'].'/min/lib/Minify/Cache/File.php');

		$this->caminhoArquivo = $caminhoArquivo;
	}

	/**
     * Renderiza a pagina HTML, comprime e ainda cria o cache da pagina, caso $exibir_so_conteudo seja true, a pagina com o conteudo eh apenas renderizada
     * @param string $template com o template que sera usado na renderizacao, valor padrao é template.php
     * @return string com a pagina renderizada, comprimida e em cache
     */
	public function renderizar($template='template.php') {
		if($this->exibir_so_conteudo == false){
			$htmlRenderizado = $this->criaCache($template);
		}
		else{
			$htmlRenderizado = parent::renderizar($template);
		}
		return $htmlRenderizado;
	}

	/**
     * Cria o cache da pagina, caso ja exista eh retornado ao usuario
     * O cache eh criado com o seguinte formato prefixo+nome_arquivo+md5_arquivo_pagina+md5("$md5Template+$md5Header+$md5Menu+$md5Footer),
     * desta forma qualquer modificacao em arquivos que mudam o conteudo da pagina exige um novo arquivo de cache e o antigo eh apagado
     * @param string $template com o template que sera usado na renderizacao, valor padrao é template.php
     * @return string com a pagina renderizada que estava em cache ou que acabou de ir para o cache
     */
	public function criaCache($template='template.php'){
		$this->arquivoCache = new Minify_Cache_File($_SERVER['DOCUMENT_ROOT'].'/min/cache/');
		$md5Arquivo = $this->geraCacheMd5();
		$md5Template = $this->geraTemplateMd5();
		$nomeCache = $this->geraNomeCache();
		$cachesAtual = glob($_SERVER['DOCUMENT_ROOT']."/min/cache/{$nomeCache}*");
		$this->arquivoCacheId = $this->geraCacheId($md5Arquivo, $md5Template);
		$htmlRenderizado = null;
		if(count($cachesAtual) == 1){
			if(basename($cachesAtual[0]) == $this->arquivoCacheId){
				//cache ja criado
				$htmlRenderizado = $this->arquivoCache->fetch($this->arquivoCacheId);
			}
			else{
				@unlink($cachesAtual[0]); //apaga o cache
			}
		}
		if($htmlRenderizado == null){
			$htmlRenderizado = parent::renderizar($template);
			$this->arquivoCache->store($this->arquivoCacheId, $htmlRenderizado); 
		}
		return $htmlRenderizado;
	}

	/**
     * Gera o MD5 do arquivo da pagina
     * @return string com o MD5 do arquivo da pagina
     */
	public function geraCacheFileMd5(){
		$md5Arquivo = md5_file($this->caminhoArquivo);
        return $md5Arquivo;
	}

	/**
     * Gera o MD5 da data de modificacao do arquivo da pagina
     * @return string com o MD5 do arquivo da pagina
     */
	public function geraCacheMd5(){
		$formatoData = "Y/m/d H:i:s"; //2013/12/31 23:50:00
		$md5Arquivo = md5(date($formatoData, filemtime($this->caminhoArquivo)));
        return $md5Arquivo;
	}

	/**
     * Gera o MD5 do template, ou seja, do arquivo template.php, header.php, menu.php e footer.php
     * @return string com o MD5 do template
     */
	public function geraTemplateFilesMd5(){
        $md5Template = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/template.php');
        $md5Header = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/header.php');
        $md5Menu = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/menu.php');
        $md5Footer = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/footer.php'); //date("F d Y H:i:s.", filemtime($filename))
        return md5("{$md5Template}{$md5Header}{$md5Menu}{$md5Footer}");
	}

	/**
     * Gera o MD5 do template, usando a data de modificacao dos arquivos template.php, header.php, menu.php e footer.php
     * @return string com o MD5 do template
     */
	public function geraTemplateMd5(){
		$formatoData = "Y/m/d H:i:s"; //2013/12/31 23:50:00
        $md5Template = md5(date($formatoData, filemtime($_SERVER['DOCUMENT_ROOT'].'/template/template.php')));
        $md5Header = md5(date($formatoData, filemtime($_SERVER['DOCUMENT_ROOT'].'/template/header.php')));
        $md5Menu = md5(date($formatoData, filemtime($_SERVER['DOCUMENT_ROOT'].'/template/menu.php')));
        $md5Footer = md5(date($formatoData, filemtime($_SERVER['DOCUMENT_ROOT'].'/template/footer.php')));
        return md5("{$md5Template}{$md5Header}{$md5Menu}{$md5Footer}");
	}

	/**
     * Gera o nome do cache
     * @return string com o nome do cache
     */
	public function geraNomeCache($prefixo='pagina'){
		//$nome = preg_replace('/[^a-zA-Z0-9\\.=_,]/', '', self::$_controller->selectionId);
        //$nome = preg_replace('/\\.+/', '.', $nome);
        $nome = basename($this->caminhoArquivo);
        $nome = substr($nome, 0, 200 - 34 - strlen($prefixo));
        return "{$prefixo}_{$nome}";
	}

	/**
     * Gera o id do cache, essa funcao usa o nome do cache e adiciona o md5 do arquivo com o md5 do template, este ultimo eh o md5 do arquivo template.php, header.php, menu.php e footer.php
     * @return string com o id do cache
     */
	public function geraCacheId($md5Arquivo, $md5Template, $nome=''){
		if(!$nome){
	        $nome = $this->geraNomeCache();
	    }
        return "{$nome}_{$md5Arquivo}_{$md5Template}";
    }
}
?>
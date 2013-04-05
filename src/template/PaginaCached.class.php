<?php
require('Pagina.class.php');

// classe Pagina com a funcao de Cache
class PaginaCached extends Pagina {
	private $arquivoCache;
	private $arquivoCacheId;
	private $caminhoArquivo;

	public function PaginaCached($caminhoArquivo) { //__FILE__
		parent::__construct();
		require($_SERVER['DOCUMENT_ROOT'].'/min/lib/Minify/Cache/File.php');

		$this->caminhoArquivo = $caminhoArquivo;
	}

	public function renderizar($template='template.php') {
		if($this->exibir_so_conteudo == false){
			$htmlRenderizado = $this->criaCache($template);
		}
		else{
			$htmlRenderizado = parent::renderizar($template);
		}
		return $htmlRenderizado;
	}

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

	public function geraCacheMd5(){
		$md5Arquivo = md5_file($this->caminhoArquivo);
        return $md5Arquivo;
	}

	public function geraTemplateMd5(){
        $md5Template = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/template.php');
        $md5Header = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/header.php');
        $md5Menu = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/menu.php');
        $md5Footer = md5_file($_SERVER['DOCUMENT_ROOT'].'/template/footer.php');
        return md5("{$md5Template}{$md5Header}{$md5Menu}{$md5Footer}");
	}

	public function geraNomeCache($prefixo='pagina'){
		//$nome = preg_replace('/[^a-zA-Z0-9\\.=_,]/', '', self::$_controller->selectionId);
        //$nome = preg_replace('/\\.+/', '.', $nome);
        $nome = basename($this->caminhoArquivo, ".php");
        $nome = substr($nome, 0, 200 - 34 - strlen($prefixo));
        return "{$prefixo}_{$nome}";
	}

	public function geraCacheId($md5Arquivo, $md5Template, $nome=''){
		if(!$nome){
	        $nome = $this->geraNomeCache();
	    }
        return "{$nome}_{$md5Arquivo}_{$md5Template}";
    }
}
?>
<?php
require('Pagina.class.php');
require('../min/lib/Minify/Cache/File.php');

// classe Pagina com a funcao de Cache
class PaginaCached extends Pagina {
	$arquivoCache;
	$arquivoId;

	public function renderizar($template='template.php') {
		$htmlRenderizado = Parent::renderizar();
		$this->arquivoCache = Minify_Cache_File();
		$this->arquivoCache.store($arquivoId, $htmlRenderizado);
	}

	public generateId(){}
}
?>
<?php
class Pagina{
	public $lang;
	public $robots_noindex_follow;
	public $title;
	public $description;
	public $keywords;
	public $canonical;
	public $tags_head_extra;
	public $body_onload;

	public $embedded_css;
	public $embedded_js_footer;
	public $embedded_js_header;

	public $conteudo;
	public $compressao = NULL;

	public static $GZIP = 'gzip';

	private $links_css = array();
	private $links_js_footer = array();
	private $links_js_header = array();

	private $exibir_so_conteudo;

	public function Pagina() {
		$this->iniciaValoresPadrao();
		$this->verificaPost();
		//$this->verificaGet();
		$this->addCSS('css/main.css');
	}

	private function verificaPost(){
		//ARRUMAR ISSO
		if((isset($_POST['exibir_header']) && $_POST['exibir_header'] == 'false') && (isset($_POST['exibir_footer']) && $_POST['exibir_footer'] == 'false')){
			$this->exibir_so_conteudo = true;
		}
	}

	private function iniciaValoresPadrao(){
		$this->lang = 'pt-br'; // idioma da pagina
		$this->robots_noindex_follow = false;
		$this->title = 'Arthur Assunção'; // titulo da pagina
		$this->description = 'Arthur Assunção'; // descricao da pagina
		$this->keywords = 'Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação'; /* keywords da pagina */
		$this->canonical = NULL; // link canonial da pagina
		$this->tags_head_extra = (isset($tags_head_extra)) ? $tags_head_extra : ''; // permite adicionar outras tags no head
		$this->body_onload = '';
		$this->exibir_so_conteudo = false;
	}

	public function createCanonicalLink(){
		$protocolo = strtolower(preg_replace('/[^a-zA-Z]/','',$_SERVER['SERVER_PROTOCOL'])); //pegando só o que for letra
		$localizacao = $protocolo.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$localizacao = $localizacao[strlen($localizacao)-1] == '/' ? substr($localizacao,0,-1) : $localizacao;
		return $localizacao;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setLang($lang) {
		$this->lang = $lang;
	}

	public function setRobotsNoindexFollow($robots_noindex_follow) {
		$this->robots_noindex_follow = $robots_noindex_follow;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	public function setCanonical($canonical) {
		$this->canonical = $canonical;
	}

	public function setBodyOnload($body_onload) {
		$this->body_onload = $body_onload;
	}

	public function setExibirSoConteudo($exibir){
		$this->exibir_so_conteudo = $exibir;
	}

	public function addCSS($link) {
		$this->links_css[] = $link;
	}

	public function addJavascript($link, $footer=true) {
		if($footer == true){
			$this->links_js_footer[] = $link;
		}
		else{
			$this->links_js_header[] = $link;
		}
	}

	private static function divideArrayLinks($array){
		$array_dividido = array();
		$novo_array = array();
		foreach($array as $link){
			$novo_array[] = $link;
			if(!(stripos($link, 'http://', 0) === 0)){
				continue;
			}
			$array_dividido[] = $novo_array;
			$novo_array = array();
		}
		if(count($novo_array) != 0){
			$array_dividido[] = $novo_array;
		}
		return $array_dividido;
	}

	public function createTagsCSS($array_links, $useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($array_links);
		$tags = array();
		if($useMinify){
			foreach($linksDivididos as $links){
				if(count($links) > 1 || !(stripos($link, 'http://', 0) === 0)){
					$tags[] = Pagina::getLinksCSSMin($links);
				}
				else{
					$tags[] = Pagina::getLinksCSS($links);
				}
			}
		}
		return join("\n", $tags);
	}

	public function createTagsJS($array_links, $useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($array_links);
		$tags = array();
		if($useMinify){
			foreach($linksDivididos as $links){
				if(count($links) > 1 || !(stripos($link, 'http://', 0) === 0)){
					$tags[] = Pagina::getLinksJSMin($links);
				}
				else{
					$tags[] = Pagina::getLinksJS($links);
				}
			}
		}
		return join("\n", $tags);
	}

	private function iniciaBuffer(){
		if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], Pagina::$GZIP)){
			ob_start('ob_gzhandler');
			return Pagina::$GZIP;
		}
		else{
			ob_start();
			return NULL;
		}
	}

	private function finalizaBuffer(){
		return ob_get_clean();
	}

	public function iniciaConteudo() {
		$this->compressao = $this->iniciaBuffer();
	}

	public function finalizaConteudo() {
		$this->conteudo = $this->finalizaBuffer();
	}

	public function renderizar($endereco='template.php') {
		$this->iniciaBuffer();
		if($this->exibir_so_conteudo == false){
			include($endereco); //template html/php
		}
		else{
			echo $this->conteudo;
		}
		return $this->finalizaBuffer();
	}

	private static function getLinksCSSMin($vetor_links){
		$links_csv = join(',', $vetor_links);
		$tag = "\t".'<link rel="stylesheet" type="text/css" href="/min/?f='.$links_csv.'" />'."\n";
		return $tag;
	}

	private static function getLinksJSMin($vetor_links){
		$links_csv = join(',', $vetor_links);
		$tag = "\t".'<script type="text/javascript" src="/min/?f='.$links_csv.'"></script>'."\n";
		return $tag;
	}
	
	private static function getLinksCSS($vetor_links){
		$tags = '';
		foreach ($vetor_links as $link) {
			$tags .= "\t".'<link rel="stylesheet" type="text/css" href="'.$link.'" />'."\n";
		}
		return $tags;
	}

	private static function getLinksJS($vetor_links){
		$tags = '';
		foreach ($vetor_links as $link) {
			$tags .= "\t".'<script type="text/javascript" src="'.$link.'"></script>'."\n";
		}
		return $tags;
	}

}
?>
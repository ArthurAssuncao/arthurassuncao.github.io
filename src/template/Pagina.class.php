<?
class Pagina {
	public $lang;
	public $robots_noindex_follow;
	public $title;
	public $description;
	public $keywords;
	public $canonical;
	public $tags_head_extra;
	public $body_onload;

	private $links_css = array();
	public $embedded_css;
	private $links_js_footer = array();
	private $links_js_header = array();
	public $embedded_js_footer;
	public $embedded_js_header;

	private $exibir_so_conteudo;

	public $conteudo;
	public $compressao = NULL;
	public static $GZIP = 'gzip';

	protected function Pagina() {
	}

	public function Pagina() {
		$this->iniciaValoresPadrao();
		$this->addCSS('css/main.css');
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
		for($array as $link){
			$novo_array = array();
			while(stripos($link, 'http', 0) != 0){
				$novo_array[] = $link;
			}
			$array_dividido[] = $novo_array;
		}
		return $array_dividido;
	}

	public function createTagsCSS($useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($this->links_css);
		if(useMinify){
			for($linksDivididos as $links){
				if(strlen($links) > 1 || (stripos($links[0], 'http', 0) != 0)){
					$links_csv = join(',', $links);
					$tags[] = "\t".'<link rel="stylesheet" type="text/css" href="/min/?f='.$links_csv.'" />'."\n";
				}
				else{
					for($links as $link){
						$tags[] = "\t".'<link rel="stylesheet" type="text/css" href="'.$link.'" />'."\n";
					}
				}
			}
		}
	}

	public function createTagsJS($useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($this->links_js);
		if(useMinify){
			for($linksDivididos as $links){
				if(strlen($links) > 1 || (stripos($links[0], 'http', 0) != 0)){
					$links_csv = join(',', $links);
					$tags[] = "\t".'<script type="text/javascript" src="/min/?f='.$links.'"></script>'."\n";
				}
				else{
					for($links as $link){
						$tags[] = "\t".'<script type="text/javascript" src="'.$link.'"></script>'."\n";
					}
				}
			}
		}
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

}
?>
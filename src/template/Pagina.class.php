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
	private $links_css = array();

	private $exibir_so_conteudo;

	public $conteudo;
	public $compressao = NULL;
	public static $GZIP = 'gzip';

	protected function Pagina() {
	}

	public function Pagina() {
		$this->addCSS('css/main.css');
		$this->iniciaValoresPadrao();
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

	private function createLinkMinify(){
		for($i)

		if(stripos($endereco, 'http', 0) === 0){
		    $this->links_css_externo = $endereco;
		}
		else{
			$this->links_css_interno[] = $endereco;
		}
	}

	public function addCSS($endereco) {
		$this->links_css[] = $endereco;
	}

	public function addJavascript($endereco) {
		$this->links_js[] = $endereco;
	}

	private function iniciaBuffer(){
		if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
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

	public function render($endereco='template.php') {
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
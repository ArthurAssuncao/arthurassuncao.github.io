<?php
/**
 * Pagina - cria um pagina para ser enviada ao cliente, permite compreesao do conteudo e dos arquivos externos, como javascripts e css.
 *
 * Requires PHP 5.1.0.
 * Tested on PHP 5.4.2.
 *
 * @package Template
 * @author ArthurAssuncao <contato[at]arthurassuncao[dot]com>
 * @copyright 2013 Arthur Assuncao. All rights reserved.
 * license not defined
 * @link https://bitbucket.org/arthurassuncao/arthurassuncao.com
 */
class Pagina{
	public $lang; // idioma da pagina
	public $robots_noindex_follow; // permite impedir que os robos indexem a pagina, mas permite que sigam os links
	public $title; // titulo da pagina
	public $description; // descricao da pagina
	public $keywords; // palavras-chave da pagina
	public $canonical; // link canonical da pagina, link canonical é o link correto, se houver alguma pagina q redirecione para uma outra o canonical é a segunda, ou seja, a original
	public $tags_head_extra; // permite adicionar tags extra ao head
	public $body_onload; // permite adicionar funcoes ao onload da tag body

	public $embedded_css; // texto com css para adicionar
	public $embedded_js_footer; // texto com js para adicionar no footer
	public $embedded_js_header; // texto com js para adicionar no header

	public $conteudo;
	public $compressao = NULL;

	public static $COMPRESS_GZIP = 'gzip';

	private $links_css = array(); // vetor com links css
	private $links_js_footer = array(); // vetor com links js que serao inseridos no footer
	private $links_js_header = array(); // vetor com links js que serao inseridos no header

	protected $exibir_so_conteudo;

	/**
     * Construtor para iniciar a pagina
	 *
     */
	public function Pagina() {
		$this->iniciaValoresPadrao();
		$this->verificaPost();
		//$this->verificaGet();
	}

	/**
     * Verifica paramentros Post
     * 
     */
	private function verificaPost(){
		//ARRUMAR ISSO
		if((isset($_POST['exibir_header']) && $_POST['exibir_header'] == 'false') && (isset($_POST['exibir_footer']) && $_POST['exibir_footer'] == 'false')){
			$this->exibir_so_conteudo = true;
		}
	}

	/**
     * Verifica paramentros Get
     * 
     */
	private function verificaGet(){
		
	}

	/**
     * Inicia os atributos com valores padrao
     * 
     */
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

		$this->embedded_css = '';
		$this->embedded_js_footer = '';
		$this->embedded_js_header = '';
	}

	/**
     * Cria um link canonical da pagina se basenado na localizacao da pagina no servidor
     * @return string com o link canonical da pagina
     */
	public function createCanonicalLink(){
		$protocolo = strtolower(preg_replace('/[^a-zA-Z]/','',$_SERVER['SERVER_PROTOCOL'])); //pegando só o que for letra
		$localizacao = $protocolo.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$localizacao = $localizacao[strlen($localizacao)-1] == '/' ? substr($localizacao,0,-1) : $localizacao;
		return $localizacao;
	}

	/**
     * Seta o titulo da pagina
     * @param string $title titulo da pagina
     */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
     * Seta o idioma da pagina
     * @param string $lang idioma da pagina
     */
	public function setLang($lang) {
		$this->lang = $lang;
	}

	/**
     * Seta se a pagina deve ser indexada pelos mecanismos de busca ou nao
     * @param bool $robots_noindex_follow com false se deve ser indexada e true se nao deve ser
     */
	public function setRobotsNoindexFollow($robots_noindex_follow) {
		$this->robots_noindex_follow = $robots_noindex_follow;
	}

	/**
     * Seta a descricao da pagina
     * @param string $description descricao da pagina
     */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
     * Seta as palavras-chave da pagina
     * @param string $keywords palavras-chave da pagina
     */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
     * Seta o link canonical da pagina
     * @param string $canonical link canonical da pagina
     */
	public function setCanonical($canonical) {
		$this->canonical = $canonical;
	}

	/**
     * Seta funcao para ser carregada no onLoad da tag body
     * @param string $body_onload funcao para ser carregada no onLoad da tag body
     */
	public function setBodyOnload($body_onload) {
		$this->body_onload = $body_onload;
	}

	/**
     * Seta se ira exibir apenas o conteudo da pagina ou toda a pagina
     * @param bool $exibir valor com true se ira exibir so o conteudo e false senao
     */
	public function setExibirSoConteudo($exibir){
		$this->exibir_so_conteudo = $exibir;
	}

	/**
     * Adiciona um link css a pagina
     * @param string $link endereco do css que sera adicionado
     */
	public function addCSS($link) {
		$this->links_css[] = $link;
	}

	/**
     * Adiciona um link js a pagina
     * @param string $link endereco do js que sera adicionado
     * @param boolen $footer valor com true se o link sera adicionado ao footer(antes de fechar a tag body) da pagina e false se for adicionado no header(dentro da tag head)
     */
	public function addJavascript($link, $footer=true) {
		if($footer == true){
			$this->links_js_footer[] = $link;
		}
		else{
			$this->links_js_header[] = $link;
		}
	}

	/**
     * Adiciona um css embutido na pagina
     * @param string $embeddedCSS com o texto do css
     */
	public function addEmbeddedCSS($embeddedCSS){
		if($embeddedCSS){
			$this->embedded_css .= "\n$embeddedCSS";
		}
	}

	/**
     * Adiciona um js embutido na pagina
     * @param string $embeddedJS com o texto do js
     * @param boolen $footer valor com true se o link sera adicionado ao footer(antes de fechar a tag body) da pagina e false se for adicionado no header(dentro da tag head)
     */
	public function addEmbeddedJavascript($embeddedJS, $footer=true) {
		if($embeddedJS){
			if($footer == true){
				$this->embedded_js_footer .= "\n$embeddedJS";
			}
			else{
				$this->embedded_js_header .= "\n$embeddedJS";
			}
		}
	}

	/**
     * Divide um array em arrays para a geracao das tags style ou script
     * @param string $array com o array de links
     * @return array com o array dividido
     */
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

	/**
     * Cria as tags Link que serao adicionadas a pagina
     * @param string $array_links com o array de links
     * @param bool $useMinify true se ira usar o Minify para comprimir os arquivos e false senao
     * @return string com as tags geradas
     */
	public function createTagsCSS($array_links, $useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($array_links);
		$tags = array();
		if($useMinify){
			foreach($linksDivididos as $links){
				if(count($links) > 0 && !(stripos($links[0], 'http://', 0) === 0)){
					$tags[] = Pagina::createLinksCSSMin($links);
				}
				else{
					$tags[] = Pagina::createLinksCSS($links);
				}
			}
		}
		return join("\n", $tags);
	}

	/**
     * Cria as tags Script que serao adicionadas a pagina
     * @param string $array_links com o array de links
     * @param bool $useMinify true se ira usar o Minify para comprimir os arquivos e false senao
     * @return string com as tags geradas
     */
	public function createTagsJS($array_links, $useMinify=true){
		$linksDivididos = Pagina::divideArrayLinks($array_links);
		$tags = array();
		if($useMinify){
			foreach($linksDivididos as $links){
				if(count($links) > 0 && !(stripos($links[0], 'http://', 0) === 0)){
					$tags[] = Pagina::createLinksJSMin($links);
				}
				else{
					$tags[] = Pagina::createLinksJS($links);
				}
			}
		}
		return join("\n", $tags);
	}

	/**
     * Inicia a captura do buffer de saida
     */
	private function iniciaBuffer(){
		if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], Pagina::$COMPRESS_GZIP)){
			ob_start('ob_gzhandler');
			return Pagina::$COMPRESS_GZIP;
		}
		else{
			ob_start();
			return NULL;
		}
	}

	/**
     * Finaliza a captura do buffer de saida
     */
	private function finalizaBuffer(){
		return ob_get_clean();
	}

	/**
     * Inicia a captura do conteudo da pagina
     */
	public function iniciaConteudo() {
		$this->compressao = $this->iniciaBuffer();
	}

	/**
     * Finaliza a captura do conteudo da pagina
     */
	public function finalizaConteudo() {
		$this->conteudo = $this->finalizaBuffer();
	}

	/**
     * Comprime a pagina HTML
     * @param string $conteudo com o conteudo que sera comprimido
     * @return string com o conteudo comprimido
     */
	public static function comprimeHTML($conteudo) {
		$fileDirToRoot = $_SERVER['DOCUMENT_ROOT'];
		require($fileDirToRoot.'/min/lib/Minify/HTML.php');
		require($fileDirToRoot.'/min/lib/Minify/CommentPreserver.php');
		require($fileDirToRoot.'/min/lib/Minify/CSS/Compressor.php');
		require($fileDirToRoot.'/min/lib/Minify/CSS/UriRewriter.php');
		require($fileDirToRoot.'/min/lib/Minify/CSS.php');
		require($fileDirToRoot.'/min/lib/JSMin.php');

		$conteudo = Minify_HTML::minify($conteudo, array(
			'cssMinifier' => array('Minify_CSS', 'minify'),
			'jsMinifier' => array('JSMin', 'minify'),
			'xhtml' => array(false)
		));

		return $conteudo;
	}

	/**
     * Renderiza a pagina HTML e a comprime
     * @param string $template com o template que sera usado na renderizacao, valor padrao é template.php
     * @return string com a pagina renderizada e comprimida
     */
	public function renderizar($template='template.php') {
		$this->iniciaBuffer();
		if($this->exibir_so_conteudo == false){
			include($template); //template html/php
		}
		else{
			echo $this->conteudo;
		}
		$html = $this->finalizaBuffer();
		return Pagina::comprimeHTML($html);
	}

	/**
     * Cria uma tag Link com os enderecos dos arquivos css passados no vetor, esta funcao usa o Minify para comprimir os arquivos
     * @param string $vetor_links com os links
     * @return string com a tag com os links
     */
	private static function createLinksCSSMin($vetor_links){
		$links_csv = join(',', $vetor_links);
		$tag = "\t".'<link rel="stylesheet" type="text/css" href="/min/?f='.$links_csv.'" />'."\n";
		return $tag;
	}

	/**
     * Cria uma tag Script com os enderecos dos arquivos js passados no vetor, esta funcao usa o Minify para comprimir os arquivos
     * @param string $vetor_links com os links
     * @return string com a tag com os links
     */
	private static function createLinksJSMin($vetor_links){
		$links_csv = join(',', $vetor_links);
		$tag = "\t".'<script type="text/javascript" src="/min/?f='.$links_csv.'"></script>'."\n";
		return $tag;
	}
	
	/**
     * Cria tags Link com os enderecos dos arquivos css passados no vetor, esta funcao nao comprime os arquivos
     * @param string $vetor_links com os links
     * @return string com as tags com os links
     */
	private static function createLinksCSS($vetor_links){
		$tags = '';
		foreach ($vetor_links as $link) {
			$tags .= "\t".'<link rel="stylesheet" type="text/css" href="'.$link.'" />'."\n";
		}
		return $tags;
	}

	/**
     * Cria tags Script com os enderecos dos arquivos js passados no vetor, esta funcao nao comprime os arquivos
     * @param string $vetor_links com os links
     * @return string com as tags com os links
     */
	private static function createLinksJS($vetor_links){
		$tags = '';
		foreach ($vetor_links as $link) {
			$tags .= "\t".'<script type="text/javascript" src="'.$link.'"></script>'."\n";
		}
		return $tags;
	}

}
?>
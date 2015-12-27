// AngularJS controllers
app.controller('AppController', function($scope) {

});

app.controller('SkillsController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.skills = {};
    $scope.skills.data = [
        { name: 'android', value: 70, msg: 'Trabalhei por 1,25 ano e fiz um curso de Android, além de alguns projetos.' },
        { name: 'python', value: 60, msg: 'Trabalhei por 1,25 ano, fiz um site e também um curso de Python, além de vários projetos, inclusive no mestrado.' },
        { name: 'JavaScript/jQuery', value: 60, msg: 'Trabalhei em alguns sites, extensões para o Chrome e projetos.' },
        { name: 'R', value: 70, msg: 'Utilizo em projetos do mestrado.' },
        { name: 'HTML5/CSS3/SASS', value: 70, msg: 'Trabalhei em alguns sites, extensões para o Chrome e alguns projetos.' },
        { name: 'Twitter Bootstrap 2.x - 3.x', value: 70, msg: 'Trabalhei em alguns sites utilizando Bootstrap, extensões para o Chrome e projetos.' },
        { name: 'Git (Controle de Versão)', value: 90, msg: 'Utilizo Git desde 2012 em boa parte dos projetos que participo, além de ter trabalhado por 1,25 ano e de utilizar no mestrado.' },
        { name: 'Design Responsivo', value: 70, msg: 'Trabalhei em alguns sites com Design Responsivo.' },
        { name: 'PHP', value: 40, msg: 'Trabalhei por alguns meses, além de criar as versões anteriores deste site e alguns projetos em PHP.' },
        { name: 'Java/Java Web', value: 50, msg: 'Trabalhei por alguns meses com Java Web e desenvolvi alguns projetos em Java.' },
        { name: 'C++', value: 50, msg: 'Participei de projetos utilizando C++ e utilizei no mestrado.' },
        { name: 'SQL', value: 60, msg: 'Trabalhei por 1,5 ano utilizando SQL, com o MySQL(1,25 ano) e Postgree(0,25 ano).' },
        { name: 'Objective-C (Programação para iOS)', value: 20, msg: 'Aprendi no mestrado cursando uma disciplina de desenvolvimento móvel' },
    ];
});

app.controller('PapersController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.papers = {};
    $scope.papers.data = [
        {
            url: "http://dx.doi.org/10.1145/2810362.2810378",
            title: "Methodology to Events Identification in Vehicles Using Statistical Process Control on Steering Wheel Data",
            authors: "Arthur N. Assuncao, Fabio O. de Paula, Ricardo A. R. Oliveira",
            confjournal: "The 13th ACM International Symposium on Mobility Management and Wireless Access (MobiWac)",
            year: "2015",
            local: "Cancun, México",
            qualis: "Qualis-CC B3",
            authormain: 1
        },
        {
            url: "http://sbesc.lisha.ufsc.br/sbesc2015/proceedings/146713.pdf",
            title: "KITT - Sistema de Carro Inteligente com Apoio à Segurança do Motorista",
            authors: "Arthur N. Assuncao, Ricardo Camara, Luiz Janeiro, Rafael Vitor, Fabio O. de Paula, Ricardo A. R. Oliveira",
            confjournal: "V Brazilian Symposium on Computing Systems Engineering (SBESC)",
            year: "2015",
            local: "Foz do Iguaçu, Brasil",
            qualis: "Qualis-CC B4",
            authormain: 1
        },
        {
            url: "http://sbesc.lisha.ufsc.br/sbesc2015/proceedings/146842.pdf",
            title: "Metodologia para Detecção de Saída de Faixa Utilizando EWMA Aplicado a Sensores Inerciais no Volante",
            authors: "Arthur N. Assuncao, Fabio O. de Paula, Ricardo A. R. Oliveira",
            confjournal: "V Brazilian Symposium on Computing Systems Engineering (SBESC)",
            year: "2015",
            local: "Foz do Iguaçu, Brasil",
            qualis: "Qualis-CC B4",
            authormain: 1
        },
    ];
});

app.controller('CoursesController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.courses = {};
    $scope.courses.data = [
        {
            name : "Mestrado em Ciência da Computação",
            institution : "Universidade Federal de Ouro Preto",
            date_start : "2014",
            date_end : "Até o momento",
        },
        {
            name : "Superior de Tecnologia em Sistemas para Internet",
            institution : "Instituto Federal do Sudeste de MG",
            date_start : "2011",
            date_end : "2014",
        },
    ];
});

app.controller('AwardsController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.awards = {};
    $scope.awards.data = [
        {
            name : "GDG DevFest Sudeste Hackathon",
            year : "2015",
            place : "1º lugar",
            url : "https://github.com/ArthurAssuncao/EntregaRapida",
        },
    ];
});

app.controller('ProjectsController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.projects = {};
    $scope.projects.data = [
        {
            name: "EntregaRápida",
            imgurl: "http://mateusferreira.com.br/images/entregarapida-thumbnail.jpeg",
            imgs: "
                http://mateusferreira.com.br/images/entregarapida/0.jpeg, 
                http://mateusferreira.com.br/images/entregarapida/1.jpeg, 
                http://mateusferreira.com.br/images/entregarapida/2.jpeg, 
                http://mateusferreira.com.br/images/entregarapida/3.jpeg, 
                http://mateusferreira.com.br/images/entregarapida/4.jpeg, 
                http://mateusferreira.com.br/images/entregarapida/5.jpeg",
            url: "http://github.com/ArthurAssuncao/EntregaRapida",
            urlname: "Visite o projeto",
            technologies: "HTML5/CSS3, SASS, JavaScript, AngularJS, AngularJS Material, Polymer, Polymer, Google Maps API, Google Sign In, Google Places, NodeJS, MongoDB",
            type: "Protótipo de Hackathon",
            datestart: "2015",
            dateend: "2015",
            description: "<p>Sistema colaborativo que permite o transporte de objetos dentro da região por meio de entregadores cadastrados. Desta forma diminuindo o custo e tempo no transporte desses objetos e, até, possibilitando entregas no mesmo dia.</p>
                <p>O EntregaRápida também permite o envio por meio do EcoPacote, um pacote que utiliza as ciclovias para a entrega. Essas ciclovias têm sido implementadas em diversas cidades do Brasil, como na cidade de Belo Horizonte.</p>
                <p>A partir das características do app é possível trazer uma série de melhorias para a sociedade, gerando novas oportunidades de négocio e, ao mesmo tempo, oferecer maior comodidade no envio e recebimento de objetos dentro da cidade, tornando-a mais morderna.</p>",
        },
        {
            name: "MaisVendas",
            fullname: "MaisVendas",
            imgurl: "assets/img/portfolio/maisvendas_300x200.png",
            imgs: "assets/img/portfolio/maisvendas_300x200.png, assets/img/portfolio/maisvendas_300x200.png, assets/img/portfolio/maisvendas_300x200.png",
            url: "https://play.google.com/store/apps/details?id=com.vendas",
            urlname: "MaisVendas na PlayStore",
            technologies: "Android, Python/Django, JSON, Git, MySQL",
            type: "Desenvolvedor Mobile e Web",
            datestart: "2013",
            dateend: "2014",
            description: "<p>Participei da programação do app móvel e do Web Service MaisVendas da empresa AddMob.</p>
                    <p>Foi feito o desenolvimento do app Android e Web Service em Django com banco de dados MySQL, uso de notação JSON para comunicação entre os sistemas e utilização de controle de versão Git para uma melhor manutenção do código e colaboração entre os membros da equipe.</p>
                    <p>O MaisVendas é um sistema para quem deseja ter seu catálogo de produtos e sua lista de clientes disponíveis ao toque da tela de seu tablet ou smartphone. É possível realizar vendas, consultar pedidos realizados, verificar o histórico de vendas através do gráfico iterativo e muito mais.</p>",
        },
        {
            name: "JUMP!",
            imgurl: "http://fakeimg.pl/300x200/",
            imgs: "http://fakeimg.pl/300x200/, http://fakeimg.pl/300x200/, http://fakeimg.pl/300x200/",
            url: "https://github.com/arthurassuncao/jump",
            urlname: "Visite o projeto",
            technologies: "Python, Node.js, HTML/CSS3, JavaScript/Phaser, Git",
            type: "Projeto Acadêmico",
            datestart: "2013",
            dateend: "2013",
            description: "<p>Participei da equipe de desenvolvimento do jogo JUMP (Jogo Unificado para Movimentação Projetada).</p>
                    <p>O jogo permite que o jogador, em frente a uma webcam, controle, por meio de seus pulos, o personagem do jogo.</p>
                    <p>Foram utilizados: linguagem Python com a biblioteca OpenCV e Node.js.</p>
                    <p>Projeto foi apresentado na Semana Nacional de Ciência e Tecnologia (SNCT) de 2013 no IFSEMG - Câmpus Barbacena.</p>",
        },
        {
            name: "uGuide Desk 2014",
            imgurl: "http://fakeimg.pl/300x200/",
            imgs: "http://fakeimg.pl/300x200/, http://fakeimg.pl/300x200/, http://fakeimg.pl/300x200/",
            url: "",
            urlname: "Projeto de código fonte fechado",
            technologies: "C++, JSON, Git",
            type: "Projeto Acadêmico",
            datestart: "2014",
            dateend: "2014",
            description: "<p>Participei da equipe de desenvolvimento da aplicação.</p>
                    <p>O projeto consistiu de um software informativo e interativo para acompanhamento de eventos e notícias do Festival de Inverno de Ouro Preto e Mariana de 2014 com interação com os usuários por meio do sensor Kinect.</p>
                    <p>Foram utilizadas linguagem C++ e interface gráfica Qt com comunicação com o Web Service via JSON.</p>",
        },
        {
            name: "Entensões na Chrome Store",
            imgurl: "assets/img/portfolio/chrome-web-store_300x200.png",
            imgs: "assets/img/portfolio/chrome-web-store_300x200.png, assets/img/portfolio/chrome-web-store_300x200.png",
            url: "https://chrome.google.com/webstore/search/adev?hl=pt-BR",
            urlname: "Chrome Extensions",
            technologies: "HTML/CSS3, JavaScript/jQuery, Git",
            type: "Projeto Pessoal",
            datestart: "2013",
            dateend: "Atualmente",
            description: "<p>Desenvolvimento de extensões para o navegador Google Chrome:</p>
                    <p>
                      <ul>
                        <li><a href='https://chrome.google.com/webstore/detail/hide-contact-from-faceboo/dldcnjjdfolnampaceecohfaolbefbhj'>Hide Contact From Facebook Chat List</a><br/>
                          <p>Esconde contatos da lista do chat do Facebook sem bloquear o contato. O contato continua te vendo na lista do chat dele como online, porém voce não o vê mais.</p>
                        </li>
                        <li><a href='https://chrome.google.com/webstore/detail/wpp-web-customizer/lhaamjcmnafobcjjcjfpglfonpdkoedb'>Wpp web Customizador</a><br/>
                          <p>Modifica o fundo (background) do chat do Whatsapp™ Web.</p>
                        </li>
                      </ul>
                    </p>",
        },
        {
            name: "Addmob.com.br",
            imgurl: "assets/img/portfolio/addmob_com_br_300x200.jpg",
            imgs: "assets/img/portfolio/addmob_com_br_300x200.jpg, assets/img/portfolio/addmob_com_br_300x200.jpg",
            url: "https://www.addmob.com.br",
            urlname: "Visite Addmob.com.br",
            technologies: "HTML/CSS3, JavaScript/jQuery/HammerJS, Python/Django, Git",
            type: "Desenvolvedor Web",
            datestart: "2014",
            dateend: "2014",
            description: "<p>Participei do desenvolvimento do Website da empresa AddMob Integradora de Soluções Ltda.</p>
                    <p>Website desenvolvido em HTML5/CSS3 e Django, utilizando o framework Bootstrap 2.x e jQuery, com layout responsivo e captura de gestos (Hammer.js) para otimizar a experiência em dispositivos móveis.</p>",
        },
        // {
        //     name: "GeoColeta",
        //     imgurl: "http://mateusferreira.com.br/images/geocoleta-thumbnail.jpeg",
        //     imgs: "http://mateusferreira.com.br/images/geocoleta/0.jpeg, http://mateusferreira.com.br/images/geocoleta/1.jpeg, http://mateusferreira.com.br/images/geocoleta/2.jpeg",
        //     url: "http://geocoleta.org/",
        //     urlname: "Visite GeoColeta.org",
        //     technologies: "HTML5/CSS3, JavaScript/jQuery, HTML5 Geolocation, jQuery Mobile, Python/Django",
        //     type: "Projeto Acadêmico",
        //     datestart: "2012",
        //     dateend: "2013",
        //     description: "<p>Aplicativo de código aberto para dispositivos móveis e Desktop, desenvolvido com o objetivo de estimular o processo de coleta seletivas na minha faculdade.</p>
        //         <p>Usando geolocalização do HTML5 para pegar a posição atual do usuário o App indicará qual é ponto de coleta seletiva mais próximo de acordo com o material selecionado para ser descartado (Papel/Plástico/Metal&Vidro/ Orgânico/Não-reciclável). Todos os dados serão armazenados no servidor, onde serão analisadas no futuro.</p>
        //         <p>Com os dados fornecidos pelo App é possível criar relatórios sobre o uso de cada ponto de coleta com base em sua localização ou materiais disponíveis, ajudando o campus a realocar-los, se necessário.</p>",
        // },
    ];
});
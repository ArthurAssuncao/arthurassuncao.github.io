// AngularJS controllers
app.controller('AppController', function($scope, $timeout, $mdSidenav, $log, toastService) {
    $scope.openSideMenu = function(){
        $mdSidenav('left').toggle()
            .then(function () {
                $log.debug("abrir menu lateral");
            });
    }
    toastService.showSimpleToastTimeMillis("Versão beta, alguns erros ainda podem aparecer", 60000);
});

app.controller('TyperController', function($scope) {
    
});

app.controller('ParallaxController', function($scope, parallaxHelper) {
    $scope.background = parallaxHelper.createAnimator(-0.5);
});

app.controller('NavLeftController', function ($scope, $timeout, $mdSidenav, $log) {
    $scope.close = function () {
        $mdSidenav('left').close()
            .then(function () {
                $log.debug("close LEFT is done");
            });
    };
});

app.controller('SkillsController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.skills = {};
    $scope.skills.data = [
        { name: 'AngularJS', value: 60, msg: 'Utilizei em um projeto vencedor do hackathon GDG, neste site pessoal e em um app que está em desenvolvimento, além de um curso de front-end.' },
        { name: 'NodeJS', value: 55, msg: 'Utilizei em um projeto vencedor de hackathon, no projeto JUMP! e em um app que está em desenvolvimento, além de um curso de MEAN.' },
        { name: 'MongoDB', value: 45, msg: 'Utilizei em um projeto vencedor de hackathon e em um app que está em desenvolvimento, além de um curso de MEAN.' },
        { name: 'JavaScript/jQuery', value: 75, msg: 'Trabalhei em alguns sites, extensões para o Chrome e projetos.' },
        { name: 'HTML5/CSS3/SASS', value: 80, msg: 'Trabalhei em alguns sites, extensões para o Chrome e alguns projetos.' },
        { name: 'ReactJS', value: 15, msg: 'Aprendi durante um curso de Front-end.' },
        { name: 'Git (Controle de Versão)', value: 90, msg: 'Utilizo Git desde 2012 em boa parte dos projetos que participo, além de ter trabalhado por 1,25 ano e de utilizar no mestrado.' },
        { name: 'Design Responsivo', value: 70, msg: 'Trabalhei em alguns sites com Design Responsivo.' },
        { name: 'MaterializeCSS / Bootstrap 2.x-3.x', value: 70, msg: 'Trabalhei em alguns sites utilizando Bootstrap e MaterializeCSS, como as versões anteriores deste site pessoal, extensões para o Chrome e projetos.' },
        { name: 'Grunt (automatizador)', value: 60, msg: 'Utilizo neste site e em um app que está em desenvolvimento.' },
        { name: 'Android', value: 70, msg: 'Trabalhei por 1,25 ano e fiz um curso de Android, além de alguns projetos.' },
        { name: 'Python', value: 60, msg: 'Trabalhei por 1,25 ano, fiz um site e também um curso de Python, além de vários projetos, inclusive no mestrado.' },
        { name: 'R', value: 70, msg: 'Utilizo em projetos do mestrado.' },
        // { name: 'Java/Java Web', value: 50, msg: 'Trabalhei por alguns meses com Java Web e desenvolvi alguns projetos em Java.' },
        // { name: 'C++', value: 50, msg: 'Participei de projetos utilizando C++ e utilizei no mestrado.' },
        { name: 'SQL', value: 60, msg: 'Trabalhei por 1,5 ano utilizando SQL, com o MySQL(1,25 ano) e Postgree(0,25 ano).' },
        { name: 'Objective-C (Programação para iOS)', value: 15, msg: 'Aprendi no mestrado cursando uma disciplina de desenvolvimento móvel.' },
        { name: 'PHP', value: 40, msg: 'Trabalhei por alguns meses, além de criar as versões anteriores deste site e alguns projetos em PHP.' },
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
            // url: "http://sbesc.lisha.ufsc.br/sbesc2015/proceedings/146713.pdf",
            url: "http://localhost:8080/assets/files/146713_KITT_Sistema_de_Carro_Inteligente_com_Apoio_a_Seguranca_do_Motorista.pdf",
            title: "KITT - Sistema de Carro Inteligente com Apoio à Segurança do Motorista",
            authors: "Arthur N. Assuncao, Ricardo Camara, Luiz Janeiro, Rafael Vitor, Fabio O. de Paula, Ricardo A. R. Oliveira",
            confjournal: "V Brazilian Symposium on Computing Systems Engineering (SBESC)",
            year: "2015",
            local: "Foz do Iguaçu, Brasil",
            qualis: "Qualis-CC B4",
            authormain: 1
        },
        {
            // url: "http://sbesc.lisha.ufsc.br/sbesc2015/proceedings/146842.pdf",
            url: "http://localhost:8080/assets/files/146842_Metodologia_para_Deteccao_de_Saida_de_Faixa_Utilizando_EWMA_Aplicado_a_Sensores_Inerciais_no_Volante.pdf",
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
            institution : "Universidade Federal de Ouro Preto (UFOP)",
            date_start : "2014",
            date_end : "Até o momento",
        },
        {
            name : "Superior de Tecnologia em Sistemas para Internet",
            institution : "Instituto Federal do Sudeste de Minas Gerais (IFSEMG)",
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
            name : "Google Developer Group DevFest Sudeste Hackathon",
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
            imgurl: "assets/img/portfolio/entregarapida/thumbnail.jpeg",
            imgs: "
                assets/img/portfolio/entregarapida/0.jpeg, 
                assets/img/portfolio/entregarapida/1.jpeg, 
                assets/img/portfolio/entregarapida/2.jpeg, 
                assets/img/portfolio/entregarapida/3.jpeg, 
                assets/img/portfolio/entregarapida/4.jpeg, 
                assets/img/portfolio/entregarapida/5.jpeg",
            url: "http://github.com/ArthurAssuncao/EntregaRapida",
            urlname: "Visite o projeto",
            technologies: "HTML5/CSS3/SASS, JavaScript, AngularJS, AngularJS Material, Polymer, Google Maps API, Google Sign In, Google Places, NodeJS, MongoDB",
            type: "Protótipo de Hackathon",
            datestart: "2015",
            dateend: "2015",
            description: "Sistema colaborativo que permite o transporte de objetos dentro da região por meio de entregadores cadastrados. Desta forma diminuindo o custo e tempo no transporte desses objetos e, até, possibilitando entregas no mesmo dia.</p>
                O EntregaRápida também permite o envio por meio do EcoPacote, um pacote que utiliza as ciclovias para a entrega. Essas ciclovias têm sido implementadas em diversas cidades do Brasil, como na cidade de Belo Horizonte.</p>
                A partir das características do app é possível trazer uma série de melhorias para a sociedade, gerando novas oportunidades de négocio e, ao mesmo tempo, oferecer maior comodidade no envio e recebimento de objetos dentro da cidade, tornando-a mais morderna.</p>
                O EntregaRápida foi vencedor do hackathon da Google Developer Group DevFest Sudeste</p>",
        },
        {
            name: "ArthurAssuncao.com",
            imgurl: "assets/img/portfolio/arthurassuncao-com/thumbnail-0.jpg",
            imgs: "
                assets/img/portfolio/arthurassuncao-com/0.jpg, 
                assets/img/portfolio/arthurassuncao-com/1.jpg,
                assets/img/portfolio/arthurassuncao-com/2.jpg,
                assets/img/portfolio/arthurassuncao-com/3.jpg,
                assets/img/portfolio/arthurassuncao-com/4.jpg",
            url: "http://ArthurAssuncao.com/",
            urlname: "Visite ArthurAssuncao.com",
            technologies: "HTML5/CSS3/SASS, JavaScript/jQuery, AngularJS, AngularJS Material, WOW.js, Jade, Grunt",
            type: "Projeto Pessoal",
            datestart: "2012",
            dateend: "Atualmente",
            description: "Meu site pessoal onde divulgo meu currículo, meus projetos, etc e o mantenho atualizado com o que há de mais interessante e recente em termos de tecnologias web.</p>
                História</p>
                Em 2012 o site não tinha o código fonte aberto e utilizava PHP e Bootstrap 2.x.</p>
                Em 2013 o site teve seu código fonte aberto e hospedado no Github.</p>
                Em 2014 o site teve o Bootstrap atualizado para a versão 3.x.</p>
                Em 2015 o site passou por várias reformulações, primeiro foi o uso do MaterializeCSS, em seguida foi removido o PHP e deixado apenas estático. Uma versão em Material Design Lite foi iniciada, porém descontinuada devido a falta de recursos desse framework da Google. Nesta versão mais recente de 2015, o site é feito utilizando AngularJS e AngularJS Material, que oferecem muitos recursos com grande produtividade, além de um bom desempenho, mesmo neste último quesito sendo inferior ao ReactJS ou AngularJS 2.0.</p>
                Além de todas estas mudanças, em 2015, comecei a utilizar no site o SASS para melhorar a códificação CSS, Jade pra modularizar melhor os HTML e, o mais interessante de todos, o Grunt como automatizador. O ganho em desempenho e produtividade que um automatizador gera é gigantesco.
                Em 2016 estou analisando, a principio, a possibilidade de substituir as directivas do AngularJS por componentes ReactJS, o que aumentaria muito o desempenho do site.</p>",
        },
        {
            name: "JUMP!",
            imgurl: "assets/img/portfolio/jump/thumbnail.jpg",
            imgs: "
                assets/img/portfolio/jump/0.jpg, 
                assets/img/portfolio/jump/1.jpg, 
                assets/img/portfolio/jump/2.jpg",
            url: "https://github.com/arthurassuncao/jump",
            urlname: "Visite o projeto",
            technologies: "Python, Node.js, HTML/CSS3, JavaScript/Phaser, Git",
            type: "Projeto Acadêmico",
            datestart: "2013",
            dateend: "2013",
            description: "Participei da equipe de desenvolvimento do jogo JUMP (Jogo Unificado para Movimentação Projetada).</p>
                    O jogo permite que o jogador, em frente a uma webcam, controle, por meio de seus pulos, o personagem do jogo.</p>
                    Foram utilizados: linguagem Python com a biblioteca OpenCV e Node.js.</p>
                    Projeto foi apresentado na Semana Nacional de Ciência e Tecnologia (SNCT) de 2013 no IFSEMG - Câmpus Barbacena.</p>",
        },
        {
            name: "uGuide Desk 2014",
            imgurl: "assets/img/portfolio/uguide-desk-2014/thumbnail.jpg",
            imgs: "assets/img/portfolio/uguide-desk-2014/0.jpg, assets/img/portfolio/uguide-desk-2014/1.jpg",
            url: "",
            urlname: "Projeto de código fonte fechado",
            technologies: "C++, JSON, Git",
            type: "Projeto Acadêmico",
            datestart: "2014",
            dateend: "2014",
            description: "Participei da equipe de desenvolvimento da aplicação.</p>
                    O projeto consistiu de um software informativo e interativo para acompanhamento de eventos e notícias do Festival de Inverno de Ouro Preto e Mariana de 2014 com interação com os usuários por meio do sensor Kinect.</p>
                    O uGuide Desk ficou em exposição na Casa dos Contos, em Ouro Preto, oferecendo maior interatividade para os visitantes.</p>
                    Foram utilizadas linguagem C++ e interface gráfica Qt com comunicação com o Web Service via JSON.</p>",
        },
        {
            name: "MaisVendas",
            fullname: "MaisVendas",
            imgurl: "assets/img/portfolio/maisvendas/thumbnail-1.jpg",
            imgs: "assets/img/portfolio/maisvendas/0.jpg, assets/img/portfolio/maisvendas/1.jpg",
            url: "https://play.google.com/store/apps/details?id=com.vendas",
            urlname: "MaisVendas na PlayStore",
            technologies: "Android, Python/Django, JSON, Git, MySQL",
            type: "Desenvolvedor Mobile e Web",
            datestart: "2013",
            dateend: "2014",
            description: "Participei da programação do app móvel e do Web Service MaisVendas da empresa AddMob.</p>
                    Foi feito o desenolvimento do app Android e Web Service em Django com banco de dados MySQL, uso de notação JSON para comunicação entre os sistemas e utilização de controle de versão Git para uma melhor manutenção do código e colaboração entre os membros da equipe.</p>
                    O MaisVendas é um sistema para quem deseja ter seu catálogo de produtos e sua lista de clientes disponíveis ao toque da tela de seu tablet ou smartphone. É possível realizar vendas, consultar pedidos realizados, verificar o histórico de vendas através do gráfico iterativo e muito mais.</p>",
        },
        {
            name: "Entensões na Chrome Store",
            imgurl: "assets/img/portfolio/chrome-web-store/thumbnail.png",
            imgs: "assets/img/portfolio/chrome-web-store/0.png",
            url: "https://chrome.google.com/webstore/search/adev?hl=pt-BR",
            urlname: "Chrome Extensions",
            technologies: "HTML/CSS3, JavaScript/jQuery, Git",
            type: "Projeto Pessoal",
            datestart: "2013",
            dateend: "Atualmente",
            description: "Desenvolvimento de extensões para o navegador Google Chrome:</p>
                Hide Contact From Facebook Chat List</p>
                Esconde contatos da lista do chat do Facebook sem bloquear o contato. O contato continua te vendo na lista do chat dele como online, porém voce não o vê mais.</p></p>
                Wpp Web Customizador</p>
                Modifica o fundo (background) do chat do Whatsapp™ Web.</p>",
        },
        {
            name: "Addmob.com.br",
            imgurl: "assets/img/portfolio/addmob-com-br/thumbnail.jpg",
            imgs: "assets/img/portfolio/addmob-com-br/0.jpg, assets/img/portfolio/addmob-com-br/1.jpg",
            url: "https://www.addmob.com.br",
            urlname: "Visite Addmob.com.br",
            technologies: "HTML/CSS3, JavaScript/jQuery/HammerJS, Python/Django, Git",
            type: "Desenvolvedor Web",
            datestart: "2014",
            dateend: "2014",
            description: "Participei do desenvolvimento do Website da empresa AddMob Integradora de Soluções Ltda.</p>
                    Website desenvolvido em HTML5/CSS3 e Django, utilizando o framework Bootstrap 2.x e jQuery, com layout responsivo e captura de gestos (Hammer.js) para otimizar a experiência em dispositivos móveis.</p>",
        },
        // {
        //     name: "GeoColeta",
        //     imgurl: "assets/img/portfolio/geocoleta/thumbnail.jpeg",
        //     imgs: "assets/img/portfolio/geocoleta//0.jpeg, assets/img/portfolio/geocoleta//1.jpeg, assets/img/portfolio/geocoleta/2.jpeg",
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
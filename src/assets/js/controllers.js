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

app.controller('ProjectsController', function($scope) {
    $scope.sortType     = 'value'; // sort type default
    $scope.sortReverse  = false;  // ordenacao do sort

    // cria a lista
    $scope.projects = {};
    $scope.projects.data = [
        {
            name: "MaisVendas",
            imgurl: "assets/img/portfolio/maisvendas_300x200.png",
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
    ];
});
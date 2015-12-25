// AngularJS controllers
app.controller('AppController', function($scope) {

});

app.controller('SkillController', function($scope) {
    $scope.sortType     = 'value'; // set the default sort type
    $scope.sortReverse  = false;  // set the default sort order

    // cria a lista
    $scope.skills = [
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
    $scope.levels = [
        { name: 'básico', value_min: 0, value_max: 39 },
        { name: 'intermediário', value_min: 40, value_max: 69 },
        { name: 'avançado', value_min: 70, value_max: 89 },
        { name: 'expert', value_min: 90, value_max: 100 }
    ];
    $scope.generate_level = function(value) {
        if(value >= $scope.levels[3].value_min){
            return $scope.levels[3].name;
        }
        else if(value >= $scope.levels[2].value_min){
            return $scope.levels[2].name;
        }
        else if(value >= $scope.levels[1].value_min){
            return $scope.levels[1].name;
        }
        else if(value >= $scope.levels[0].value_min){
            return $scope.levels[0].name;
        }
        return 'indefinido';
    }

});
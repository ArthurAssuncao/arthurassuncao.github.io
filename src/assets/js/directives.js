// Directiva Skill
app.directive('skill', function() {
    var directive = {};

    directive.restrict = 'E';

    // directive.replace = true;

    directive.scope = {
        name : "@name",
        msg : "@msg",
        value : "@value"
    }

    directive.controller = "SkillController";

    directive.template = '
      <div>
        <md-tooltip md-direction="bottom">
          <span class="capitalize">{{ name }}</span>: {{ msg }}
        </md-tooltip>
       
        <span class="myskill">
            <span class="skill_name">{{ name }} 
                <i class="tiny microtiny skill-name-icon material-icons">info_outline</i>
            </span>
            <span class="skill_grade">{{ generate_level(value) }}</span>
            <br/>
            <span class="col-md-11 skill">
                <span data-skillbar="{{ value }}" class="skill_bar"></span>
            </span>
        </span>
      </div>
    ';

    return directive;
});

app.controller('SkillController', function($scope) {
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

// Directiva paper
app.directive('paper', function() {
    var directive = {};

    directive.restrict = 'E';

    directive.controller = "PaperController";

    // directive.replace = true;

    directive.scope = {
        url : "@url",
        title : "@title",
        authors : "@authors",
        conf_journal : "@confjournal",
        year : "@year",
        local : "@local",
        qualis : "@qualis",
        author_main : "@authormain"
    }

    directive.template = '
      <span class="curriculo_artigo">
        <span class="curriculo_artigo_titulo">
            <a href="{{ url }}" title="{{ title }}">
                <strong>{{ title }}</strong>
                <i class="fa fa-link"></i>
            </a>
        </span>
        <br/>
        <span class="curriculo_artigo_autores">
            <em>
                <span class="curriculo_artigo_autor" ng-repeat="author in split(authors) track by $index">
                    <span ng-if="$index == author_main-1">
                        <strong>{{ author }}</strong>
                    </span>
                    <span ng-if="$index != author_main-1">
                        {{ author }}
                    </span>
                </span>
            </em>
        </span>
        <br/>
        <span class="curriculo_artigo_evento">Em: {{ title }}, {{ year }}, {{ local }}. {{ qualis }}</span>
      </span>
    ';

    return directive;
});

app.controller('PaperController', function($scope) {
    $scope.split = function(text){
        return text.split(",");
    }
});

// Directiva course
app.directive('course', function() {
    var directive = {};

    directive.restrict = 'E';

    // directive.replace = true;

    directive.scope = {
        name : "@name",
        institution : "@institution",
        date_start : "@datestart",
        date_end : "@dateend",
    }

    directive.controller = "CourseController";

    directive.template = '
      <li class="curriculo_item">
        <span class="curriculo_titulo">
            <strong>{{ name }}</strong>
        </span>
        <br/>
        <span class="curriculo_instituicao">{{ institution }}</span>
        <br/>
        <span class="curriculo_periodo">{{ date_start }} - {{ date_end }}</span>
        <br/>
      </li>
    ';

    return directive;
});

app.controller('CourseController', function($scope) {
    
});

// Directiva project
app.directive('project', function() {
    var directive = {};

    directive.restrict = 'E';

    // directive.replace = true;

    directive.scope = {
        name : "@name",
        imgurl : "@imgurl",
        url : "@url",
        urlname : "@urlname",
        technologies : "@technologies",
        type : "@type",
        datestart : "@datestart",
        dateend : "@dateend",
        description : "@description"
    }

    directive.controller = "ProjectController";
    directive.controllerAs = "pc";

    directive.bindToController = {
        name : "@name",
        imgurl : "@imgurl",
        url : "@url",
        urlname : "@urlname",
        technologies : "@technologies",
        type : "@type",
        datestart : "@datestart",
        dateend : "@dateend",
        description : "@description"
    }

    directive.template = '
        <md-card ng-click="showDialog($event)">
          <img ng-src="{{ pc.imgurl }}" class="md-card-image" alt="Washed Out">
          <md-card-title>
            <md-card-title-text>
              <span class="md-headline">{{ pc.name }} <i class="material-icons right">more_vert</i></span>
            </md-card-title-text>
          </md-card-title>
          <!-- <md-card-actions layout="row" layout-align="end center">
            <md-button class="md-icon-button" aria-label="Favorite">
              <md-icon md-svg-icon="img/icons/favorite.svg"></md-icon>
            </md-button>
            <md-button class="md-icon-button" aria-label="Settings">
              <md-icon md-svg-icon="img/icons/menu.svg"></md-icon>
            </md-button>
            <md-button class="md-icon-button" aria-label="Share">
              <md-icon md-svg-icon="img/icons/share-arrow.svg"></md-icon>
            </md-button>
          </md-card-actions> -->
        </md-card>
    ';

    return directive;
});

app.controller('ProjectController', function($scope, $mdMedia, $mdDialog) {
    var project = {};
    project.name = this.name;
    project.imgurl = this.imgurl;
    project.url = this.url;
    project.urlname = this.urlname;
    project.technologies = this.technologies;
    project.type = this.type;
    project.datestart = this.datestart;
    project.dateend = this.dateend;
    project.description = this.description;


    $scope.showDialog = function(ev) {
        var useFullScreen = ($mdMedia('sm') || $mdMedia('xs'))  && $scope.customFullscreen;
        $mdDialog.show({
            controller: DialogProjectController,
            templateUrl: '../../templates/project.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            fullscreen: useFullScreen,
            locals: {
                project: project
            }
        })
        .then(function(answer) {
            $scope.status = 'Sua resposta foi "' + answer + '".';
        }, function() {
            $scope.status = 'Voce cancelou o dialogo.';
        });
        $scope.$watch(function() {
            return $mdMedia('xs') || $mdMedia('sm');
        }, function(wantsFullScreen) {
            $scope.customFullscreen = (wantsFullScreen === true);
        });
    };
    function DialogProjectController($scope, $mdDialog, project) {
        console.log(project);
        $scope.hide = function() {
            $mdDialog.hide();
        };
        $scope.cancel = function() {
            $mdDialog.cancel();
        };
        $scope.answer = function(answer) {
            $mdDialog.hide(answer);
        };
    }
});
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
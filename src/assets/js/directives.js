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

    // directive.templateUrl = '../../templates/skill.tmpl.html';
    directive.template = '
      <div class="skill">
        <md-tooltip md-direction="bottom">
          <span class="capitalize">{{ name }}</span>: {{ msg }}
        </md-tooltip>

        <span class="skill-body">
            <span class="skill-name">{{ name }} 
                <i class="tiny microtiny skill-name-icon material-icons">info_outline</i>
            </span>
            <span class="skill-grade">{{ generate_level(value) }}</span>
            <br/>
            <span class="skill-bar">
                <span data-skillbar="{{ value }}" class="skill-value"></span>
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

    directive.templateUrl = '../../templates/paper.tmpl.html';

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

    directive.templateUrl = '../../templates/course.tmpl.html';

    return directive;
});

app.controller('CourseController', function($scope) {
    
});

// Directiva project
app.directive('project', function($templateCache) {
    var directive = {};

    directive.restrict = 'E';

    // directive.replace = true;

    directive.scope = {
        name : "@name",
        fullname : "@fullname",
        imgurl : "@imgurl",
        imgs: "@imgs",
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
        fullname : "@fullname",
        imgurl : "@imgurl",
        imgs: "@imgs",
        url : "@url",
        urlname : "@urlname",
        technologies : "@technologies",
        type : "@type",
        datestart : "@datestart",
        dateend : "@dateend",
        description : "@description"
    }

    directive.templateUrl = '../../templates/project.tmpl.html';

    $templateCache.put('../../templates/project-dialog.tmpl.html');

    return directive;
});

app.controller('ProjectController', function($scope, $mdMedia, $mdDialog) {
    var project = {};
    project.name = this.name;
    project.fullname = this.fullname;
    project.imgurl = this.imgurl;
    project.imgs = this.imgs;
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
            templateUrl: '../../templates/project-dialog.tmpl.html',
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
        $scope.project = project;

        $scope.split = function(text){
            return text.split(",");
        }
        $scope.splitP = function(text){
            return text.split("</p>");
        }
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

// Directiva award
app.directive('award', function() {
    var directive = {};

    directive.restrict = 'E';

    // directive.replace = true;

    directive.scope = {
        name : "@name",
        year : "@year",
        place : "@place",
        url : "@url",
    }

    directive.controller = "AwardController";

    directive.templateUrl = '../../templates/award.tmpl.html';

    return directive;
});

app.controller('AwardController', function($scope) {
    
});
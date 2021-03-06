// Gruntfile.js

module.exports = function(grunt) {

  // grunt config
  grunt.initConfig({

    // arquivo com as configuracoes do projeto
    // como nome (pkg.name) e versao
    pkg: grunt.file.readJSON('./package.json'),

    // constantes
    project: {
      app: './',

      src: '<%= project.app %>src',
      src_bower_components: '<%= project.src %>/bower_components',
      src_sass: '<%= project.src %>/sass',
      src_assets: '<%= project.src %>/assets',
      src_assets_js: '<%= project.src_assets %>/js',
      src_assets_img: '<%= project.src_assets %>/img',
      src_assets_css: '<%= project.src_assets %>/css',
      src_assets_files: '<%= project.src_assets %>/files',
      src_assets_fonts: '<%= project.src_assets %>/fonts',
      src_templates: '<%= project.src %>/templates',
      src_ensino: '<%= project.src %>/ensino',
      src_assets_js_third_party: '<%= project.src_assets_js %>/third_party',
      src_jade: '<%= project.src %>/jade',

      // dist: '<%= project.app %>dist',
      dist: '<%= project.app %>',
      dist_assets: '<%= project.dist %>/assets',
      dist_assets_js: '<%= project.dist_assets %>/js',
      dist_assets_img: '<%= project.dist_assets %>/img',
      dist_assets_css: '<%= project.dist_assets %>/css',
      dist_assets_files: '<%= project.dist_assets %>/files',
      dist_assets_fonts: '<%= project.dist_assets %>/fonts',
      dist_templates: '<%= project.dist %>/templates',
      dist_ensino: '<%= project.dist %>/ensino',
      dist_assets_js_third_party: '<%= project.dist_assets_js %>/third_party',

    },

    tag: {
      banner: '/*!\n' +
      ' * <%= pkg.name %>\n' +
      ' * <%= pkg.title %>\n' +
      ' * <%= pkg.url %>\n' +
      ' * @author <%= pkg.author %>\n' +
      ' * <%= grunt.template.today("yyyy-mm-dd") %>\n' +
      ' * @version <%= pkg.version %>\n' +
      ' */\n'
    },

    // Configuracoes

    // Mkdir pra criar a estrutura
    mkdir: {
      all: {
        options: {
          create: [
          '<%= project.dist %>',
          '<%= project.dist_assets %>',
          '<%= project.dist_assets_js %>',
          '<%= project.dist_assets_img %>',
          '<%= project.dist_assets_css %>',
          '<%= project.dist_assets_files %>',
          '<%= project.dist_assets_fonts %>',
          '<%= project.dist_assets_third_party %>',
          ]
        },
      },
    },

    // Secao CSS 1

    // configure sass
    sass: {
      dev: {
        options: {
          style: 'expanded', //compressed or expanded
          trace: true,
          unixNewlines: true,
        },
        files: {
          '<%= project.src_assets_css %>/styles.css': '<%= project.src_sass %>/styles.scss',
          '<%= project.src_assets_css %>/plugins.css': '<%= project.src_sass %>/plugins.scss',
          '<%= project.src_assets_css %>/angular-material.css': '<%= project.src_sass %>/angular-material.scss',
        }
      }
    },

    // PostCSS e Autoprefix
    // Atualizar base de prefixos: npm update caniuse-db
    postcss: {
      options: {
        // map: true,
        processors: [
          require('autoprefixer')({
            // browsers: [
            //   '> 5%',
            //   '> 10% in BR',
            //   'last 10 Chrome versions',
            //   'last 7 Firefox versions',
            //   'last 7 Opera versions',
            //   'ie >= 10',
            //   'Edge > 0',
            //   'ie_mob >= 10',
            //   'Safari >= 5',
            //   ]
            browsers: ['last 10 versions', 'ie >= 10']
          })
        ]
      },
      dist: {
        src: '<%= project.src_assets_css %>/*.css'
      }
    },

    // uncss pra remover classes nao usadas
    uncss: {
      dist_plugins: {
        options: {
            ignore: ['.ng-move', '.ng-enter', '.ng-leave', '.created_by_jQuery', '.ng-cloak', '.x-ng-cloak',
              '.animated'],
            stylesheets: ["plugins.css"],
            csspath: "../<%= project.src_assets_css %>/",
            htmlroot: '<%= project.app %>/'
        },
        files: [
          {
            src: [
              '<%= project.src %>/index.html',
              '<%= project.src_templates %>/*.html',
              '<%= project.src %>/ensino/**/*.html'
            ],
            dest: '<%= project.src_assets_css %>/plugins-tidy.css'
          }
        ]
      },
      dist_styles: {
        options: {
            ignore: ['.ng-move', '.ng-enter', '.ng-leave', '.created_by_jQuery', '.ng-cloak', '.x-ng-cloak'],
            stylesheets: ["styles.css"],
            csspath: "../<%= project.src_assets_css %>/",
            htmlroot: '<%= project.app %>/'
        },
        files: [
          {
            src: [
              '<%= project.src %>/index.html',
              '<%= project.src_templates %>/*.html',
              '<%= project.src %>/ensino/**/*.html'
            ],
            dest: '<%= project.src_assets_css %>/styles-tidy.css'
          }
        ]
      },
    },

    // cssmin, minificar css
    cssmin: {
      dev: {
        options: {
          report: 'gzip',
          // sourceMap: true
        },
        files: [{
          expand: true,
          cwd: '<%= project.src_assets_css %>',
          src: ['*.css', '!*.min.css'],
          dest: '<%= project.src_assets_css %>',
          ext: '.min.css'
        }]
      }
    },


    // Secao JS

    // modernizer
    modernizr: {
      dev: {
        "dest" : "<%= project.src_assets_js %>/modernizr-custom.min.js",
        "uglify": true
      },
    },

    //uglufy
    uglify: {
      options: {
        banner: '<%= tag.banner %>',
        compress: true,
        mangle: false,
        preserveComments: 'some',
        sourceMap: true,
        report: 'gzip'
      },
      dev_third_party_angular: {
        files: {
           '<%= project.src_assets_js_third_party %>/angular-bundle.min.js': [
             '<%= project.src_bower_components %>/angular/angular.min.js',
             '<%= project.src_bower_components %>/angular-material/angular-material.min.js',
             '<%= project.src_bower_components %>/angular-animate/angular-animate.min.js',
             '<%= project.src_bower_components %>/angular-aria/angular-aria.min.js',
             '<%= project.src_bower_components %>/angular-typer/dist/typer.min.js',
             '<%= project.src_bower_components %>/angular-scroll/angular-scroll.min.js',
             '<%= project.src_bower_components %>/ng-parallax/angular-parallax.min.js',
           ],
        }
      },
      dev_third_party: {
        options: {
          banner: '<%= tag.banner %>',
          compress: true,
          mangle: true,
          except: ['jQuery', 'Backbone'],
          preserveComments: 'some',
          sourceMap: true,
          report: 'gzip'
        },
        files: {
           '<%= project.src_assets_js_third_party %>/plugins.min.js': [
             '<%= project.src_bower_components %>/jquery/dist/jquery.min.js',
             '<%= project.src_assets_js %>/modernizr-custom.min.js',
             '<%= project.src_bower_components %>/wow/dist/wow.min.js',
             '<%= project.src_bower_components %>/aload/dist/aload.min.js',
           ],
        }
      },
      dev: {
        files: {
          '<%= project.src_assets_js %>/scripts.min.js': [
            '<%= project.src_assets_js %>/modules.js',
            '<%= project.src_assets_js %>/services.js',
            '<%= project.src_assets_js %>/directives.js',
            '<%= project.src_assets_js %>/*.js',
            '!<%= project.src_assets_js %>/*.min.js',
          ]
        }
      }
    },


    // secao do template inline
    // angular_template_inline_js: {
    //   dist:{
    //     options: {
    //       basePath: '<%= project.src_templates %>',
    //       key: ''
    //     },
    //     files: [{
    //       cwd: './',
    //       expand: true,
    //       src: [ '<%= project.src_assets_js %>/directives.js' ],
    //       dest: '<%= project.dist_assets_js %>'
    //     }],
    //   },
    // },


    // secao do imgmin
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 3,
          svgoPlugins: [{ removeViewBox: false }],
          use: [require('imagemin-mozjpeg')({quality: 95})]
        },
        files: [{
          expand: true,
          cwd: '<%= project.src_assets_img %>/',
          src: ['**/*.{png,jpg,gif,svg,jpeg,json}'],
          dest: '<%= project.dist_assets_img %>/'
        }]
      }
    },

    // Secao do copy

    // copy
    copy: {
      options: {
        timestamp: true,
      },
      dev_css_not_scss: {
        // @import "../bower_components/animate.css/animate.min.css";
        // @import "../bower_components/material-icons/css/material-icons.min.css";
        files: [
          { //animate.css
            expand: false,
            src: ["<%= project.src_bower_components %>/animate.css/animate.min.css"],
            dest: '<%= project.src_sass %>/_animatecss.scss',
            filter: 'isFile'
          },
          { //material-icons.css
            expand: false,
            src: ["<%= project.src_bower_components %>/material-icons/css/material-icons.min.css"],
            dest: '<%= project.src_sass %>/_material-icons.scss',
            filter: 'isFile'
          },
        ]
      },
      dist_css: {
        files: [
          { //css
            expand: true,
            src: ['<%= project.src_assets_css %>/*.min.css'],
            dest: '<%= project.dist_assets_css %>/',
            filter: 'isFile',
            flatten: true
          },
        ]
      },
      dist_html: {
        files: [
          { //html
            expand: true,
            cwd: '<%= project.src %>',
            src: ['index.html'],
            dest: '<%= project.dist %>/',
            filter: 'isFile',
            flatten: false
          },
          { //html templates
            expand: true,
            cwd: '<%= project.src_templates %>',
            src: ['*.html'],
            dest: '<%= project.dist_templates %>/',
            filter: 'isFile',
            flatten: false
          },
          { //html ensino
            expand: true,
            cwd: '<%= project.src_ensino %>',
            src: ['**/*.html'],
            dest: '<%= project.dist_ensino %>/',
            filter: 'isFile',
            flatten: false
          },
        ],
      },
      // dist_img: {
      //   files: [
      //     { //img
      //       expand: true,
      //       cwd: '<%= project.src_assets_img %>/',
      //       src: '**',
      //       dest: '<%= project.dist_assets_img %>/',
      //       filter: 'isFile',
      //       flatten: false
      //     }
      //   ]
      // },
      dist_files: {
        files: [
          { //files
            expand: true,
            cwd: '<%= project.src_assets_files %>/',
            src: '**',
            dest: '<%= project.dist_assets_files %>/',
            filter: 'isFile',
            flatten: false
          }
        ]
      },
      dist_js: {
        files: [
          { //js
            expand: true,
            src: ['<%= project.src_assets_js %>/scripts.min.js', '<%= project.src_assets_js %>/scripts.min.js.map'],
            dest: '<%= project.dist_assets_js %>/',
            filter: 'isFile',
            flatten: true
          },
          { //js angular
            expand: true,
            src: ['<%= project.src_assets_js_third_party %>/angular-bundle.min.js',
              '<%= project.src_assets_js_third_party %>/angular-bundle.min.js.map'],
            dest: '<%= project.dist_assets_js_third_party %>/',
            filter: 'isFile',
            flatten: true
          },
          { //js plugins
            expand: true,
            src: ['<%= project.src_assets_js_third_party %>/plugins.min.js',
              '<%= project.src_assets_js_third_party %>/plugins.min.js.map'],
            dest: '<%= project.dist_assets_js_third_party %>/',
            filter: 'isFile',
            flatten: true
          }
        ]
      },
      fonts:{
        files: [
          { //fonts
            expand: true,
            src: ['<%= project.src_assets_fonts %>/*.*'],
            dest: '<%= project.dist_assets_fonts %>/',
            filter: 'isFile',
            flatten: true
          },
        ]
      },
      others:{
        files: [
          { //ourtros
            expand: true,
            src: [
              '<%= project.src %>/apple-touch-icon.png',
              '<%= project.src %>/favicon.ico',
              '<%= project.src %>/humans.txt',
              '<%= project.src %>/robots.txt'
            ],
            dest: '<%= project.dist %>/',
            filter: 'isFile',
            flatten: true
          },
        ]
      },

    },

    'http-server': {
        dev: {
            root: '<%= project.src %>',
            port: 8080,
            host: "localhost",
        },
        dist: {
            root: '<%= project.dist %>',
            port: 8000,
            host: "localhost",
        }
    },

    // Secao de HTML

    // jade
    jade: {
      dev: {
        options: {
          data: {
            debug: true
          },
          basedir: "<%= project.src %>/jade",
          timestamp: "<%= new Date().getTime() %>",
          pretty: true
        },
        files: [
          {"<%= project.src %>/index.html": ["<%= project.src_jade %>/index.jade"]},
          {
              cwd: "<%= project.src_jade %>/ensino/",
              src: "**/*.jade",
              dest: "<%= project.src_ensino %>/",
              expand: true,
              ext: ".html"
          }
        ]
      },
      dist: {
        options: {
          data: {
            debug: false
          },
          basedir: "<%= project.src %>/jade",
          pretty: false
        },
        files: [
          {"<%= project.src %>/index.html": ["<%= project.src_jade %>/index.jade"]},
          {
              cwd: "<%= project.src_jade %>/ensino/",
              src: "**/*.jade",
              dest: "<%= project.src_ensino %>/",
              expand: true,
              ext: ".html"
          }
        ]
      }
    },


    // Secao do processHTML
    processhtml: {
      options: {
        data: {
          message: 'Versao de producao!',
          strip: true,
        },
        process: true,
      },
      dist: {
        files: [
          {
            expand: true,
            cwd: '<%= project.src %>/',
            src: [
              'index.html',
            ],
            dest: '<%= project.dist %>/',
            ext: '.html',
            flatten: false,
          },
          {
            expand: true,
            cwd: '<%= project.src_templates %>/',
            src: [
              '*.html',
            ],
            dest: '<%= project.dist_templates %>/',
            ext: '.html',
            flatten: false,
          },
          {
            expand: true,
            cwd: '<%= project.src_ensino %>/',
            src: [
              '**/*.html',
            ],
            dest: '<%= project.dist_ensino %>/',
            ext: '.html',
            flatten: false,
          },
        ],
      }
    },


    // Secao do clean
    clean: {
      dist: [
        "dist",
        "assets",
        "ensino",
        "src/ensino",
        "templates",
        "apple-touch-icon.png",
        "favicon.ico",
        "humans.txt",
        "index.html",
        "robots.txt"
      ],
      dev: [
        "src/ensino"
      ]
    },


    // Secao do watch

    watch: {
      options: {
        interrupt: true,
      },
      scss: {
        files: ['<%= project.src_sass %>/*.scss'],
        tasks: ['sass'],
        options: {
          interrupt: false,
        },
      },
      postcss: {
        files: ['<%= project.src_assets_css %>/*.css'],
        tasks: ['postcss'],
        options: {
          interval: 10000,
          interrupt: true,
        },
      },
      uglify_third_party_angular: {
        files: ['<%= project.src_bower_components %>/angular**.js'],
        tasks: ['newer:uglify:dev_third_party_angular'],
        options: {
          interval: 1000,
        },
      },
      uglify_third_party: {
        files: ['<%= project.src_bower_components %>/**.js'],
        tasks: ['newer:uglify:dev_third_party'],
        options: {
          interval: 1000,
        },
      },
      uglify: {
        files: ['<%= project.src_assets_js %>/*.js', '!<%= project.src_assets_js %>/*.min.js'],
        tasks: ['newer:uglify:dev'],
        options: {
          interval: 1000,
        },
      },
      jade: {
        files: ['<%= project.src_jade %>/*.jade', '<%= project.src_jade %>/*.html',
                '<%= project.src_jade %>/ensino/*.jade', '<%= project.src_jade %>/ensino/*.html',
              '<%= project.src_jade %>/ensino/**/*.jade', '<%= project.src_jade %>/ensino/**/*.html'],
        tasks: ['jade:dev'],
      }
    },

    concurrent: {
      options: {
        logConcurrentOutput: true
      },
      tasks: ['http-server:dev', 'watch']
    },

  });

  // Load plugins
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-modernizr');
  grunt.loadNpmTasks('grunt-mkdir');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-uncss');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-concurrent');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-http-server');
  grunt.loadNpmTasks('grunt-newer');
  grunt.loadNpmTasks('grunt-contrib-jade');
  grunt.loadNpmTasks('grunt-processhtml');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  // grunt.loadNpmTasks('grunt-angular-template-inline-js');

  // grunt.loadNpmTasks('grunt-nodemon');

  // Tasks
  grunt.registerTask('dev', ['clean:dev', 'newer:copy:dev_css_not_scss', 'newer:sass', 'newer:jade:dev', 'modernizr', 'newer:uglify' ,'concurrent:tasks']);
  grunt.registerTask('default', []);
  grunt.registerTask('clear', ['clean:dist']);
  grunt.registerTask('dist', ['mkdir', 'copy:dev_css_not_scss', 'sass', 'jade:dist', 'postcss', 'uncss', 'cssmin', 'modernizr', 'uglify:dev_third_party', 'uglify:dev_third_party_angular', 'uglify:dev', 'copy', 'imagemin:dist', 'processhtml', 'http-server:dist']);
};

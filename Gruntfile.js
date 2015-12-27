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
      src_assets_js_third_party: '<%= project.src_assets_js %>/third_party',
      src_jade: '<%= project.src %>/jade',

      dist: '<%= project.app %>dist',
      dist_assets: '<%= project.dist %>/assets',
      dist_assets_js: '<%= project.dist_assets %>/js',
      dist_assets_img: '<%= project.dist_assets %>/img',
      dist_assets_css: '<%= project.dist_assets %>/css',
      dist_assets_files: '<%= project.dist_assets %>/files',
      dist_assets_fonts: '<%= project.dist_assets %>/fonts',
      dist_templates: '<%= project.dist %>/templates',
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
          style: 'compressed', //compressed or expanded
          trace: true,
          unixNewlines: true,
        },
        files: {
          '<%= project.src_assets_css %>/styles.css': '<%= project.src_sass %>/styles.scss'
        }
      }
    },

    // PostCSS e Autoprefix
    // Atualizar base de prefixos: npm update caniuse-db
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({
            browsers: ['last 7 versions', 'ie >= 10']
          })
        ]
      },
      dist: {
        src: '<%= project.src_assets_css %>/styles.css'
      }
    },

    // uncss pra remover classes nao usadas
    // uncss: {
    //   dev: {
    //     files: [
    //       {
    //         src: ['<%= project.dist %>/*.html', '<%= project.dist_templates %>/*.html'],
    //         dest: '<%= project.dist_assets_css %>/styles.css'
    //       }
    //     ]
    //   }
    // },

    // cssmin, minificar css
    cssmin: {
      dev: {
        files: [
          { 
            src: '<%= project.src_assets_css %>/styles.css', 
            dest: '<%= project.src_assets_css %>/styles.min.css' 
          }
        ]
      }
    },

    
    // Secao JS

    // modernizer
    modernizr: {
      dev: {
        "dest" : "<%= project.dist_assets_js %>/modernizr-custom.min.js",
      }
    },

    //uglufy
    uglify: {
      options: {
        banner: '<%= tag.banner %>',
        compress: true,
        beautify: false,
        mangle: false,
        preserveComments: 'some',
        sourceMap: true
      },
      dev_third_party_angular: {
        files: {
           '<%= project.src_assets_js_third_party %>/angular-bundle.min.js': [
             '<%= project.src_bower_components %>/angular/angular.min.js', 
             '<%= project.src_bower_components %>/angular-material/angular-material.min.js',
             '<%= project.src_bower_components %>/angular-animate/angular-animate.min.js',
             '<%= project.src_bower_components %>/angular-aria/angular-aria.min.js',
           ],
        }
      },
      dev_third_party: {
        files: {
           '<%= project.src_assets_js_third_party %>/plugins.min.js': [
             '<%= project.src_bower_components %>/wow/dist/wow.min.js', 
             '<%= project.src_bower_components %>/jquery/dist/jquery.min.js', 
           ],
        }
      },
      dev: {
        files: {
          '<%= project.src_assets_js %>/scripts.min.js': [
            '<%= project.src_assets_js %>/modules.js',
            '<%= project.src_assets_js %>/*.js',
            '!<%= project.src_assets_js %>/*.min.js',
          ]
        }
      }
    },

    // Secao do copy

    // copy
    copy: {
      options: {
        timestamp: true,
      },
      dist_css: {
        files: [
          { //css
            expand: false, 
            src: ['<%= project.src_assets_css %>/styles.min.css'], 
            dest: '<%= project.dist_assets_css %>/styles.min.css', 
            filter: 'isFile'
          },
        ]
      },
      dist_html: {
        files: [
          { //html
            expand: true, 
            src: ['<%= project.src %>/index.html'], 
            dest: '<%= project.app %>/', 
            filter: 'isFile',
            flatten: true
          },
          { //html templates
            expand: true, 
            src: ['<%= project.src_templates %>/*.html'], 
            dest: '<%= project.dist_templates %>/', 
            filter: 'isFile',
            flatten: true
          },
        ],
      },
      dist_img: {
        files: [
          { //img
            expand: true, 
            src: ['<%= project.src_img %>/*.*'], 
            dest: '<%= project.dist_assets_img %>/', 
            filter: 'isFile',
            flatten: true
          }
        ]
      },
      dist_files: {
        files: [
          { //img
            expand: true, 
            src: ['<%= project.src_files %>/*.*'], 
            dest: '<%= project.dist_assets_files %>/', 
            filter: 'isFile',
            flatten: true
          }
        ]
      },
      dist_js: {
        files: [
          { //js
            expand: true, 
            src: ['<%= project.src_assets_js %>/scripts.min.js'], 
            dest: '<%= project.dist_assets_js %>/', 
            filter: 'isFile',
            flatten: true
          },
          { //js angular
            expand: true, 
            src: ['<%= project.src_assets_js_third_party %>/angular-bundle.min.js'], 
            dest: '<%= project.dist_assets_js_third_party %>/', 
            filter: 'isFile',
            flatten: true
          }
        ]
      },
    },

    'http-server': {
        dev: {
            root: 'src',
            port: 8080,
        }
    },

    // Secao de HTML

    // jade
    jade: {
      dev: {
        options: {
          data: {
            debug: true,
          },
          timestamp: "<%= new Date().getTime() %>",
          pretty: true
        },
        files: {
          "<%= project.src %>/index.html": ["<%= project.src_jade %>/index.jade"]
        }
      }
    },


    // Secao do watch

    watch: {
      options: {
        interrupt: true,
      },
      scss: {
        files: ['<%= project.src_sass %>/*.scss'],
        tasks: ['sass'],
        // options: {
        //   interval: 1000,
        // },
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
        files: ['<%= project.src_jade %>/*.jade', '<%= project.src_jade %>/*.html'],
        tasks: ['jade'],
      }
    },

    concurrent: {
      options: {
        logConcurrentOutput: true
      },
      tasks: ['http-server', 'watch']
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
  // grunt.loadNpmTasks('grunt-nodemon');

  // Tasks
  grunt.registerTask('dev', ['newer:sass', 'newer:jade', 'newer:uglify', 'concurrent:tasks']);
  grunt.registerTask('default', ['mkdir', 'newer:sass', 'newer:postcss', 'newer:cssmin', 'newer:modernizr', 'newer:uglify:dev_third_party', 'newer:uglify:dev_third_party_angular', 'newer:uglify:dev', 'newer:copy']);
};
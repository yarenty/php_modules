module.exports = function (grunt) {
    grunt.initConfig({
        pkg:            grunt.file.readJSON('package.json'),
        clean:          ['target', 'dist'],
        requirejs:      {
            basic: {
                options: {
                    baseUrl:          'src',
                    removeCombined:   true,
                    optimize:         'uglify2',
                    dir:              'target'
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');

    grunt.registerTask('default', ['clean', 'requirejs']);
    grunt.registerTask('publish', ['default', 'requirejs']);


    grunt.loadTasks('bower_components/grunt-gridfs/tasks');
   grunt.registerTask('package', ['default', 'compress']);


};
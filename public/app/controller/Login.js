Ext.define('CK.controller.Login', {
    extend: 'Ext.app.Controller',

    views: [ 'login.Form', 'Singleviewport'],

    init: function() {
        this.control({
            'viewport > window': {
                render: this.onWindowRendered
            }
        });
    },

    onWindowRendered: function() {
        console.log('The window is rendered');
    }
});

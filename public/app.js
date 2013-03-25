Ext.application({
    requires: ['Ext.container.Viewport'],
    name: 'CK',

    appFolder: 'app',


    controllers: [ 'Login'],

    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'auto',
            bodyCls: 'parentContainer',
            items:
            [{
                xtype: 'singleview',
                region: 'center',
                
                items: [{
                    xtype: 'loginform',
                    width: 350
                }]
            }
            ]
        });
    }
});
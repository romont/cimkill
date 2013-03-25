Ext.application({
    requires: ['Ext.container.Viewport'],
    name: 'CK',

    appFolder: 'app',


    controllers: [ 'Login'],

    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items:
            [{
                xtype: 'singleview',
                bodyCls: 'parentContainer',
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
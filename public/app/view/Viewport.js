Ext.define('CK.view.Viewport', {
    extend: 'Ext.container.Viewport',
    requires: [
        'Ext.layout.container.Border',
        'Ext.layout.container.HBox',
        'CK.view.List'
    ],
    
    layout: 'border',
    
    items: [
        {
            region: 'north',
            xtype : 'pageHeader'
        },
        
        {
            region: 'center',
            
            layout: {
                type : 'hbox',
                align: 'stretch'
            },
            
            items: [
                {
                    width: 250,
                    bodyPadding: 5,
                    xtype: 'exampleList'
                },
                
                {
                    cls: 'x-example-panel',
                    flex: 1,
                    title: '&nbsp;',
                    id   : 'examplePanel',
                    layout: {
                        type: 'vbox',
                        align: 'left',
                        pack: 'top'
                    },
                    overflowY: 'auto',
                    bodyPadding: 0
                }
            ]
        },
        {
            xtype: 'pageHeader',
            region: 'south',
            height: 13
        }
    ]
});

Ext.define('CK.view.Header', {
    extend: 'Ext.Toolbar',
    xtype : 'pageHeader',
    
    ui   : 'sencha',
    height: 53,
    
    items: [
        {
            xtype: 'component',
            cls  : 'x-logo',
            html : 'Cimkill'
        }
    ]
});

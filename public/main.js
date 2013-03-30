Ext.application({
    name: 'CK',

    autoCreateViewport: true,

    requires: [
        'Ext.window.MessageBox'
    ],

    controllers: [
        'Main'
    ],

    launch: function(){
        if (!Ext.isWebKit) {
            Ext.MessageBox.alert('WebKit Only', 'Cimkill is fully supported in Google Chrome, Mozilla Firefox, and Safari browsers.');
        }
    }
});

Ext.define('CK.view.login.Form', {
    extend: 'Ext.form.Panel',
    width: 350,
    bodyPadding: 5,

    alias: 'widget.loginform',

    title: 'Login to Cimkill',
    layout: 'anchor',
    defaults: {
        anchor: '100%'
    },
    initComponent: function() {
        this.items = [
        {
            xtype: 'textfield',
            name: 'email',
            fieldLabel: 'Email',
            allowBlank: false
        },
        {
            xtype: 'textfield',
            name: 'password',
            fieldLabel: 'Password',
            inputType: 'password',
            allowBlank: false
        },
        {
            xtype: 'button',
            text: 'Log In',
            formBind: true,
            disabled: true
        }
        ];

    this.callParent(arguments);
    //renderTo: Ext.getBody()
    }

});
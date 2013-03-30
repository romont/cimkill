Ext.define('CK.view.login.Form', {
    extend: 'Ext.form.Panel',
    width: 350,
    bodyPadding: 5,

    alias: 'widget.loginform',
    name: 'loginform',

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
            allowBlank: false,
            inputType: 'text'
        },
        {
            xtype: 'textfield',
            name: 'password',
            fieldLabel: 'Password',
            inputType: 'password',
            allowBlank: false
        },
        
        ];

        this.buttons = [
        {
            xtype: 'button',
            text: 'Log In',
            name: 'loginButton',
            action: 'login',
            formBind: true,
            disabled: true
        }
        ]

        this.callParent(arguments);
    //renderTo: Ext.getBody()
    }

});
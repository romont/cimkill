Ext.define('CK.controller.Login', {
    extend: 'Ext.app.Controller',

    models: ['Employee'],
    stores: ['Employees'],

    views: [ 'login.Form', 'Singleviewport'],

    refs: [
    {
        ref: 'loginForm',
        selector: 'form'
    },
    {
        ref: 'loginButton',
        selector: 'loginform button[action=login]'
    }
    ],
    /*init: function() {
        this.control({
            'viewport > window': {
                render: this.onWindowRendered
            }
        });
    },*/
    init: function() {
        this.control({
            'loginform button[action=login]': {
                //render: this.onWindowRendered,
                click: function(button)
                {
                    console.log = "Button clicked";
                    var store = this.getEmployeesStore();
                    var loginButton = button;

                    this.getLoginForm().form.submit({
                        waitMsg:'Loading...',
                        url: '/momar/auth/create',
                        method: 'POST',
                        success: function(form,action) {
                            //store.load();
                            //store.sync();
                            
                            loginButton.setVisible(false);
                            window.location = '/index';
                            
                        },
                        failure: function(form,action){
                            Ext.MessageBox.alert('Error', "Invalid email/password");
                        },
                        params:
                        {
                            //view: 'sencha',
                            json: true
                        }
                    });
                }
            }
        });
    },

    onWindowRendered: function() {
        console.log('The window is rendered');
    }
});

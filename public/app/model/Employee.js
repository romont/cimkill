Ext.define('CK.model.Employee', {
    extend: 'Ext.data.Model',
    fields: ['email', 'isAdmin', 'authenticated', 'loggedOut']
});
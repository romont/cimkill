Ext.define('CK.store.Employees', {
    extend: 'Ext.data.Store',
    model: 'CK.model.Employee',

    autoLoad: true,

    proxy: {
        type: 'ajax',
        url: '/login/authenticate',
        method: 'POST',
        reader: {
            type: 'json',
            root: 'model',
            successProperty: 'model.success'
        }
    }
});
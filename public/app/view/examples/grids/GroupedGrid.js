Ext.define('CK.view.examples.grids.GroupedGrid', {
    extend: 'CK.view.examples.Example',
    requires: [
        'Ext.grid.Panel',
        'Ext.grid.feature.Grouping',
        'CK.store.Restaurants'
    ],
    
    items: [
        {
            xtype: 'grid',
            
            title: 'Restaurants',
            frame: true,
            
            store: 'Restaurants',
            
            columns: [
                { text: 'Name', flex: 1, dataIndex: 'name' },
                { text: 'Cuisine', flex: 1, dataIndex: 'cuisine' }
            ],
            
            features: [{
                ftype: 'grouping',
                hideGroupedHeader: true,
                groupHeaderTpl: 'Cuisine: {name} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})'
            }]
        }
    ]
});

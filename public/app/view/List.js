Ext.define('CK.view.List', {
    extend: 'Ext.tree.Panel',
    xtype: 'exampleList',
    
    requires: [
        'CK.store.Examples',
        'CK.view.examples.Example',
        'CK.view.examples.forms.Contact',
        'CK.view.examples.forms.Login',
        'CK.view.examples.forms.Register',
        'CK.view.examples.grids.GroupedHeaderGrid',
        /*'CK.view.examples.PanelExample',
        'CK.view.examples.grids.BasicGrid',
        'CK.view.examples.grids.GroupedGrid'
        'CK.view.examples.grids.GroupedHeaderGrid',
        'CK.view.examples.grids.LockedGrid',
        'CK.view.examples.panels.BasicPanel',
        'CK.view.examples.panels.FramedPanel',
        'CK.view.examples.tabs.BasicTabs',
        'CK.view.examples.tabs.FramedTabs',
        'CK.view.examples.tabs.IconTabs',
        'CK.view.examples.tabs.TitledTabPanels',
        'CK.view.examples.toolbars.BasicToolbar',
        'CK.view.examples.toolbars.DockedToolbar',
        'CK.view.examples.trees.BasicTree',
        'CK.view.examples.windows.BasicWindow'*/
    ],
    
    title: 'Examples',
    rootVisible: false,
	
	cls: 'examples-list',
    
    lines: false,
    useArrows: true,
    
    store: 'Examples'
});

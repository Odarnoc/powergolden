//==============================================================================
//
//  Application startup
//
//==============================================================================

jQuery(function($)
{
    // -----

    var config = window.chatConfig;
    
    // Preload resources
    
    $.get(config.templatesPath, function(data)
    {
        var templates = $(data);
        
        // -----
        
        var app = window.Application;
        
        // Initialize services
        
        app.service.soundPlayer = new app.SoundPlayer();

        // Initialize templates

        app.template.message                     = templates.find('#message').html();
        app.template.operatorItem                = templates.find('#operator-item').html();
        app.template.installDialogContent        = templates.find('#dialog-install-content').html();
        app.template.invalidInstallDialogContent = templates.find('#dialog-invalid-install-content').html();
        app.template.confirmDialog               = templates.find('#dialog-confirm').html();
        app.template.formErrorDialog             = templates.find('#dialog-form-error').html();
        app.template.historyListItem             = templates.find('#history-list-item').html();
        app.template.historyListDisplayMore      = templates.find('#history-list-display-more').html();
        app.template.userInfoPopoverContent      = templates.find('#user-info-popover-content').html();
        app.template.tabButtonChat               = templates.find('#tab-button-chat').html();
        app.template.tabContentChat              = templates.find('#tab-content-chat').html();
        
        // Initialize models
        
        app.model.user           = new app.UserModel(window.userData);
        app.model.uiSettings     = new app.UISettingsModel();
        app.model.logs           = new app.LogsModel();
        app.model.settings       = new app.AdminSettingsModel();
        app.model.chat           = new app.AdminChatModel();
        
        app.model.user.listenTo(app.model.chat, 'operator:saved', function(user)
        {
            if(user.id === this.get('id')) this.set(user);
        });
        
        // Initialize views
        
        app.view.dialogs = new app.DialogsView();
        app.view.window  = new app.WindowView ({ el : '#customer-chat', model : app.model.chat });
    });
});
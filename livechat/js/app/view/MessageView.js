//==============================================================================
//
//  Message view
//
//==============================================================================

(function(app, config, $)
{
    var URL_EXP = /(\w+:\/\/)?([\da-z\.\-@]+)\.([a-z\.]{2,})([?&=%#;\/\w\.-]*)*\/?/g;
    
    var MessageView = app.MessageView = Backbone.View.extend({
        
        initialize : function()
        {
            // Initialize models
            
            this.settings = app.model.settings;
            
            // Handle rendering
            
            this.listenTo(this.model, 'change', this.render);
            
            // Initialize the content
            
            this.render();
            
            // Fade in
            
            this.$el.hide();
            this.$el.fadeIn('fast');
        },
        
        render : function()
        {
            // Clear the view
            
            this.$el.html($(app.template.message));
            
            // Cache elements
            
            this.$time = this.$('.customer-chat-content-message-time');
            
            // Fill the element with data
            
            var body = this.model.get('body').split('<').join('&lt;').split('>').join('&gt;');
            
            body = this.prepareMessage(body);
            
            this.$('.customer-chat-content-message-author').html(this.model.getReadableName() || this.model.get('author'));
            this.$('.customer-chat-content-message-body')  .html(body);
            
            this.updateTime(true);
            
            // Personalize based on the user type
            
            if(this.model.get('authorType') == 'operator')
            {
                this.$('.customer-chat-content-message').removeClass('customer-chat-content-message').addClass('customer-chat-content-message-operator');
            }
            
            // Initialize user info popover
            
            if(app.UserInfoPopoverView)
            {
                new app.UserInfoPopoverView({ model : this.model, button : this.$('.customer-chat-content-message-author')[0] });
            }
        },
        
        prepareMessage : function(body)
        {
            // Create link elements
            
            body = body.replace(URL_EXP, function(full, protocol)
            {
                if(full.indexOf('@')  !== -1) return full; // Skip e-mail addresses
                if(full.indexOf('..') !== -1) return full; // Skip URLs with empty subdomains
                
                return MessageView.createLinkElement(full, (protocol ? '' : 'http://') + full);
            });
            
            return body;
        },
        
        updateTime : function(reschedule)
        {
            // Update the time field
            
            var seconds = this.model.getAge();
            
            var minutes = Math.floor(seconds / 60);
            var hours   = Math.floor(minutes / 60);
            var days    = Math.floor(hours   / 24);
            var weeks   = Math.floor(days    /  7);
            var time    = this.model.get('time');
            
            var fullDate     = (time.getDate() < 10 ? '0' : '') + time.getDate() + '.' + ((time.getMonth() + 1) < 10 ? '0' : '') + (time.getMonth() + 1) + '.' + time.getFullYear();
            var fullTime     = (time.getHours() < 10 ? '0' : '') + time.getHours() + ':' + (time.getMinutes() < 10 ? '0' : '') + time.getMinutes() + ':' + (time.getSeconds() < 10 ? '0' : '') + time.getSeconds();
            var fullDateTime = fullDate + ' ' + fullTime;
            
            // Always display the full date, if desired
            
            if(this.options.fullDate)
            {
                this.$time.html(fullDateTime);
                
                return;
            }
            
            var text =
                
                weeks   > 0 ? fullDateTime :
                days    > 0 ? days    + ' ' + config.ui.timeDaysAgo    :
                hours   > 0 ? hours   + ' ' + config.ui.timeHoursAgo   :
                minutes > 0 ? minutes + ' ' + config.ui.timeMinutesAgo :
                              Math.max((seconds - seconds % 5), 1) + ' ' + config.ui.timeSecondsAgo
            ;
            
            this.$time.html(text);
            
            // Reschedule the update
            
            if(reschedule)
            {
                var nextTimeout = 
                
                    days    > 0 ? -1                            :
                    hours   > 0 ? (60 - minutes % 60) * 60 * 60 :
                    minutes > 5 ? (5 - minutes % 5) * 60        :
                    minutes > 0 ? 60                            :
                                  10 - seconds % 10
                ;
                
                if(nextTimeout == -1)
                {
                    return;
                }
                
                // -----
                
                var self = this;
                
                this.timerId = setTimeout(function()
                {
                    self.updateTime(true);
                
                }, nextTimeout * 1000);
            }
        },
        
        clean : function()
        {
            // Stop update timer
            
            if(this.timerId) clearTimeout(this.timerId);
            
            return this;
        }
    },
    {
        createLinkElement : function(text, url)
        {
            // Break lines if necessary
            
            if(text.length > 40)
            {
            }
            
            return '<a href="' + url + '" target="_blank">' + text + '</a>';
        }
    });

})(window.Application, window.chatConfig, jQuery);
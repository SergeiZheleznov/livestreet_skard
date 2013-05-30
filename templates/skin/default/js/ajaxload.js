var ls = ls || {};

ls.skard =( function ($) {
    this.isBusy = false;
    this.getRandomTopic = function (target) {
        if (this.isBusy) {
            return;
        }
        this.isBusy = true;
        target.addClass('skard-busy');
        ls.ajax(aRouter['ajax']+'skard', {}, function(data) {
            if (data.bStateError) {
                ls.msg.error(data.sMsgTitle,data.sMsg);
            } else {
                target.poshytip('destroy');
                target.poshytip({
                    content: data.sText,
                    showOn: 'none',
                    alignTo: 'target',
                    alignX: 'left',
                    alignY: 'center',
                    offsetX: 10,
                    offsetY: 5
                });
                target.poshytip('show');
            }
            this.isBusy = false;
            target.removeClass('skard-busy');
        }.bind(this));
    }
    this.clearTooltip = function () {
        $('.skard-poshytip').poshytip('destroy');
    }
    return this;
}).call(ls.skard || {},jQuery);

jQuery(document).ready(function($){
    $(".skard-poshytip").click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        ls.skard.clearTooltip();
    });
});
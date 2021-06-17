jQuery(document).ready(function ($) {
    $('reset').click(function () {
        var self=$(this);
        self.addClass('load');
        var post_id = $(this).attr('value');
      var elc= $(this).parent().find($('span'));
      elc.css('visibility','hidden');
       
        $.ajax({
            type: 'POST',
            url: utechia_ads_reset.ajax_url,
            data: {
                action: 'utechia_ads_reset',
                post_id: post_id
            },
            success: function (data) {
                console.log( elc.html(data));
                console.log(data);
                self.removeClass('load');
                elc.css('visibility','visible');
               
            }
        });
    })
})

var appname = 'litotes';
var readyStatus = false;

$(document).ready(function(){
    let id = $(location).attr('pathname').replace(/\//, '');

    if(/(^[a-zA-Z0-9]{1,10}\.md$)/.test(id)){
        pullid = id.replace(/\.md/, '');
        $(document).attr('title', appname + ' /' + id);

        $.get('/api/pullNote', {id: pullid})
        .done(function(data){
            $('.markdown-body').html(DOMPurify.sanitize(markdownit().render(data)));
        });
    }
    else{
        $.get('/api/randNote')
        .done(function(data){
            $(location).attr('pathname', '/' + data);
        });
    }
});
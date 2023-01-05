var appname = 'litotes';

$(document).ready(function(){
    let id = $(location).attr('pathname').replace(/\//, '');

    if(/(^[a-zA-Z0-9]{1,10}$)/.test(id)){
        $(document).attr('title', appname + ' /' + id);

        $.get('/api/pullNote', {id: id})
        .done(function(data){
            $('.note').val(data);
            let note = $('.note').val();
            setInterval(function(){
                if (note !== $('.note').val()){
                    note = $('.note').val();
                    $.post('/api/pushNote', {id: id, note: note});
                }
            }, 5000);
        });
    }
    else{
        $.get('/api/randNote')
        .done(function(data){
            $(location).attr('pathname', '/' + data);
        });
    }
});

$(window).on('beforeunload', function(event){
    let id = $(location).attr('pathname').replace(/\//, '');
    let note = $('.note').val();

    if(/(^[a-zA-Z0-9]{1,10}$)/.test(id)){
        $.post('/api/pushNote', {id: id, note: note});
    }

    event.preventDefault();
    event.returnValue = '';
});
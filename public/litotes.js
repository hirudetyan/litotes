$(document).ready(function(){
    var id = $(location).attr('pathname').replace(/\//,"");

    if(/(^[a-zA-Z0-9]{1,10}$)/.test(id)){
        $.get("/api/pullNote", {id: id})
        .done(function(data){
            $(".note").val(data);
            var note = $(".note").val();
            setInterval(function(){
                if (note !== $(".note").val()){
                    note = $(".note").val();
                    $.post("/api/pushNote", {id: id, note: note});
                }
            }, 5000);
        });
    }
    else{
        $.get("/api/randNote")
        .done(function(data){
            $(location).attr('pathname', '/' + data);
        });
    }
});

$(window).on("beforeunload", function(event){
    var id = $(location).attr('pathname').replace(/\//,"");
    var note = $(".note").val();

    if(/(^[a-zA-Z0-9]{1,10}$)/.test(id)){
        $.post("/api/pushNote", {id: id, note: note});
    }

    event.preventDefault();
    event.returnValue = '';
});
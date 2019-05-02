$('#conteudo').load($(this).attr('href'), function(responseText, statusText, xhr)
                {
    if( status == "error" ) {

        $( '#conteudo' ).load( '/error/error' + xhr.status );
    }
});
<html>
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cont&aacute;ctanos Farmacias Bys</title>
        {{HTML::style('fonts/stylesheet.css')}}
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/home.css')}}
        {{HTML::style('css/contactanos.css')}}
    </head>
    <body>
        <div class="container">
            {{$header_home}}
            
            <div class="container-contacto">

                <span class="text-purple titulo-principal">Cont&aacute;ctanos</span>

                <div class="contacto">
                    <form method="post" class="form-vertical" id="registrar-form">           

                        <div class="control-group">                       
                            <div class="controls">
                                <span div="requerid">*</span>
                                <input id="id_nombre" type="text" name="nombre" placeholder="Nombre" maxlength="50" required/>
                            </div>
                        </div>
                        <div class="control-group">                       
                            <div class="controls">
                                <span div="requerid">*</span>
                                <input id="id_correo" type="text" name="correo" placeholder="Correo" maxlength="50" required/>
                            </div>
                        </div>
                        <div class="control-group">                       
                            <div class="controls">
                                <input id="id_asunto" type="text" name="asunto" placeholder="Asunto" maxlength="20"/>
                            </div>
                        </div>
                        <div class="control-group">                       
                            <div class="controls">
                                <textarea id="id_comentario" type="text" name="comentario" cols="5" placeholder="Comentario"/></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">  
                                <button type="submit" class="btn right" id="button">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{$footer_home}}    
        </div>
    </body>
</html>

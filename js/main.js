(function(){
    "use strict"
    document.addEventListener('DOMContentLoaded', function(){
        if(document.getElementById('mapa')){
            var map = L.map('mapa').setView([20.669637, -103.37431], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([20.669637, -103.37431]).addTo(map)
                .bindPopup('Location from company')
                .openPopup();
        }

            
        if(document.getElementById('calcular')){
            var regalo = document.getElementById('regalo');
            //campos datos usuarios
            var nombre =document.getElementById('nombre');
            var apellido = document.getElementById('apellido');
            var email = document.getElementById('email');
            //campos pases
            var pase_dia = document.getElementById('pase_dia');
            var pase_dosdias = document.getElementById('pase_dosdias');
            var pase_completo = document.getElementById('pase_completo');
            //Botones y divs
            var calcular = document.getElementById('calcular');
            var errorDiv = document.getElementById('error');
            var botonRegistro = document.getElementById('btnRegistro');
            var listaProducto = document.getElementById('lista-productos');
            var suma = document.getElementById('suma-total');

            botonRegistro.disabled = true;

            // extras
            var camisas = document.getElementById('camisa_evento');
            var etiquetas = document.getElementById('etiquetas');
            calcular.addEventListener('click',calcularMontos);

            pase_dia.addEventListener('blur',mostrarDias);
            pase_dosdias.addEventListener('blur',mostrarDias);
            pase_completo.addEventListener('blur',mostrarDias);

            nombre.addEventListener('blur',validarCampos);
            apellido.addEventListener('blur',validarCampos);
            email.addEventListener('blur',validarCampos);
            email.addEventListener('blur',validarEmail);
        }
        function validarCampos(){
            if(this.value == ''){
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "este campo es obligatorio";
                this.style.border = "1px solid red";
                errorDiv.style.border = '1px solid red';
            }else{
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            }
        }
        function validarEmail(){
            if(this.value.indexOf("@") > -1){
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            }else{
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "debe de tener almenos un arroba";
                this.style.border = "1px solid red";
                errorDiv.style.border = '1px solid red';
            }
        }


        function calcularMontos(event){
            event.preventDefault();
            if(regalo.value ===''){
                alert("Debes elegir un regalo");
                regalo.focus();
            }else{
                var boletoDia = parseInt(pase_dia.value,10) || 0,
                boletos2Dias = parseInt(pase_dosdias.value,10) || 0,
                boletosCompletos = parseInt(pase_completo.value,10) || 0,
                ncamisas = parseInt(camisas.value,10) || 0,
                nEtiquetas = parseInt(etiquetas.value,10) || 0;

                var totalPagar = (boletoDia *30) + (boletos2Dias*45) + (boletosCompletos * 50) + (ncamisas *10*.93) + (nEtiquetas*2);
                
                var listadoProductos = [];

                if(boletoDia >= 1){
                    listadoProductos.push(boletoDia + ' Pases por dia')
                }
                if(boletos2Dias >= 1){
                    listadoProductos.push(boletos2Dias + ' Pases por 2 dias');
                }
                if(boletosCompletos >= 1){
                    listadoProductos.push(boletosCompletos + ' Pases completos');
                }
                if(ncamisas>=1){
                    listadoProductos.push(ncamisas + ' Camisas');
                }
                if(nEtiquetas>=1){
                    listadoProductos.push(nEtiquetas + ' Etiquetas')
                }
                listaProducto.style.display = "block";
                listaProducto.innerHTML = '';
                for(var producto of listadoProductos){
                    console.log(producto);
                    listaProducto.innerHTML += producto + '<br/>';
                }

                suma.innerHTML = "$ " + totalPagar.toFixed(2);
                
                botonRegistro.disabled = false;
                document.getElementById('total_pedido').value = totalPagar;
            }
        }

        function mostrarDias(){
            var boletosDia = parseInt(pase_dia.value,10) || 0,
            boletos2Dias = parseInt(pase_dosdias.value,10) || 0,
            boletosCompletos = parseInt(pase_completo.value,10) ||0;

            var diasElegidos = [];
            if(boletosDia > 0){
                diasElegidos.push('viernes');
            }
            if(boletos2Dias>0){
                diasElegidos.push('viernes','sabado');
            }
            if(boletosCompletos>0){
                diasElegidos.push('viernes','sabado','domingo');
            }
            for(var dia of diasElegidos){
                document.getElementById(dia).style.display = 'block';
            }
        }
        
    });//DOM Content Loaded
})();


$(function(){   


    //Menu fijo

    var windowHeight = $(window).height();//opbtener la aulta de la ventana
    var barraAltura = $('.barra').innerHeight();//obtener la altura de la barra

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top':'0px'});

        }
    });

    //Menu Responsive
    $('.menu-movil').on('click',function(){
        $('.navegacion-principal').slideToggle();
    });

    //Seleccionar un indice del menu
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitado .navegacion-principal a:contains("Invitados")').addClass('activo');


    //Programa de conferencia
    $('div.ocultar').hide();
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click',function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('div.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    })
    if(document.getElementById('cuenta-regresiva')){

        //Animacion para los numeros
        $('.resumen-evento li:nth-child(1) p').animateNumber({number:6}, 1200);
        $('.resumen-evento li:nth-child(2) p').animateNumber({number:15}, 1200);
        $('.resumen-evento li:nth-child(3) p').animateNumber({number:3}, 1200);
        $('.resumen-evento li:nth-child(4) p').animateNumber({number:9}, 1200);
        //cuenta Regresiva
        $('.cuenta-regresiva').countdown('2020/01/23 06:00:00', function(event){
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
        });
    }
    
});
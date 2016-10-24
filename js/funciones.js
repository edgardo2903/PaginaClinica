   var nav4 = window.Event ? true : false;

  function ValidaNumero(evt,obj)
  {
    var key = nav4 ? evt.which : evt.keyCode;
    var referencia; var d=String; var dec=String("");
    var valor = String(obj.value); 
    if (key<=13 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key==188)
    {   
      for (x=0; x<=valor.length;x++)
      {
        if (valor.indexOf('.')>-1) 
        { valor=valor.substr(0,valor.indexOf('.')) + valor.substr(valor.indexOf('.')+1,valor.length); }
      }
      var ext=valor.length;
      if (valor.indexOf(',')>-1) 
      { 
        dec = valor.substr(valor.indexOf(','),ext); 
        valor=valor.substr(0,valor.indexOf(','));
        ext = ext - dec.length;
        for (x=0; x<=dec.length;x++)
        {
          if (dec.indexOf(',')>-1) 
          { dec=dec.substr(0,dec.indexOf(',')) + dec.substr(dec.indexOf(',')+1,dec.length); }
        }
        dec = "," + dec;
      }
      var nn=Number(ext); 
      for (x=0;x<ext; x++) { nn = nn -3; if (nn < 3) { break;} }
      d=valor;
      for (x=ext-3;x>0; x=x-3) { d=d.substr(0,x) + '.' + d.substr(x,ext-x+7); }
      d = d + dec;
    }
    else
    {   
      var car = Number(key);
      valor=valor.toUpperCase();
      valor=valor.replace(/(^\.*)|(\.*$)/g,"");
      d=valor.replace(d.fromCharCode(car),"");
    }
    return d;
  }

function mayusculas(campo)
{
    campo.value=campo.value.toUpperCase();
}

function soloNumeros()
{
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
    event.preventDefault();
}

function soloLetras(e)
{
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = [8,37,39,46];

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function validarfecha(e)
{
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890/";
   especiales = [8,37,39,46];

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function quitaCero(campo)
{
  $(campo).val("");
}

function ponCero(campo)
{
  if($(campo).val()=="")
    $(campo).val("00/00/0000");
}

/*----------Funcion para obtener la edad------------*/
//(dd/mm/yyyy)
function calcular_edad(fecha) {
  var fechaActual = new Date()
  var diaActual = fechaActual.getDate();
  var mmActual = fechaActual.getMonth() + 1;
  var yyyyActual = fechaActual.getFullYear();
  FechaNac = fecha.split("/");
  var diaCumple = FechaNac[0];
  var mmCumple = FechaNac[1];
  var yyyyCumple = FechaNac[2];
  //retiramos el primer cero de la izquierda
  if (mmCumple.substr(0,1) == 0) {
  mmCumple= mmCumple.substring(1, 2);
  }
  //retiramos el primer cero de la izquierda
  if (diaCumple.substr(0, 1) == 0) {
  diaCumple = diaCumple.substring(1, 2);
  }
  var edad = yyyyActual - yyyyCumple;

  //validamos si el mes de cumpleaños es menor al actual
  //o si el mes de cumpleaños es igual al actual
  //y el dia actual es menor al del nacimiento
  //De ser asi, se resta un año
  if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
  edad--;
  }
  return edad;
};

function validarposicion(e)
{
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890.";
   especiales = [8,37,39,46];

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function validaCorreo(id)
{
    if(document.getElementById(id).value!="")
    {
         var partes_cor=document.getElementById(id).value.split("@");
         if(partes_cor[0]=="")
         {
            BootstrapDialog.show({
              title: '<b style="font-size:16px;">Informaci&oacute;n</b>',
              message: '<div style="margin:0 auto;text-align: center;font-size:16px;">¡Correo mal escrito!</div>',
              onhidden: function(dialogItself){
                             $("#"+id).val("");
                          },
                    buttons: 
                    [
                      {
                    label: 'Ok',
                    action: function(dialogItself){
                            dialogItself.close();
                        }
                    }
                    ]
                });
            return false;
         }
         if(partes_cor[1]== null || partes_cor[1]=="")
         {
            BootstrapDialog.show({
              title: '<b style="font-size:16px;">Informaci&oacute;n</b>',
              message: '<div style="margin:0 auto;text-align: center;font-size:16px;">¡Correo mal escrito!</div>',
              onhidden: function(dialogItself){
                             $("#"+id).val("");
                          },
                    buttons: 
                    [
                      {
                    label: 'Ok',
                    action: function(dialogItself){
                            dialogItself.close();
                        }
                    }
                    ]
                });
            return false;
         }
          else
          {
               var partes_ext=partes_cor[1].split(".");
               if(partes_ext[0]=="")
               {
                    BootstrapDialog.show({
                      title: '<b style="font-size:16px;">Informaci&oacute;n</b>',
                      message: '<div style="margin:0 auto;text-align: center;font-size:16px;">¡Correo mal escrito!</div>',
                      onhidden: function(dialogItself){
                                     $("#"+id).val("");
                                  },
                            buttons: 
                            [
                              {
                            label: 'Ok',
                            action: function(dialogItself){
                                    dialogItself.close();
                                }
                            }
                            ]
                        });
                    return false;
               }
               if(partes_ext[1]== null || partes_ext[1]=="")
               {
                  BootstrapDialog.show({
                    title: '<b style="font-size:16px;">Informaci&oacute;n</b>',
                    message: '<div style="margin:0 auto;text-align: center;font-size:16px;">¡Correo mal escrito!</div>',
                    onhidden: function(dialogItself){
                                   $("#"+id).val("");
                                },
                          buttons: 
                          [
                            {
                          label: 'Ok',
                          action: function(dialogItself){
                                  dialogItself.close();
                              }
                          }
                          ]
                      });
                  return false;
               }
          }
          return true;
      }
}

var patron = new Array(2,2,4);
var patron2 = new Array(1,3,3,3,3);
var patron3 = new Array(2,2);
var patron4 = new Array(4,7);
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
  val = d.value
  largo = val.length
  val = val.split(sep)
  val2 = ''
  for(r=0;r<val.length;r++){
    val2 += val[r]  
  }
  if(nums){
    for(z=0;z<val2.length;z++){
      if(isNaN(val2.charAt(z))){
        letra = new RegExp(val2.charAt(z),"g")
        val2 = val2.replace(letra,"")
      }
    }
  }
  val = ''
  val3 = new Array()
  for(s=0; s<pat.length; s++){
    val3[s] = val2.substring(0,pat[s])
    val2 = val2.substr(pat[s])
  }
  for(q=0;q<val3.length; q++){
    if(q ==0){
      val = val3[q]
    }
    else{
      if(val3[q] != ""){
        val += sep + val3[q]
        }
    }
  }
  d.value = val
  d.valant = val
  }
}


function fechaPosterior(desde,hasta)
{
      //cambiarian lo que hay dentro del getElement... por los elementos que contienen las fechas a validar
      // la fecha debe tener el formato siguiente dd/mm/yyyy
      var fechaInicio = document.getElementById(desde);
      var fechaFin = document.getElementById(hasta);
      var anio = parseInt(fechaInicio.value.substring(6,10));
      var mes = fechaInicio.value.substring(3,5);
      var dia = fechaInicio.value.substring(0,2);
      var c_anio = parseInt(fechaFin.value.substring(6,10));
      var c_mes = fechaFin.value.substring(3,5);
      var c_dia = fechaFin.value.substring(0,2);
      if(c_anio > anio)
          return(true);
      else{
          if (c_anio == anio){
              if(c_mes > mes)
                  return(true);
              if(c_mes == mes)
                  if(c_dia >= dia)
                      return(true);
                  else
                      return(false);
              else
                  return(false);
          }else
              return(false);
      }
  }

/*crear_dialog("titulo","mensaje","idfocus","funcioncerrar","funcionboton")*/
function crear_dialog(titulo,mensaje,idfocus,funcioncerrar,funcionboton)
{
    BootstrapDialog.show({
        title: '<b style="font-size:16px;">'+titulo+'</b>',
        message: '<div style="margin:0 auto;text-align: center;font-size:16px;max-height:300px;overflow:auto;">'+mensaje+'</div>',
        onhidden: function(dialogItself)
        {
            if(funcioncerrar=="reload")
                window.location.reload();
            else
                eval(funcioncerrar);

            if(idfocus!="" || idfocus!=undefined)
                $("#"+idfocus).focus();
        },
        buttons: 
        [
            {
                label: 'Ok',
                action: function(dialogItself)
                {
                  if(funcionboton!="" && funcionboton!=undefined)
                    eval(funcionboton);

                    dialogItself.close();
                }
            }
        ]
    });

    $(".modal-header").css("background-color","lightblue");
}

/*crear_modal("titulo","mensaje","tipo","idfocus","funcioncerrar","funcionboton")*/

function crear_modal(titulo,mensaje,tipo,idfocus,funcioncerrar,funcionboton)
{
    //===> Aqui cambio la sombra para cada tipo de modal
    if(tipo!="" && tipo!=undefined)
    {
      if(tipo=="warning")
        $(".sweet-alert").css("box-shadow","inset 0px 0px 20px 8px rgb(248, 197, 134)");
      else if(tipo=="success")
        $(".sweet-alert").css("box-shadow","inset 0px 0px 20px 8px rgb(92, 184, 92)");
      else if(tipo=="error")
        $(".sweet-alert").css("box-shadow","inset 0px 0px 20px 8px rgb(217, 83, 79)");
      else if(tipo=="info")
        $(".sweet-alert").css("box-shadow","inset 0px 0px 20px 8px rgb(91, 192, 222)");
    }

        swal({
          title:titulo,
          text: mensaje,
          html: true,
          type: tipo,
          showCancelButton: false,
          confirmButtonClass: 'btn-default',
          confirmButtonText: 'Ok',
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm){
            if(idfocus!="" && idfocus!=undefined)
            {
              setTimeout(function() {
              $("#"+idfocus).focus();
            }, 500);
            }
            if(funcioncerrar!="" && funcioncerrar!=undefined)
              setTimeout(function() {
                if(funcioncerrar=="reload")
                  window.location.reload();
                else
                  eval(funcioncerrar);
              },500);
            if(funcionboton!="" && funcionboton!=undefined)
              setTimeout(function() {
                eval(funcionboton); 
              },500);          
          }
        });
}

function capaBloqueo()
{
  $.blockUI({ css: { 
      border: 'none', 
      padding: '15px', 
      backgroundColor: '#000', 
      '-webkit-border-radius': '10px', 
      '-moz-border-radius': '10px', 
      opacity: .5, 
      color: '#fff' 
  } }); 
}

function quitarCapa()
{
  setTimeout($.unblockUI); 
}

function number_format(number, decimals, dec_point, thousands_sep) {
  //   example 1: number_format(1234.56);
  //   returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' ');
  //   returns 2: '1 234,56'
  //   example 3: number_format(1234.5678, 2, '.', '');
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.');
  //   returns 4: '67,00'
  //   example 5: number_format(1000);
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2);
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1);
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.');
  //   returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0);
  //   returns 9: '1'
  //  example 10: number_format('1.20', 2);
  //  returns 10: '1.20'
  //  example 11: number_format('1.20', 4);
  //  returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3);
  //  returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' ');
  //  returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', '');
  //  returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

//====> Exportar
function exportarE(nombre)
{
    $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_tabla").eq(0).clone()).html());
    var datos=encodeURIComponent($('#Exportar_tabla').html());
    window.open('funcionesphp/ficheroexcel.php?data='+datos+'&nombre='+nombre,'_self','left=200,top=150,width=600,height=60');
}

function exportarW()
{
    $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_tabla").eq(0).clone()).html());
    var datos=encodeURIComponent($('#Exportar_tabla').html());
    window.open('funcionesphp/ficheroword.php?data='+datos,'_self','left=200,top=150,width=600,height=60');
}

function exportarP(orientacion)
{
    $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_tabla").eq(0).clone()).html());
    var datos=encodeURIComponent($('#Exportar_tabla').html());
    window.open('funcionesphp/ficheropdf.php?data='+datos+'&orientacion='+orientacion,'_self','left=200,top=150,width=600,height=60');
}

function relojillo(idcampo)
{
    fecha = new Date();
    hora = fecha.getHours();
    if (hora>=12) 
    {
        meri=' pm';
        hora=hora-12; 
    }
    else
        meri=' am';
    minuto = fecha.getMinutes();
    if (minuto<10) minuto='0'+minuto;
        segundo = fecha.getSeconds();
    if (segundo<10) segundo='0'+segundo;
        horita = hora + ":" + minuto + ":" + segundo + meri;
    $("#"+idcampo).html(horita);
    setTimeout('relojillo("'+idcampo+'")',1000);
}

function paginar(actual, total, por_pagina, maxpags) 
{
   // console.log(actual, total, por_pagina, maxpags);

    var  texto = "<div class='container' style='text-align: center;width:100%;'><ul class='pagination' style='margin:0 auto;'>";  
    var total_paginas = Math.ceil(total/por_pagina);
    var anterior = parseInt(actual)-1;
    var posterior = parseInt(actual)+1;
    var med = maxpags/2;
    //console.log("Med: "+med);
    var minimo = 0;

    if( (parseInt(actual)+parseInt(med))>=total_paginas) 
    {
      minimo = Math.max(parseInt(total_paginas)-parseInt(maxpags)+1,1);
    }
    else 
    {
      minimo = ( (parseInt(actual)-parseInt(med))>0 )? (parseInt(actual)-parseInt(med)) : 1; 
    }  

/*    console.log("Total paginas: "+total_paginas);
    console.log("Minimo: "+minimo); 
    console.log("Paginas maximas: "+maxpags);*/
    var maximo = 0;  

    if (actual>1) 
    {
        texto += '<li><a onclick="pag(1)" style="cursor:pointer;" data-toggle="tooltip" data-placement="left" title="Primera p&aacute;gina">&laquo;</a></li>';
        texto += '<li><a onclick="pag('+anterior+')" style="cursor:pointer;" data-toggle="tooltip" data-placement="left" title="Anterior">&larr;</a></li>';
    }

      maximo =Math.min(parseInt(minimo)+parseInt(maxpags)-1,total_paginas);

      //console.log("SUMA: "+(( parseInt(minimo)+parseInt(maxpags))));
      //console.log("Maximo: "+maximo);

    for (var i=minimo; i <= maximo; i++) 
    {
        if(i == actual) 
        {
          texto += '<li class="active"><a><b>' + actual + "</b></a></li>";
        }
        else 
        {
          texto += '<li><a onclick="pag('+i+')" style="cursor:pointer;">' + i + '</a></li>';
        }
    }

    if(actual<total_paginas) 
    {
        texto += '<li><a onclick="pag('+posterior+')" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Pr&oacute;ximo">&rarr;</a></li>';
        texto += '<li><a onclick="pag('+total_paginas+')" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="&Uacute;ltima p&aacute;gina">&raquo;</a></li>';
    }

    texto += '</ul></div>';
    return texto;
}

//===> Calendario espaniol

 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);




//===> Funciones globales
$(function(){
    //===> Tooltip activo
        $('[data-toggle="tooltip"]').tooltip();

          //===> Con el UI
/*        $('.fecha').datepicker({
            //comment the beforeShow handler if you want to see the ugly overlay
            beforeShow: function() {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            }
        });*/
      
      //==> Con el de bootstrap
         // $('.fecha').datetimepicker({
             // locale: 'ru'
          //});

        $(".selectpicker").selectpicker();
        //===> Z-index del datepicker
});
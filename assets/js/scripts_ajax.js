/**
 * @autor RamonLisboa 
 * @todo Este arquivo tem as principais funcoes ajax 
 */

$(document).ready(function(){
	$('.date-picker').datepicker();
	var data = new Date();
	var dataCurrent = data.getDate() + '/0' + data.getMonth() + '/' + data.getFullYear();
	$('.date-picker').val(dataCurrent);
	
	$(".autocomplete-cid").autocomplete({
		source: 'prontuario/getCid' 
	});
	
	$(".autocomplete-paciente").autocomplete({
		source: 'prontuario/getPaciente', 
		select: function (event, ui){
			//alert(ui.label);
			console.log(ui.item);
			$("#id_paciente").val(ui.item.id);
			$("#nome_paciente").val(ui.item.nome);
			 var funcOnClick = "getPaginaModal('prontuario/incluirItem/"+ui.item.id+"/1','#respModal','#modalForm')";
	            $("#btnNovoItem").attr("onclick",funcOnClick);
	            getListItensProntuarios(ui.item.id);
		}
	});
});

function getPagina(endPagina, alvo) {
     $.ajax({
        type:'GET',
        url: endPagina,
        success: function(aHtml) {
            $(alvo).html(aHtml);
        },
        beforeSend: function(){
            startLoadingAjax();
        },
        complete: function(){
            stopLoadingAjax();
      }
    });
}

function getPaginaModal(endPagina, alvo, modalId) {
     $.ajax({
        type:'GET',
        url: endPagina,
        success: function(aHtml) {
            $(alvo).html(aHtml);
            $(modalId).modal('toggle');
        }
    });
}

function includesScripts(url){
	var urlCurr = window.location.href;
	
	var scriptTag = urlCurr.createElement("script");
	scriptTag.setAttribute('type', 'text/javascript');
	scriptTag.setAttribute('src', urlCurr + jsFile);
	try {
		urlCurr.body.appendChild(script);
	} catch (e) {
		console.log('Script não pode ser incluído ao arquivo.');
	}
}

//function getListItensProntuarios(button){
////	var form = button.form;
//	var paramPagina = $('#id_paciente').val();
//	getPagina('prontuario/getListProntuarioPaciente/'+paramPagina,'#tbDados');
//}

function btnModalSaveHandler(){
	var htmlMsg = '<div class="panel panel-green">'+
	'	<div class="panel-heading"> '+
	'			<div class="row">   '+
	'					Dados salvos com sucesso!'+
	'			</div>'                                   +
	'		</div>'                                       +
	'</div>';
	
	
	var form = button.form;

	var option = {
	  type:'POST', 
	  success: function(response){
      if(response == "OK"){
	  	  $("#msgNotification").html(htmlMsg).fadeOut(3000);
          $("#modalForm").modal('toggle');
      } else
          alert(response);
	  }
	}

	$(form).ajaxSubmit(option);
}

function getPacienteId(id) {
     $.ajax({
        type:'GET',
        url: 'prontuario/getPacienteId/'+id,
        dataType: 'json',
        success: function(data) {
            $("#id_paciente").val(data.id);
            $("#nome_paciente").val(data.nome);
            
            var funcOnClick = "getPaginaModal('prontuario/incluirItem/"+id+"/1','#respModal','#modalForm')";
            $("#btnNovoItem").attr("onclick",funcOnClick);
            getListItensProntuarios(data.id);
        },
        beforeSend: function(){
            startLoadingAjax();
        },
        complete: function(){
            stopLoadingAjax();
      }
    });
}

function getListItensProntuarios(id_paciente){
	getPagina('prontuario/getListProntuarioPaciente/'+id_paciente,'#tbDados');
}

function startLoadingAjax(){}

function stopLoadingAjax(){}

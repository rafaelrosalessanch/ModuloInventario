$(document).ready(function(){
	 var curos_corto_presente;//varible para almacenar los cursos con la durabilidad de una semana del presente mes
	 var curos_largo_presente;//varible para almacenar los cursos con la durabilidad de mas o menos un mes en el presente mes
	 var curos_corto_futuro;//varible para almacenar los cursos con la durabilidad de una semana en el mes que viene
	 var curos_largo_futuro;//varible para almacenar los cursos con la durabilidad de un mes mas o menos de mes que viene
	 var fecha_presente;//variable para almacenar el nombre del mes actual
	 var fecha_futuro;//variable para almacenar el nombre del mes que viene
	 var fecha=new Date();//varible para almacenar la fecha actual
var mes=fecha.getMonth();	//varible para guardar el mes de la fecha actual	
var dia=fecha.getDay();	 	
$.get("calendario.xml",function(data)
	  {
		
		fecha_presente=$(data).find('*[@index='+[mes]+']').find('fecha').text();
		fecha_futuro=$(data).find('*[@index='+[mes+1]+']').find('fecha').text();
		cursos_corto_presente=$(data).find('*[@index='+[mes]+']').find('cursos_cortos').text();	
		cursos_largo_presente=$(data).find('*[@index='+[mes]+']').find('cursos_largos').text();
		cursos_corto_futuro=$(data).find('*[@index='+[mes+1]+']').find('cursos_cortos').text();
		cursos_largo_futuro=$(data).find('*[@index='+[mes+1]+']').find('cursos_largos').text();
		
		$('#cursos').append('<div class="subheader2">'+fecha_presente+'</div>  <h4>Curso Semanal</h4>'+cursos_corto_presente+'<br><h4>Curso Largo</h4>'+cursos_largo_presente+'<div class="subheader2">'+fecha_futuro+'</div>  <h4>Curso Semanal</h4>'+cursos_corto_futuro+'<br><h4>Curso Largo</h4>'+cursos_largo_futuro+'');	
 
  }

	  )
	  

}
); 





 
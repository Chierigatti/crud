/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
 $('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})

function mascara(i){
   
  var v = i.value;
  
  if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
     i.value = v.substring(0, v.length-1);
     return;
  }
  
  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";

}

function validarData(data){
  var formatoValido = "/^d{2}/d{2}/d{4}$/";
  var valido = false;
  
  if(!formatoValido.test(data.value))
    alert("A data está no formato errado. Por favor corrija.");
  else{
    var dia = data.value.split("/")[0];
    var mes = data.value.split("/")[1];
    var ano = data.value.split("/")[2];
    var MyData = new Date(ano, mes - 1, dia);
    if((MyData.getMonth() + 1 != mes)
       ||(MyData.getDate() != dia)
       ||(MyData.getFullYear() != ano))
      alert("Valores inválidos para o dia, mês ou ano. Por favor corrija.");
    else
      valido = true;
  }
  
  if(valido == false){
    data.focus();
    data.select();
  }
  
  return valido;
}


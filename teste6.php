<table><form id="myForm">

    <tr>
        <th>  <input type="text" class="input-field" name="input1" value="Valor 1"></th>
        <th>  <input type="text" class="input-field" name="input2" value="Valor 2"></th>
        <th>  <button type="submit">Enviar</button></th>
    </tr>
</table></form>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myForm').submit(function(event) {
      event.preventDefault(); // Impede o envio padrão do formulário

      var formData = {};

      $('.input-field').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();
        
        if (inputValue) {
          formData[inputName] = inputValue;
          $(this).val(''); // Limpa o valor do input após o envio
        }
      });

      if (Object.keys(formData).length > 0) {
        $.ajax({
          url: 'teste7.php', // Substitua pelo URL do arquivo que processará o formulário
          type: 'POST',
          data: formData,
          success: function(response) {
            // Trate a resposta do servidor aqui
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Trate os erros aqui
            console.log(error);
          }
        });
      } else {
        console.log('Valores dos inputs não encontrados.');
      }
    });
  });
</script>

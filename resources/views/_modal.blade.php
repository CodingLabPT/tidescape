<!-- Modal -->
<div class="modal fade" id="emailFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="emailFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailFeedbackModalLabel">Enviando E-mail...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Aguarde enquanto seu e-mail está sendo enviado.</p>
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sendEmail() {
    // Abre o modal
    $('#emailFeedbackModal').modal('show');

    // Simula o envio de e-mail (substitua isso pela sua lógica de envio)
    setTimeout(function() {
        // Aqui você deve colocar a lógica real de envio de e-mail
        // Após o envio, feche o modal
        $('#emailFeedbackModal').modal('hide');
        alert('E-mail enviado com sucesso!'); // Mensagem de sucesso
    }, 3000); // Simula um atraso de 3 segundos
}
</script>

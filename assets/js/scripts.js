document.addEventListener('DOMContentLoaded', function () {
    const popupFundo = document.getElementById('popup-fundo');
    const popupConteudo = document.getElementById('popup-conteudo');
    const popupJanela = document.getElementById('popup-janela');
    const popupTitulo = document.getElementById('popup-titulo');
    const botaoFechar = document.getElementById('fechar-popup');

    document.querySelectorAll('.abrir-popup').forEach(function (botao) {
        botao.addEventListener('click', function (evento) {
            evento.preventDefault();

            const url = this.getAttribute('href');
            const titulo = this.getAttribute('data-titulo') || 'Formulário';

            popupTitulo.textContent = titulo;
            popupConteudo.innerHTML = 'Carregando...';
            
            popupFundo.classList.add('ativo');

            fetch(url + '&modo=popup')
                .then(function (resposta) {
                    return resposta.text();
                })
                .then(function (html) {
                    popupConteudo.innerHTML = html;
                })
                .catch(function () {
                    popupConteudo.innerHTML = '<p>Erro ao carregar o formulário.</p>';
                });
        });
    });

    botaoFechar.addEventListener('click', fecharPopup);

    popupFundo.addEventListener('click', function (evento) {
        if (evento.target === popupFundo) {
            fecharPopup();
        }
    });

    function fecharPopup() {
        popupFundo.classList.remove('ativo');
        // Aplica a animação de fechamento diretamente via JS
        popupJanela.style.animation = 'fecharPopup 0.35s ease forwards';
        setTimeout(() => {
            popupConteudo.innerHTML = '';
            // Remove a classe de fechando para a próxima abertura funcionar
            popupJanela.style.animation = 'abrirPopup 0.35s ease forwards';
        }, 350); 
    }
});
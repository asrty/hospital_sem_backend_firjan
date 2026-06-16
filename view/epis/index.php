<h2>Controle de EPIs</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=epis/criar"
    data-titulo="Novo Registro de EPIs"
>
    Cadastrar EPIs
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CA</th>
        <th>Estoque</th>
        <th>Validade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($epis as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['nome']) ?></td>
            <td><?= htmlspecialchars($item['ca']) ?></td>
            <td><?= htmlspecialchars($item['estoque']) ?></td>
            <td><?= htmlspecialchars($item['validade']) ?></td>
            <td><a class="botao perigo" href="index.php?rota=epis/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<div id="popup-fundo" class="popup-fundo">
    <div class="popup-janela">
        <div class="popup-cabecalho">
            <h2 id="popup-titulo">Formulário</h2>
            <button type="button" id="fechar-popup" class="popup-fechar">
                &times;
            </button>
        </div>

        <div id="popup-conteudo" class="popup-conteudo">
            Carregando...
        </div>
    </div>
</div>
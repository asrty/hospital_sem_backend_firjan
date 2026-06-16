<h2>Inspeções de Segurança</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=inspecoes/criar"
    data-titulo="Novo Registro de Inspeção"
>
    Cadastrar Inspeção
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Setor</th>
        <th>Data</th>
        <th>Responsável</th>
        <th>Status</th>
        <th>Observações</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($inspecoes as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['setor']) ?></td>
            <td><?= htmlspecialchars($item['data_inspecao']) ?></td>
            <td><?= htmlspecialchars($item['responsavel']) ?></td>
            <td><?= htmlspecialchars($item['status']) ?></td>
            <td><?= htmlspecialchars($item['observacoes']) ?></td>
            <td><a class="botao perigo" href="index.php?rota=inspecoes/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
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
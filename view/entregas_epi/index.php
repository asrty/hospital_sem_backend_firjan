<h2>Entrega de EPIs</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=entregas_epi/criar"
    data-titulo="Novo Registro de Entrega de EPIs"
>
    Cadastrar Entrega
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Colaborador</th>
        <th>EPI</th>
        <th>Quantidade</th>
        <th>Data</th>
        <th>Assinatura</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($entregas as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['colaborador']) ?></td>
            <td><?= htmlspecialchars($item['epi']) ?></td>
            <td><?= htmlspecialchars($item['quantidade']) ?></td>
            <td><?= htmlspecialchars($item['data_entrega']) ?></td>
            <td><?= htmlspecialchars($item['assinatura']) ?></td>
            <td><a class="botao perigo" href="index.php?rota=entregas_epi/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
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
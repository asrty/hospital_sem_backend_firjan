<h2>Registro de Acidentes</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=acidentes/criar"
    data-titulo="Novo Registro de Acidente"
>
    Cadastrar Acidente
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Colaborador</th>
        <th>Data</th>
        <th>Gravidade</th>
        <th>Descrição</th>
        <th>CAT</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($acidentes as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['colaborador']) ?></td>
            <td><?= htmlspecialchars($item['data_acidente']) ?></td>
            <td><?= htmlspecialchars($item['gravidade']) ?></td>
            <td><?= htmlspecialchars($item['descricao']) ?></td>
            <td><?= htmlspecialchars($item['cat_emitida']) ?></td>
            <a class="botao" href="index.php?rota=acidentes/editar&id=<?= $acidente['id'] ?>">Editar </a>
            <td><a class="botao perigo" href="index.php?rota=acidentes/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
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
<h2>Exames Médicos</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=exames_medicos/criar"
    data-titulo="Novo Registro de Exame"
>
    Cadastrar Exame Médico
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Colaborador</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Validade</th>
        <th>Resultado</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($exames as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['colaborador']) ?></td>
            <td><?= htmlspecialchars($item['tipo']) ?></td>
            <td><?= htmlspecialchars($item['data_exame']) ?></td>
            <td><?= htmlspecialchars($item['validade']) ?></td>
            <td><?= htmlspecialchars($item['resultado']) ?></td>
            <td><a class="botao perigo" href="index.php?rota=exames_medicos/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
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
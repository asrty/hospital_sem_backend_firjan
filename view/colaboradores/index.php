<h2>Colaboradores</h2>
<a 
    class="botao abrir-popup" 
    href="index.php?rota=colaboradores/criar"
    data-titulo="Novo Registro de Colaboradores"
>
    Cadastrar Colaboradores
</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Setor</th>
        <th>Cargo</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($colaboradores as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['nome']) ?></td>
            <td><?= htmlspecialchars($item['cpf']) ?></td>
            <td><?= htmlspecialchars($item['setor']) ?></td>
            <td><?= htmlspecialchars($item['cargo']) ?></td>
            <td><?= htmlspecialchars($item['status']) ?></td>
            <td><a class="botao perigo" href="index.php?rota=colaboradores/excluir&id=<?= $item['id'] ?>">Excluir</a></td>
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
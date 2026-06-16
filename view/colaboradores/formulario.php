<form method="post" action="index.php?rota=colaboradores/salvar">
    <label>Nome</label><input type="text" name="nome" required>
    <label>CPF</label><input type="text" name="cpf" required>
    <label>Setor</label>
    <select name="setor" required>
        <option value="">Selecione</option>
        <?php foreach ($setores as $setor): ?>
            <option><?= htmlspecialchars($setor['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>Cargo</label>
    <select name="cargo" required>
        <option value="">Selecione</option>
        <?php foreach ($cargos as $cargo): ?>
            <option><?= htmlspecialchars($cargo['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>Status</label>
    <select name="status">
        <option>Ativo</option>
        <option>Inativo</option>
    </select>
    <button type="submit">Salvar</button>
</form>
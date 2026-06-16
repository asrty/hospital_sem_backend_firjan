<form method="post" action="index.php?rota=exames_medicos/salvar">
    <label>Colaborador</label>
    <select name="colaborador" required>
        <option value="">Selecione</option><?php foreach ($colaboradores as $c): ?>
            <option><?= htmlspecialchars($c['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>Tipo de exame</label><select name="tipo">
        <option>Admissional</option>
        <option>Periódico</option>
        <option>Demissional</option>
        <option>Retorno ao trabalho</option>
        <option>Mudança de risco</option>
    </select>
    <label>Data do exame</label><input type="date" name="data_exame" required>
    <label>Validade</label><input type="date" name="validade" required>
    <label>Resultado</label><select name="resultado">
        <option>Apto</option>
        <option>Inapto</option>
        <option>Apto com restrições</option>
    </select>
    <button type="submit">Salvar</button>
</form>
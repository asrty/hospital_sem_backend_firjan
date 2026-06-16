<form method="post" action="index.php?rota=inspecoes/salvar">
    <label>Setor</label>
    <select name="setor" required>
        <option value="">Selecione</option><?php foreach ($setores as $s): ?>
            <option><?= htmlspecialchars($s['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>Data da inspeção</label><input type="date" name="data_inspecao" required>
    <label>Responsável</label><input type="text" name="responsavel" required>
    <label>Status</label><select name="status">
        <option>Pendente</option>
        <option>Concluída</option>
        <option>Com irregularidades</option>
    </select>
    <label>Observações</label><textarea name="observacoes"></textarea>
    <button type="submit">Salvar</button>
</form>
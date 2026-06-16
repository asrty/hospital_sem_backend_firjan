<form method="post" action="index.php?rota=entregas_epi/salvar">
    <label>Colaborador</label>
    <select name="colaborador" required>
        <option value="">Selecione</option><?php foreach ($colaboradores as $c): ?>
            <option><?= htmlspecialchars($c['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>EPI</label>
    <select name="epi" required>
        <option value="">Selecione</option><?php foreach ($epis as $e): ?>
            <option><?= htmlspecialchars($e['nome']) ?></option><?php endforeach; ?>
    </select>
    <label>Quantidade</label><input type="number" name="quantidade" min="1" required>
    <label>Data da entrega</label><input type="date" name="data_entrega" required>
    <label>Assinatura / confirmação</label><input type="text" name="assinatura" placeholder="Nome de quem recebeu">
    <button type="submit">Salvar</button>
</form>
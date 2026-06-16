<form method="post" action="index.php?rota=epis/salvar">
    <label>Nome do EPI</label><input type="text" name="nome" required>
    <label>CA</label><input type="text" name="ca" required>
    <label>Quantidade em estoque</label><input type="number" name="estoque" min="0" required>
    <label>Validade</label><input type="date" name="validade" required>
    <button type="submit">Salvar</button>
</form>
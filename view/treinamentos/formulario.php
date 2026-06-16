<form method="post" action="index.php?rota=treinamentos/salvar">
    <label>Nome do treinamento</label><input type="text" name="nome" required>
    <label>Norma regulamentadora</label><input type="text" name="norma" placeholder="Ex.: NR-6, NR-10, NR-35">
    <label>Carga horária</label><input type="number" name="carga_horaria" min="1" required>
    <label>Validade</label><input type="date" name="validade" required>
    <button type="submit">Salvar</button>
</form>
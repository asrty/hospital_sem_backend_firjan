<?php
$editando = isset($acidente);

$action = $editando
    ? 'index.php?rota=acidentes/atualizar'
    : 'index.php?rota=acidentes/salvar';
?>

<form method="post" action="<?= $action ?>">

    <?php if ($editando): ?>
        <input type="hidden" name="id" value="<?= $acidente['id'] ?>">
    <?php endif; ?>

    <label>Data do acidente</label>
    <input 
        type="date" 
        name="data" 
        value="<?= $acidente['data'] ?? '' ?>" 
        required
    >

    <label>Colaborador</label>
    <input 
        type="text" 
        name="colaborador" 
        value="<?= $acidente['colaborador'] ?? '' ?>" 
        required
    >

    <label>Descrição</label>
    <textarea name="descricao" required><?= $acidente['descricao'] ?? '' ?></textarea>

    <label>Gravidade</label>
    <select name="gravidade" required>
        <option value="">Selecione</option>

        <option 
            value="Leve"
            <?= (($acidente['gravidade'] ?? '') === 'Leve') ? 'selected' : '' ?>
        >
            Leve
        </option>

        <option 
            value="Moderada"
            <?= (($acidente['gravidade'] ?? '') === 'Moderada') ? 'selected' : '' ?>
        >
            Moderada
        </option>

        <option 
            value="Grave"
            <?= (($acidente['gravidade'] ?? '') === 'Grave') ? 'selected' : '' ?>
        >
            Grave
        </option>
    </select>

    <label>CAT Emitida</label>
    <select name="cat_emitida" required>
        <option value="">Selecione</option>

        <option 
            value="Sim"
            <?= (($acidente['cat_emitida'] ?? '') === 'Sim') ? 'selected' : '' ?>
        >
            Sim
        </option>

        <option 
            value="Não"
            <?= (($acidente['cat_emitida'] ?? '') === 'Não') ? 'selected' : '' ?>
        >
            Não
        </option>

    <button type="submit" class="botao">
        <?= $editando ? 'Atualizar' : 'Salvar' ?>
    </button>

</form>
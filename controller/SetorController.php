<?php

class SetorController extends Controller
{
    private string $tabela = 'setores';

    public function index(): void
    {
        $setores = SessaoRepositorio::listar($this->tabela);
        $this->view('setores/index', compact('setores'));
    }

    public function criar(): void
    {
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/setores/formulario.php';
            return;
        }

        $this->view('setores/formulario');
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? ''
        ]);

        $this->redirecionar('setores');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('setores');
    }
}

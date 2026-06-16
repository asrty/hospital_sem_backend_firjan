<?php

class CargoController extends Controller
{
    private string $tabela = 'cargos';

    public function index(): void
    {
        $cargos = SessaoRepositorio::listar($this->tabela);
        $this->view('cargos/index', compact('cargos'));
    }

    public function criar(): void
    {
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/cargos/formulario.php';
            return;
        }

        $this->view('cargos/formulario');
    }

    public function editar(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        $cargo = SessaoRepositorio::buscarPorId('cargos', $id);

        if (!$cargo) {
            echo 'Cargo não encontrado.';
            return;
        }

        $dados = compact('cargos');

        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            $this->partial('cargos/formulario', $dados);
            return;
        }

        $this->view('cargos/formulario', $dados);
    }

    public function atualizar(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        SessaoRepositorio::atualizar('cargos', $id, [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? ''
        ]);

        header('Location: index.php?rota=cargos');
        exit;
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? ''
        ]);

        $this->redirecionar('cargos');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('cargos');
    }
}

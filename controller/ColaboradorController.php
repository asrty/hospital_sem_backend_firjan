<?php

class ColaboradorController extends Controller
{
    private string $tabela = 'colaboradores';

    public function index(): void
    {
        $colaboradores = SessaoRepositorio::listar($this->tabela);
        $this->view('colaboradores/index', compact('colaboradores'));
    }

    public function criar(): void
    {
        $setores = SessaoRepositorio::listar('setores');
        $cargos = SessaoRepositorio::listar('cargos');
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/colaboradores/formulario.php';
            return;
        }

        $this->view('colaboradores/formulario', compact('setores', 'cargos'));
    }

    public function editar(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        $colaboradores = SessaoRepositorio::buscarPorId('colaboradores', $id);

        if (!$colaboradores) {
            echo 'Colaboradores não encontrado.';
            return;
        }

        $dados = compact('colaboradores');

        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            $this->partial('colaboradores/formulario', $dados);
            return;
        }

        $this->view('colaboradores/formulario', $dados);
    }

    public function atualizar(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        SessaoRepositorio::atualizar('colaboradores', $id, [
            'nome' => $_POST['nome'] ?? '',
            'cpf' => $_POST['cpf'] ?? '',
            'setor' => $_POST['setor'] ?? '',
            'cargo' => $_POST['cargo'] ?? '',
            'status' => $_POST['status'] ?? 'Ativo'
        ]);

        header('Location: index.php?rota=colaboradores');
        exit;
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'nome' => $_POST['nome'] ?? '',
            'cpf' => $_POST['cpf'] ?? '',
            'setor' => $_POST['setor'] ?? '',
            'cargo' => $_POST['cargo'] ?? '',
            'status' => $_POST['status'] ?? 'Ativo'
        ]);

        $this->redirecionar('colaboradores');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('colaboradores');
    }
}

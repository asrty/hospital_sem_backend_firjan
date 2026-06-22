<?php

class AcidenteController extends Controller
{
    private string $tabela = 'acidentes';

    public function index(): void
    {
        $acidentes = SessaoRepositorio::listar($this->tabela);
        $this->view('acidentes/index', compact('acidentes'));
    }

    public function criar(): void
    {
        $colaboradores = SessaoRepositorio::listar('colaboradores');
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            $this->partial('acidentes/formulario', $colaboradores);
            return;
        }

        $this->view('acidentes/formulario', compact('colaboradores'));
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'colaborador' => $_POST['colaborador'] ?? '',
            'data_acidente' => $_POST['data'] ?? '',
            'gravidade' => $_POST['gravidade'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'cat_emitida' => $_POST['cat_emitida'] ?? 'Não'
        ]);

        $this->redirecionar('acidentes');
    }

    public function editar(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        $acidente = SessaoRepositorio::buscarPorId('acidentes', $id);

        if (!$acidente) {
            echo 'Acidente não encontrado.';
            return;
        }

        $dados = compact('acidente');

        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            $this->partial('acidentes/formulario', $dados);
            return;
        }

        $this->view('acidentes/formulario', $dados);
    }

    public function atualizar(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        SessaoRepositorio::atualizar('acidentes', $id, [
            'data_acidente' => $_POST['data'] ?? '',
            'colaborador' => $_POST['colaborador'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'gravidade' => $_POST['gravidade'] ?? '',
            'cat_emitida' => $_POST['cat_emitida'] ?? 'Não'
        ]);

        header('Location: index.php?rota=acidentes');
        exit;
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('acidentes');
    }
}

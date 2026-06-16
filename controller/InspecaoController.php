<?php

class InspecaoController extends Controller
{
    private string $tabela = 'inspecoes';

    public function index(): void
    {
        $inspecoes = SessaoRepositorio::listar($this->tabela);
        $this->view('inspecoes/index', compact('inspecoes'));
    }

    public function criar(): void
    {
        $setores = SessaoRepositorio::listar('setores');
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/inspecoes/formulario.php';
            return;
        }

        $this->view('inspecoes/formulario', compact('setores'));
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'setor' => $_POST['setor'] ?? '',
            'data_inspecao' => $_POST['data_inspecao'] ?? '',
            'responsavel' => $_POST['responsavel'] ?? '',
            'status' => $_POST['status'] ?? 'Pendente',
            'observacoes' => $_POST['observacoes'] ?? ''
        ]);

        $this->redirecionar('inspecoes');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('inspecoes');
    }
}

<?php

class TreinamentoController extends Controller
{
    private string $tabela = 'treinamentos';

    public function index(): void
    {
        $treinamentos = SessaoRepositorio::listar($this->tabela);
        $this->view('treinamentos/index', compact('treinamentos'));
    }

    public function criar(): void
    {
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/treinamentos/formulario.php';
            return;
        }

        $this->view('treinamentos/formulario');
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'nome' => $_POST['nome'] ?? '',
            'norma' => $_POST['norma'] ?? '',
            'carga_horaria' => $_POST['carga_horaria'] ?? '',
            'validade' => $_POST['validade'] ?? ''
        ]);

        $this->redirecionar('treinamentos');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('treinamentos');
    }
}

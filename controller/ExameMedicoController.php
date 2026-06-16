<?php

class ExameMedicoController extends Controller
{
    private string $tabela = 'exames_medicos';

    public function index(): void
    {
        $exames = SessaoRepositorio::listar($this->tabela);
        $this->view('exames_medicos/index', compact('exames'));
    }

    public function criar(): void
    {
        $colaboradores = SessaoRepositorio::listar('colaboradores');
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/exames_medicos/formulario.php';
            return;
        }

        $this->view('exames_medicos/formulario', compact('colaboradores'));
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'colaborador' => $_POST['colaborador'] ?? '',
            'tipo' => $_POST['tipo'] ?? '',
            'data_exame' => $_POST['data_exame'] ?? '',
            'validade' => $_POST['validade'] ?? '',
            'resultado' => $_POST['resultado'] ?? ''
        ]);

        $this->redirecionar('exames_medicos');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('exames_medicos');
    }
}

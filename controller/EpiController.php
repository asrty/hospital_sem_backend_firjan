<?php

class EpiController extends Controller
{
    private string $tabela = 'epis';

    public function index(): void
    {
        $epis = SessaoRepositorio::listar($this->tabela);
        $this->view('epis/index', compact('epis'));
    }

    public function criar(): void
    {
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/epis/formulario.php';
            return;
        }

        $this->view('epis/formulario');
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'nome' => $_POST['nome'] ?? '',
            'ca' => $_POST['ca'] ?? '',
            'estoque' => $_POST['estoque'] ?? 0,
            'validade' => $_POST['validade'] ?? ''
        ]);

        $this->redirecionar('epis');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('epis');
    }
}

<?php

class EntregaEpiController extends Controller
{
    private string $tabela = 'entregas_epi';

    public function index(): void
    {
        $entregas = SessaoRepositorio::listar($this->tabela);
        $this->view('entregas_epi/index', compact('entregas'));
    }

    public function criar(): void
    {
        $colaboradores = SessaoRepositorio::listar('colaboradores');
        $epis = SessaoRepositorio::listar('epis');
        
        if (isset($_GET['modo']) && $_GET['modo'] === 'popup') {
            require __DIR__ . '/../view/entregas_epi/formulario.php';
            return;
        }

        $this->view('entregas_epi/formulario', compact('colaboradores', 'epis'));
    }

    public function salvar(): void
    {
        SessaoRepositorio::salvar($this->tabela, [
            'colaborador' => $_POST['colaborador'] ?? '',
            'epi' => $_POST['epi'] ?? '',
            'quantidade' => $_POST['quantidade'] ?? 1,
            'data_entrega' => $_POST['data_entrega'] ?? date('Y-m-d'),
            'assinatura' => $_POST['assinatura'] ?? ''
        ]);

        $this->redirecionar('entregas_epi');
    }

    public function excluir(): void
    {
        SessaoRepositorio::excluir($this->tabela, (int) $_GET['id']);
        $this->redirecionar('entregas_epi');
    }
}

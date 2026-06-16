<?php

require_once __DIR__ . '/model/Controller.php';
require_once __DIR__ . '/model/SessaoRepositorio.php';

require_once __DIR__ . '/controller/ColaboradorController.php';
require_once __DIR__ . '/controller/SetorController.php';
require_once __DIR__ . '/controller/CargoController.php';
require_once __DIR__ . '/controller/EpiController.php';
require_once __DIR__ . '/controller/EntregaEpiController.php';
require_once __DIR__ . '/controller/AcidenteController.php';
require_once __DIR__ . '/controller/ExameMedicoController.php';
require_once __DIR__ . '/controller/TreinamentoController.php';
require_once __DIR__ . '/controller/InspecaoController.php';
require_once __DIR__ . '/controller/RelatorioController.php';

SessaoRepositorio::iniciar();

$rota = $_GET['rota'] ?? 'home';

$rotas = [
    'home' => [Controller::class, 'home'],

    'colaboradores' => [ColaboradorController::class, 'index'],
    'colaboradores/criar' => [ColaboradorController::class, 'criar'],
    'colaboradores/salvar' => [ColaboradorController::class, 'salvar'],
    'colaboradores/excluir' => [ColaboradorController::class, 'excluir'],

    'setores' => [SetorController::class, 'index'],
    'setores/criar' => [SetorController::class, 'criar'],
    'setores/salvar' => [SetorController::class, 'salvar'],
    'setores/excluir' => [SetorController::class, 'excluir'],

    'cargos' => [CargoController::class, 'index'],
    'cargos/criar' => [CargoController::class, 'criar'],
    'cargos/salvar' => [CargoController::class, 'salvar'],
    'cargos/excluir' => [CargoController::class, 'excluir'],

    'epis' => [EpiController::class, 'index'],
    'epis/criar' => [EpiController::class, 'criar'],
    'epis/salvar' => [EpiController::class, 'salvar'],
    'epis/excluir' => [EpiController::class, 'excluir'],

    'entregas_epi' => [EntregaEpiController::class, 'index'],
    'entregas_epi/criar' => [EntregaEpiController::class, 'criar'],
    'entregas_epi/salvar' => [EntregaEpiController::class, 'salvar'],
    'entregas_epi/excluir' => [EntregaEpiController::class, 'excluir'],

    'acidentes' => [AcidenteController::class, 'index'],
    'acidentes/criar' => [AcidenteController::class, 'criar'],
    'acidentes/salvar' => [AcidenteController::class, 'salvar'],
    'acidentes/editar' => [AcidenteController::class, 'editar'],
    'acidentes/atualizar' => [CargoController::class, 'atualizar'],
    'acidentes/excluir' => [AcidenteController::class, 'excluir'],

    'exames_medicos' => [ExameMedicoController::class, 'index'],
    'exames_medicos/criar' => [ExameMedicoController::class, 'criar'],
    'exames_medicos/salvar' => [ExameMedicoController::class, 'salvar'],
    'exames_medicos/excluir' => [ExameMedicoController::class, 'excluir'],

    'treinamentos' => [TreinamentoController::class, 'index'],
    'treinamentos/criar' => [TreinamentoController::class, 'criar'],
    'treinamentos/salvar' => [TreinamentoController::class, 'salvar'],
    'treinamentos/excluir' => [TreinamentoController::class, 'excluir'],

    'inspecoes' => [InspecaoController::class, 'index'],
    'inspecoes/criar' => [InspecaoController::class, 'criar'],
    'inspecoes/salvar' => [InspecaoController::class, 'salvar'],
    'inspecoes/excluir' => [InspecaoController::class, 'excluir'],

    'relatorios' => [RelatorioController::class, 'index'],
];

if ($rota === 'home') {
    require_once __DIR__ . '/view/layouts/header.php';
    require_once __DIR__ . '/view/home.php';
    require_once __DIR__ . '/view/layouts/footer.php';
    exit;
}

if (!isset($rotas[$rota])) {
    http_response_code(404);
    echo 'Rota não encontrada.';
    exit;
}

[$classe, $metodo] = $rotas[$rota];
$controller = new $classe();
$controller->$metodo();

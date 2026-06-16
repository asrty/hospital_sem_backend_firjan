<?php

class RelatorioController extends Controller
{
    public function index(): void
    {
        $dados = [
            'totalColaboradores' => count(SessaoRepositorio::listar('colaboradores')),
            'totalSetores' => count(SessaoRepositorio::listar('setores')),
            'totalCargos' => count(SessaoRepositorio::listar('cargos')),
            'totalEpis' => count(SessaoRepositorio::listar('epis')),
            'totalEntregas' => count(SessaoRepositorio::listar('entregas_epi')),
            'totalAcidentes' => count(SessaoRepositorio::listar('acidentes')),
            'totalExames' => count(SessaoRepositorio::listar('exames_medicos')),
            'totalTreinamentos' => count(SessaoRepositorio::listar('treinamentos')),
            'totalInspecoes' => count(SessaoRepositorio::listar('inspecoes')),
        ];

        $this->view('relatorios/index', $dados);
    }
}

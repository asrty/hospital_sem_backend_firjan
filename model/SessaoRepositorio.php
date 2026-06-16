<?php

class SessaoRepositorio
{
    public static function iniciar(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $tabelas = [
            'colaboradores',
            'setores',
            'cargos',
            'epis',
            'entregas_epi',
            'acidentes',
            'exames_medicos',
            'treinamentos',
            'inspecoes'
        ];

        foreach ($tabelas as $tabela) {
            if (!isset($_SESSION[$tabela])) {
                $_SESSION[$tabela] = [];
            }
        }
    }

    public static function listar(string $tabela): array
    {
        return $_SESSION[$tabela] ?? [];
    }

    public static function buscarPorId(string $tabela, int $id): ?array
    {
        foreach (self::listar($tabela) as $item) {
            if ((int) $item['id'] === $id) {
                return $item;
            }
        }

        return null;
    }

    public static function salvar(string $tabela, array $dados): void
    {
        $dados['id'] = self::proximoId($tabela);
        $_SESSION[$tabela][] = $dados;
    }

    public static function atualizar(string $tabela, int $id, array $novosDados): void
    {
        foreach ($_SESSION[$tabela] as $indice => $item) {
            if ((int) $item['id'] === $id) {
                $novosDados['id'] = $id;
                $_SESSION[$tabela][$indice] = $novosDados;
                return;
            }
        }
    }

    public static function excluir(string $tabela, int $id): void
    {
        $_SESSION[$tabela] = array_values(array_filter(
            $_SESSION[$tabela],
            fn ($item) => (int) $item['id'] !== $id
        ));
    }

    private static function proximoId(string $tabela): int
    {
        $itens = self::listar($tabela);

        if (empty($itens)) {
            return 1;
        }

        return max(array_column($itens, 'id')) + 1;
    }
}

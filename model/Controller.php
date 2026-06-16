<?php

class Controller
{
    protected function view(string $view, array $dados = []): void
    {
        extract($dados);

        $caminhoView = __DIR__ . '/../view/' . $view . '.php';

        if (!file_exists($caminhoView)) {
            die('View não encontrada: ' . $view);
        }

        require __DIR__ . '/../view/layouts/header.php';
        require $caminhoView;
        require __DIR__ . '/../view/layouts/footer.php';
    }

    protected function partial(string $view, array $dados = []): void
    {
        extract($dados);

        $caminhoView = __DIR__ . '/../view/' . $view . '.php';

        if (!file_exists($caminhoView)) {
            die("Partial não encontrada: " . $caminhoView);
        }

        require $caminhoView;
    }

    protected function redirecionar(string $rota): void
    {
        header('Location: index.php?rota=' . $rota);
        exit;
    }
}

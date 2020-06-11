<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;

    try {
//            $arrayFixo = new SplFixedArray(2);
//            $arrayFixo[3] = 1111;
        funcao2();
    } catch (RuntimeException | DivisionByZeroError $error) {
        echo "Estou na função 1, mas aconteceu um erro na função 2" . PHP_EOL;
        echo "  Detalhes do problema: " . PHP_EOL;
        echo "  Arquivo {$error->getFile()}" . PHP_EOL;
        echo "  Linha {$error->getLine()}" . PHP_EOL;
        echo "  Mensagem {$error->getMessage()}" . PHP_EOL;
        echo "  Pilha de execução: " . PHP_EOL;
        echo "  {$error->getTraceAsString()}" . PHP_EOL . PHP_EOL;

        throw new RuntimeException(
            "lançando uma nova exception apos o tratamento anterior",
            $error->getCode(),
            $error
        );
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;

    throw new RuntimeException("Uma exception foi lançada");

//    $divisao = intdiv(5,0);
//
//    $arrayFixo = new SplFixedArray(2);
//    $arrayFixo[3] = 1111;

//    for ($i = 1; $i <= 5; $i++) {
//        echo $i . PHP_EOL;
//    }
    //print_r(debug_backtrace());

    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;

<?php
require_once('./function.php');
$idturma = $_POST['idturma'];
?>
<div class="container">
    <div class="d-flex" style="justify-content: end;"><button class="btn btn-primary" type="button" id="btnModalAddTurma" name="modalAddTurma" onclick="addAtividade(<?php echo ($idturma); ?>);">Registrar turma</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = selectWhere('idatividade', 'tbatividade', 'idturma', $idturma);
            if ($select->rowCount() > 0) {
                foreach ($select as $row) {
                    $idatividade = $row['idatividade'];
                    $nome = $row['nome'];
            ?>
                    <tr>
                        <th scope="row"><?php echo ($idatividade) ?></th>
                        <td><?php echo ($nome) ?></td>
                    </tr>
            <?php
                }
            } else {
                echo ("<h4 class='text-center'>Tabela vazia!</h4>");
            }
            ?>
        </tbody>
    </table>
</div>
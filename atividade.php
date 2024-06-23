<?php
require_once('./function.php');
$idturma = $_POST['idturma'];
?>
<div class="container">
    <div class="d-flex" style="justify-content: end;"><button class="btn btn-primary" type="button" onclick="addAtividade(<?php echo ($idturma); ?>);">Registrar atividade</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = selectWhere('idatividade, nome', 'tbatividade', 'idturma', $idturma);
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
</div> <!-- //? Registrar atividade -->
<div class="modal fade" id="addAtividadeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar atividade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="formAddAtividade" name="formAddAtividade">
                        <div class="col-md-12 mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nome da atividade</label>
                            <input type="text" class="form-control" id="addNomeAtividade" name="addNomeAtividade">
                        </div>
                    </form>
                    <div class="alert alert-warning mt-3" id="alertAddAtividade" style="display: none;">
                        O nome deve conter pelo menos 4 caracteres!
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="addAtividadeBtn">Registrar</button>
            </div>
        </div>
    </div>
</div>
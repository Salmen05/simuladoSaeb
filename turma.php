<?php
require_once("./function.php");
require_once("./connection.php");
$idprofessor = $_SESSION['idprofessor'];
?>

<div class="container">
    <div class="d-flex" style="justify-content: end;"><button class="btn btn-primary" type="button" id="btnModalAddTurma" name="modalAddTurma" onclick="addTurma(<?php echo ($idprofessor); ?>);">Registrar turma</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = selectWhere('idturma, nome', 'tbturma', 'idprofessor', $idprofessor);
            if ($select->rowCount() > 0) {
                foreach ($select as $row) {
                    $idturma = $row['idturma'];
                    $nome = $row['nome'];
            ?>
                    <tr>
                        <th scope="row"><?php echo ($idturma) ?></th>
                        <td><?php echo ($nome) ?></td>
                        <td><button type="button" class="btn btn-danger me-1" onclick="deletarTurma(<?php echo ($idturma) ?>)">Deletar</button><button type="button" class="btn btn-success" onclick="visualizarTurma(<?php echo ($idturma) ?>)">Visualizar</button></td>
                    </tr>
            <?php
                }
            } else {
                echo ("<h4 class='text-center'>Tabela vazia!</h4>");
            } ?>
        </tbody>
    </table>
</div> <!-- //? Modal cadastrar -->
<div class="modal fade" id="modalAddTurma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="formAddTurma" name="formAddTurma">
                        <div class="col-md-12">
                            <label for="regNomeTurma">Nome da turma</label>
                            <input type="text" class="form-control" id="regNomeTurma" name="regNomeTurma">
                        </div>
                        <div class="alert alert-warning mt-3" id="alertAddTurma" style="display: none;">

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnAddTurma">Registrar</button>
            </div>
        </div>
    </div>
</div> <!-- //! Modal excluir -->
<div class="modal fade" id="modalDeleteTurma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 h2" id="staticBackdropLabel">Atenção!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodyModalDeleteTurma">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" id="modalDeleTurmaBtn">Deletar</button>
            </div>
        </div>
    </div>
</div>
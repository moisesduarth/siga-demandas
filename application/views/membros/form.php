<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($membro) ? 'Editar' : 'Adicionar'; ?> Membro</h3>
    </div>
    <?php echo form_open(isset($membro) ? 'membros/edit/' . $membro['id'] : 'membros/add'); ?>
    <div class="box-body">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo isset($membro) ? $membro['nome'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" name="rg" class="form-control" value="<?php echo isset($membro) ? $membro['rg'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" value="<?php echo isset($membro) ? $membro['cpf'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <textarea name="endereco" class="form-control"><?php echo isset($membro) ? $membro['endereco'] : ''; ?></textarea>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    <?php echo form_close(); ?>
</div>


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($area) ? 'Editar' : 'Adicionar'; ?> Área</h3>
    </div>
    <?php echo form_open(isset($area) ? 'areas/edit/' . $area['id'] : 'areas/add'); ?>
    <div class="box-body">
        <div class="form-group">
            <label for="nome">Nome da Área</label>
            <input type="text" name="nome" class="form-control" value="<?php echo isset($area) ? $area['nome'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="lider_id">Líder da Área</label>
            <select name="lider_id" class="form-control">
                <option value="">Selecione o líder</option>
                <?php foreach ($membros as $membro): ?>
                    <option value="<?php echo $membro['id']; ?>" <?php echo isset($area) && $area['lider_id'] == $membro['id'] ? 'selected' : ''; ?>>
                        <?php echo $membro['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    <?php echo form_close(); ?>
</div>


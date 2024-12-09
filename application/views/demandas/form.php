<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($demanda) ? 'Editar Demanda' : 'Adicionar Demanda'; ?></h3>
    </div>
    <div class="box-body">
        <?php echo form_open(isset($demanda) ? 'demandas/edit/' . $demanda['id'] : 'demandas/add'); ?>
        <div class="form-group">
            <label for="membro_id">Membro</label>
            <select name="membro_id" class="form-control">
                <?php foreach ($membros as $membro): ?>
                    <option value="<?php echo $membro['id']; ?>" <?php echo isset($demanda) && $demanda['membro_id'] == $membro['id'] ? 'selected' : ''; ?>>
                        <?php echo $membro['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo set_value('titulo', $demanda['titulo'] ?? ''); ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control"><?php echo set_value('descricao', $demanda['descricao'] ?? ''); ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name="categoria" class="form-control">
                <option value="Serviço" <?php echo isset($demanda) && $demanda['categoria'] == 'Serviço' ? 'selected' : ''; ?>>Serviço</option>
                <option value="Produto" <?php echo isset($demanda) && $demanda['categoria'] == 'Produto' ? 'selected' : ''; ?>>Produto</option>
            </select>
        </div>
        <!-- Adicione o campo de status e aprovador_id se em edição -->
        <?php if (isset($demanda)): ?>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="aberto" <?php echo $demanda['status'] == 'aberto' ? 'selected' : ''; ?>>Aberto</option>
                    <option value="fechado" <?php echo $demanda['status'] == 'fechado' ? 'selected' : ''; ?>>Fechado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="aprovador_id">Aprovador</label>
                <select name="aprovador_id" class="form-control">
                    <?php foreach ($membros as $membro): ?>
                        <option value="<?php echo $membro['id']; ?>" <?php echo isset($demanda) && $demanda['aprovador_id'] == $membro['id'] ? 'selected' : ''; ?>>
                            <?php echo $membro['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <?php echo form_close(); ?>
    </div>
</div>
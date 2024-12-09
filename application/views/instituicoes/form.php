<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($instituicao) ? 'Editar Instituição' : 'Adicionar Instituição'; ?></h3>
            </div>
            <?php echo form_open(isset($instituicao) ? 'instituicoes/edit/' . $instituicao['id'] : 'instituicoes/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                        <div class="form-group">
                            <input type="text" name="codigo" value="<?php echo isset($instituicao) ? $instituicao['codigo'] : set_value('codigo'); ?>" class="form-control" id="codigo" />
                            <span class="text-danger"><?php echo form_error('codigo'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="descricao" class="control-label"><span class="text-danger">*</span>Descrição</label>
                        <div class="form-group">
                            <input type="text" name="descricao" value="<?php echo isset($instituicao) ? $instituicao['descricao'] : set_value('descricao'); ?>" class="form-control" id="descricao" />
                            <span class="text-danger"><?php echo form_error('descricao'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="area_id" class="control-label"><span class="text-danger">*</span>Área</label>
                        <div class="form-group">
                            <select name="area_id" class="form-control">
                                <option value="">Selecione a Área</option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?= $area['id'] ?>" <?= set_select('area_id', $area['id'], isset($instituicao) && $instituicao['area_id'] == $area['id']); ?>>
                                        <?= $area['nome'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('area_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="lider_id" class="control-label"><span class="text-danger">*</span>Líder</label>
                        <div class="form-group">
                            <select name="lider_id" class="form-control">
                                <option value="">Selecione o Líder</option>
                                <?php foreach ($membros as $membro): ?>
                                    <option value="<?= $membro['id'] ?>" <?= set_select('lider_id', $membro['id'], isset($instituicao) && $instituicao['lider_id'] == $membro['id']); ?>>
                                        <?= $membro['nome'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('lider_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="endereco" class="control-label">Endereço</label>
                        <div class="form-group">
                            <textarea name="endereco" class="form-control" id="endereco"><?php echo isset($instituicao) ? $instituicao['endereco'] : set_value('endereco'); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success"><?php echo isset($instituicao) ? 'Salvar Alterações' : 'Salvar'; ?></button>
                <a href="<?php echo site_url('instituicoes'); ?>" class="btn btn-default">Cancelar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

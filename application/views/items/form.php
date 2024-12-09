<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($item) ? 'Editar Item' : 'Adicionar Novo Item'; ?></h3>
            </div>
            <?php echo form_open(isset($item) ? 'items/edit/' . $item['id'] : 'items/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
                        <div class="form-group">
                            <input type="text" name="nome" value="<?php echo isset($item) ? $item['nome'] : set_value('nome'); ?>" class="form-control" id="nome" required />
                            <span class="text-danger"><?php echo form_error('nome'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="codigo_barras" class="control-label">Código de Barras</label>
                        <div class="form-group">
                            <input type="text" name="codigo_barras" value="<?php echo isset($item) ? $item['codigo_barras'] : set_value('codigo_barras'); ?>" class="form-control" id="codigo_barras" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="preco_custo" class="control-label"><span class="text-danger">*</span>Preço de Custo</label>
                        <div class="form-group">
                            <input type="number" step="0.01" name="preco_custo" value="<?php echo isset($item) ? $item['preco_custo'] : set_value('preco_custo'); ?>" class="form-control" id="preco_custo" required />
                            <span class="text-danger"><?php echo form_error('preco_custo'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="preco_venda" class="control-label"><span class="text-danger">*</span>Preço de Venda</label>
                        <div class="form-group">
                            <input type="number" step="0.01" name="preco_venda" value="<?php echo isset($item) ? $item['preco_venda'] : set_value('preco_venda'); ?>" class="form-control" id="preco_venda" required />
                            <span class="text-danger"><?php echo form_error('preco_venda'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="quantidade_estoque" class="control-label"><span class="text-danger">*</span>Quantidade em Estoque</label>
                        <div class="form-group">
                            <input type="number" name="quantidade_estoque" value="<?php echo isset($item) ? $item['quantidade_estoque'] : set_value('quantidade_estoque'); ?>" class="form-control" id="quantidade_estoque" required />
                            <span class="text-danger"><?php echo form_error('quantidade_estoque'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="usage_type" class="control-label"><span class="text-danger">*</span>Tipo de Uso</label>
                        <div class="form-group">
                            <select name="usage_type" class="form-control" required>
                                <option value="">Selecione o Tipo de Uso</option>
                                <option value="returnable" <?= isset($item) && $item['usage_type'] === 'returnable' ? 'selected' : ''; ?>>Retornável</option>
                                <option value="consumable" <?= isset($item) && $item['usage_type'] === 'consumable' ? 'selected' : ''; ?>>Consumível</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('usage_type'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="controle_individual" class="control-label">Controle Individual</label>
                        <div class="form-group">
                            <input type="checkbox" name="controle_individual" value="1" <?= isset($item) && $item['controle_individual'] ? 'checked' : ''; ?> />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="valor_integral" class="control-label">Valor Integral</label>
                        <div class="form-group">
                            <input type="number" step="0.01" name="valor_integral" value="<?php echo isset($item) ? $item['valor_integral'] : set_value('valor_integral'); ?>" class="form-control" id="valor_integral" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="descricao_curta" class="control-label">Descrição Curta</label>
                        <div class="form-group">
                            <textarea name="descricao_curta" class="form-control" id="descricao_curta"><?php echo isset($item) ? $item['descricao_curta'] : set_value('descricao_curta'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="descricao_longa" class="control-label">Descrição Longa</label>
                        <div class="form-group">
                            <textarea name="descricao_longa" class="form-control" id="descricao_longa"><?php echo isset($item) ? $item['descricao_longa'] : set_value('descricao_longa'); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success"><?php echo isset($item) ? 'Salvar Alterações' : 'Salvar'; ?></button>
                <a href="<?php echo site_url('itens'); ?>" class="btn btn-default">Cancelar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

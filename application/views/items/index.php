<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Itens</h3>
        <a href="<?php echo site_url('items/add'); ?>" class="btn btn-success btn-sm pull-right">Adicionar Novo Item</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição Curta</th>
                    <th>Preço de Custo</th>
                    <th>Preço de Venda</th>
                    <th>Quantidade Estoque</th>
                    <th>Tipo de Uso</th>
                    <th class="text-right nowrap">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($itens) && count($itens) > 0): ?>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <td><?php echo $item['nome']; ?></td>
                            <td><?php echo $item['descricao_curta']; ?></td>
                            <td><?php echo number_format($item['preco_custo'], 2, ',', '.'); ?></td>
                            <td><?php echo number_format($item['preco_venda'], 2, ',', '.'); ?></td>
                            <td><?php echo $item['quantidade_estoque']; ?></td>
                            <td><?php echo $item['usage_type'] === 'returnable' ? 'Retornável' : 'Consumível'; ?></td>
                            <td class="text-right nowrap">
                                <a href="<?php echo site_url('items/edit/' . $item['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="<?php echo site_url('items/delete/' . $item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Nenhum item encontrado</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

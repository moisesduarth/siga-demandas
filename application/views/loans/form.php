<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Novo Empréstimo</h3>
            </div>
            <form action="/loans/store" method="post">
                <div class="box-body">
                    <div class="row clearfix">
                        <!-- Seleção de Membro -->
                        <div class="col-md-6">
                            <label for="membro_id" class="control-label"><span class="text-danger">*</span>Membro</label>
                            <div class="form-group">
                                <select name="membro_id" class="form-control" required>
                                    <option value="">Selecione o Membro</option>
                                    <?php foreach ($membros as $membro): ?>
                                        <option value="<?= $membro['id']; ?>"><?= $membro['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Container de Itens -->
                    <div id="item-container" class="row mt-4">
                        <h4 class="col-md-12">Itens</h4>
                        <div class="col-md-12 mb-3">
                            <button type="button" id="add-item" class="btn btn-success btn-sm">Adicionar Item</button>
                        </div>
                        <div id="item-list" class="col-md-12"></div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Registrar Empréstimo</button>
                    <a href="/loans" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let itemCount = 0;

    document.getElementById('add-item').addEventListener('click', function () {
        itemCount++;
        const itemRow = document.createElement('div');
        itemRow.className = "row mb-3";
        itemRow.innerHTML = `
            <div class="col-md-4">
                <label for="itens[${itemCount}][item_id]" class="control-label">Item</label>
                <select name="itens[${itemCount}][item_id]" class="form-control item-select" required>
                    <option value="">Selecione o Item</option>
                    <?php foreach ($items as $item): ?>
                        <option value="<?= $item['id']; ?>" data-controle-individual="<?= $item['controle_individual']; ?>">
                            <?= $item['nome']; ?> (<?= $item['usage_type'] === 'returnable' ? 'Retornável' : 'Consumível'; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="itens[${itemCount}][quantidade]" class="control-label">Quantidade</label>
                <input type="number" name="itens[${itemCount}][quantidade]" class="form-control" value="1" required>
            </div>
            <div class="col-md-4 asset-container" style="display: none;">
                <label for="itens[${itemCount}][asset_id]" class="control-label">Ativo</label>
                <select name="itens[${itemCount}][asset_id]" class="form-control"></select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-item" style="margin-top: 25px;">Remover</button>
            </div>
        `;
        document.getElementById('item-list').appendChild(itemRow);

        const itemSelect = itemRow.querySelector('.item-select');
        const assetContainer = itemRow.querySelector('.asset-container');
        const assetSelect = itemRow.querySelector('select[name^="itens["][name$="[asset_id]"]');

        // Listener para atualizar os ativos (assets) com base no item selecionado
        itemSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const isIndividual = selectedOption.getAttribute('data-controle-individual') === '1';

            if (isIndividual) {
                assetContainer.style.display = 'block';
                fetch(`/assets/byItem/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        assetSelect.innerHTML = '';
                        data.forEach(asset => {
                            const option = document.createElement('option');
                            option.value = asset.id;
                            option.textContent = `Ativo: ${asset.numero_ativo} - Série: ${asset.numero_serie}`;
                            assetSelect.appendChild(option);
                        });
                    });
            } else {
                assetContainer.style.display = 'none';
                assetSelect.innerHTML = '';
            }
        });

        // Listener para remover o item
        itemRow.querySelector('.remove-item').addEventListener('click', function () {
            itemRow.remove();
        });
    });
</script>

<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <?php if (!empty($data['showForm'])): ?>
        <form action="<?= URLROOT; ?>/sneakers/create" method="post" class="mb-3">
            <div class="mb-2">
                <label for="merk">Merk:</label>
                <input type="text" name="merk" id="merk" required class="form-control">
            </div>
            <div class="mb-2">
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" required class="form-control">
            </div>
            <div class="mb-2">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" required class="form-control">
            </div>
            <div class="mb-2">
                <label for="prijs">Prijs:</label>
                <input type="number" name="prijs" id="prijs" step="0.01" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Verstuur</button>
        </form>
        <a href="<?= URLROOT; ?>/sneakers/index">&lt; Terug naar sneakers</a>
    <?php else: ?>
        <a href="<?= URLROOT; ?>/sneakers/index?action=create" class="btn btn-warning mb-3">Nieuwe sneaker</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Prijs</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['sneakers'] as $sneaker): ?>
                    <tr>
                        <td><?= htmlspecialchars($sneaker->Merk); ?></td>
                        <td><?= htmlspecialchars($sneaker->Model); ?></td>
                        <td><?= htmlspecialchars($sneaker->Type); ?></td>
                        <td>€<?= number_format($sneaker->Prijs, 2); ?></td>
                        <td>
                            <form action="<?= URLROOT; ?>/sneakers/delete/<?= $sneaker->Id; ?>" method="post" style="display:inline;">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze sneaker wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>